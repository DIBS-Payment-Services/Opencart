<?php
class dibs_pw_helpers extends dibs_pw_helpers_cms implements dibs_pw_helpers_interface {

    public static $bTaxAmount = true;
    
    /**
     * Process write SQL query (insert, update, delete) with build-in CMS ADO engine.
     * 
     * @param string $sQuery 
     */
    public function helper_dibs_db_write($sQuery) {
        return $this->db->query($sQuery);
    }
    
    /**
     * Read single value ($sName) from SQL select result.
     * If result with name $sName not found null returned.
     * 
     * @param string $sQuery
     * @param string $sName
     * @return mixed 
     */
    public function helper_dibs_db_read_single($sQuery, $sName) {
        $mResult = $this->db->query($sQuery);
        
        if(isset($mResult->row[$sName])) return $mResult->row[$sName];
        else return null;
    }
    
    /**
     * Return settings with CMS method.
     * 
     * @param string $sVar
     * @param string $sPrefix
     * @return string 
     */
    public function helper_dibs_tools_conf($sVar, $sPrefix = 'dibspw_') {
        return $this->config->get($sPrefix . $sVar);
    }
    
    /**
     * Return CMS DB table prefix.
     * 
     * @return string 
     */
    public function helper_dibs_tools_prefix() {
        return DB_PREFIX;
    }
    
    /**
     * Returns text by key using CMS engine.
     * 
     * @param type $sKey
     * @return type 
     */
    public function helper_dibs_tools_lang($sKey) {
        $this->language->load('payment/dibspw');
        return $this->language->get($sKey);
    }

    /**
     * Get full CMS url for page.
     * 
     * @param string $sLink
     * @return string 
     */
    public function helper_dibs_tools_url($sLink) {
        return $this->url->link($sLink);
    }
    
    /**
     * Build CMS order information to API object.
     * 
     * @param mixed $mOrderInfo
     * @param bool $bResponse
     * @return object 
     */
    public function helper_dibs_obj_order($mOrderInfo, $bResponse = FALSE) {
        return (object)array(
            'orderid'  => $mOrderInfo['order_id'],
            'amount'   => $this->cms_dibs_applyCurrency($mOrderInfo['total'], $mOrderInfo['currency_code']),
            'currency' => dibs_pw_api::api_dibs_get_currencyValue($mOrderInfo['currency_code'])
        );
    }
    
    /**
     * Build CMS each ordered item information to API object.
     * 
     * @param mixed $mOrderInfo
     * @return object 
     */
    public function helper_dibs_obj_items($mOrderInfo) {
        $total_data = array();
        $total = 0;
        $taxes = $this->cart->getTaxes();
        $this->load->model('setting/extension');
        $sort_order = array(); 
        $results = $this->model_setting_extension->getExtensions('total');
        foreach ($results as $key => $value) {
                $sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
        }
        array_multisort($sort_order, SORT_ASC, $results);
        foreach ($results as $result) {
                if ($this->config->get($result['code'] . '_status')) {
                        $this->load->model('total/' . $result['code']);

                        $this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
                }
        }
        $sort_order = array(); 
        foreach ($total_data as $key => $value) {
                $sort_order[$key] = $value['sort_order'];
        }
        $order_data['totals'] = $total_data;    
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order_total` WHERE `order_id` = " . (int)$mOrderInfo['order_id']);
        foreach($query->rows as $row ) {
                if( $row['code'] == 'voucher') {
                    $order_data['totals'][] = array('code' => 'coupon', 'title' => $row['title'], 'value' => $row['value']);
                }
        }	
        $order_info = $this->model_checkout_order->getOrder((int)$this->session->data['order_id']);
        $aItems = array();
        //foreach($aItemsOC as $mItem) {
          foreach($this->cart->getProducts() as $product) {  
            $aItems[] = (object)array(
                'id'    => $product['product_id'],
                'name'  => $product['name'],
                'sku'   => $product['model'],
                'price' =>  $this->currency->format($product['price'], $order_info['currency_code'], $order_info['currency_value'], false),   ///$product['price'],        //$this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')))
                'qty'   => $product['quantity'],
                'tax'   => 0
            );
        }
        $id = 0;
        foreach($order_data['totals'] as $total) {
             if( $total['code'] == 'coupon' ||  $total['code'] == 'voucher' || 
                     $total['code'] == 'tax' || $total['code'] == 'shipping') {
                  $aItems[] = (object)array(
                    'id'    => $total['code'].'_'.$id,
                    'name'  => $total['title'],
                    'sku'   => $total['code'].'_'.$id,
                    'price' => $this->cms_dibs_applyCurrency($total['value'], $mOrderInfo['currency_code']),
                    'qty'   => 1,
                    'tax'   => 0
            );
             }
             $id++;
        }
        return $aItems;
    }
    
    /**
     * Build CMS shipping information to API object.
     * 
     * @param mixed $mOrderInfo
     * @return object 
     */
    public function helper_dibs_obj_ship($mOrderInfo) {
        $aShippingMethod = isset($this->session->data['shipping_method']) ? 
                           $this->session->data['shipping_method'] :
                           array('cost' => 0, 'tax_class_id' => 0);

        return (object)array(
                'id'    => 'shipping0',
                'name'  => "Shipping Rate",
                'sku'   => "",
                'price' => 700, //$this->cms_dibs_applyCurrency($aShippingMethod['cost'], $mOrderInfo['currency_code']),
                'qty'   => 1,
                'tax'   => $this->cms_dibs_applyCurrency($this->cms_dibs_get_taxes($aShippingMethod['cost'],
                                                                                   $aShippingMethod['tax_class_id']), 
                                                         $mOrderInfo['currency_code'])
        );
    }
    
    /**
     * Build CMS customer addresses to API object.
     * 
     * @param mixed $mOrderInfo
     * @return object 
     */
    public function helper_dibs_obj_addr($mOrderInfo) {
        return (object)array(
            'shippingfirstname'  => $mOrderInfo['shipping_firstname'],
            'shippinglastname'   => $mOrderInfo['shipping_lastname'],
            'shippingpostalcode' => $mOrderInfo['shipping_postcode'],
            'shippingpostalplace'=> $mOrderInfo['shipping_city'],
            'shippingaddress2'   => $mOrderInfo['shipping_address_1'] . " " . 
                                    $mOrderInfo['shipping_address_2'],
            'shippingaddress'    => html_entity_decode($mOrderInfo['shipping_iso_code_3'] . " " . 
                                    $mOrderInfo['shipping_zone']),
            
            'billingfirstname'   => $mOrderInfo['payment_firstname'],
            'billinglastname'    => $mOrderInfo['payment_lastname'],
            'billingpostalcode'  => $mOrderInfo['payment_postcode'],
            'billingpostalplace' => $mOrderInfo['payment_city'],
            'billingaddress2'    => $mOrderInfo['payment_address_1'] . " " .
                                    $mOrderInfo['payment_address_2'],
            'billingaddress'     => html_entity_decode($mOrderInfo['payment_iso_code_3'] . " " . 
                                    $mOrderInfo['payment_zone']),
            
            'billingmobile'      => $mOrderInfo['telephone'],
            'billingemail'       => $mOrderInfo['email']
        );
    }
    
    /**
     * Returns object with URLs needed for API, 
     * e.g.: callbackurl, acceptreturnurl, etc.
     * 
     * @param mixed $mOrderInfo
     * @return object 
     */
    public function helper_dibs_obj_urls($mOrderInfo = null) {
        return (object)array(
            'acceptreturnurl' => "payment/dibspw/success",
            'callbackurl'     => "payment/dibspw/callback",
            'cancelreturnurl' => "payment/dibspw/cancel",
            'carturl'         => 'checkout/cart'
        );
    }
    
    /**
     * Returns object with additional information to send with payment.
     * 
     * @param mixed $mOrderInfo
     * @return object 
     */
    public function helper_dibs_obj_etc($mOrderInfo) {
        return (object)array(
            'sysmod'      => 'oc_dx_15_4_1_7',
            'callbackfix' => $this->helper_dibs_tools_url("payment/dibspw/callback"),
            'partnerid'   => $this->config->get('dibspw_pid')
        );
    }
    
    public function helper_dibs_hook_callback() {
         $orderId = $_POST['orderid'];
         $transactionId = $_POST['transaction'];
         $this->load->model('checkout/order');
         if($_POST['status'] == 'ACCEPTED') {
               
                 $this->model_checkout_order->update($orderId,
                 $this->helper_dibs_tools_conf('order_status_id'), 
                 "DIBS Transactionid: {$transactionId}", TRUE);
         }
         
         if( $_POST['status'] == 'DECLINED' ) {
                $this->model_checkout_order->update($orderId,
                8, 
               'Payment was DICLENDE by DIBS', TRUE);
         }
        
    }
    
}
?>