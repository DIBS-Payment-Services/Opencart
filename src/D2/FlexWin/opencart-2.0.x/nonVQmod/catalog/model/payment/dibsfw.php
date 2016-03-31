<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelPaymentDibsfw extends Model {
    
    const MODULE_VERSION = 'opc_fw_3.0.2';
    
    public function getMethod($address, $total) {
        	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . 
                                  "zone_to_geo_zone WHERE geo_zone_id = '" . 
                                  (int)$this->config->get('dibsfw_geo_zone_id') . 
                                  "' AND country_id = '" . (int)$address['country_id'] . 
                                  "' AND (zone_id = '" . (int)$address['zone_id'] . 
                                  "' OR zone_id = '0')");
		
	if ($this->config->get('dibsfw_total') > $total) {
            $status = false;
	}
        elseif (!$this->config->get('dibsfw_geo_zone_id')) {
            $status = true;
	}
        elseif ($query->num_rows) {
            $status = true;
	}
        else {
            $status = false;
	}	
		
	$method_data = array();
        $sTitle = "";
        
        echo $this->language->get('text_title');
        
        $sUsersTitle = $this->config->get('dibsfw_text_title');
        if(!empty($sUsersTitle)) {
            $sTitle = $sUsersTitle;
        }
        else $sTitle = $this->language->get('text_title');
        if ($status) {  
            $method_data = array( 
                'code'       => 'dibsfw',
                'title'      => $sTitle,
                'sort_order' => $this->config->get('dibsfw_sort_order'),
                'terms'      => ''
            );
        }
   
        return $method_data;
    }
    
    public function getRequestParams($order) {
        $this->language->load('payment/dibsfw');
        $requestParams = array();
        $requestParams = array_merge($requestParams, $this->collectStandartParams($order));
        return $requestParams;
    }
    
    private function collectStandartParams($order) {

        $requestParams = array();
        
        $requestParams['merchant']           =  $this->config->get('dibsfw_mid');
        $requestParams['amount']             =  $this->roundAmount($this->currency->format($order['total'], 
                                                        $order['currency_code'], $order['currency_value'], false));


        $orderId = $order['order_id'];
        if( $this->config->get('dibsfw_uniqueoid') == 'yes') {
            $requestParams['uniqueoid'] = 1;
            $orderId = $order['order_id'] . time();
        }

        $requestParams['orderid']            =  $orderId;

        $requestParams['accepturl']          =  $this->config->get('config_url') .
                                                    'catalog/controller/payment/dibs_callback.php/success';
        
        $requestParams['cancelurl']          =  $this->config->get('config_url') .  
                                                    'catalog/controller/payment/dibs_callback.php/cancel';
        
        $requestParams['callbackurl']        =  $this->config->get('config_url') .
                                                    'catalog/controller/payment/dibs_callback.php/notify';
         
        $requestParams['s_callbackfix']       = $this->config->get('config_url') .  
                                                    'catalog/controller/payment/dibs_callback.php/notify';
         
        $requestParams['opc_order']          =  $order['order_id'];
         
        $requestParams['currency']           =  $this->registry->get('currency')->getCode();
        // address
        $requestParams['billingAddress']     =  $order['payment_address_1'];
        $requestParams['billingAddress2']    =  $order['payment_address_2'];
        $requestParams['billingFirstName']   =  $order['payment_firstname'];
        $requestParams['billingLastName']    =  $order['payment_lastname'];
        $requestParams['billingPostalCode']  =  $order['payment_postcode'];
        $requestParams['billingPostalPlace'] =  $order['payment_city'];
        
        // delivery
        $requestParams['delivery1.Firstname'] =  $order['shipping_firstname'];
        $requestParams['delivery2.Lastname']  =  $order['shipping_lastname'];
        $requestParams['delivery3.Address']    =  $order['shipping_address_1'];
        $requestParams['delivery4.City']       =  $order['shipping_city'];
        $requestParams['delivery5.Country']    =  $order['shipping_country'];

        //ordline
        $requestParams['ordline0-0']           =  $this->language->get('ord_desc_title');
        $requestParams['ordline0-1']           =  $this->language->get('ord_price_title');

        $requestParams['structuredOrderInformation'] = $this->collectInvoiceParams($order);

        $orderItems = $this->getCartItems($order);
        $line = 1;
        foreach($orderItems as $item) {
           $requestParams['ordline' . $line . '-0'] = $item->name;
           $requestParams['ordline' . $line . '-1'] = $item->price;
           $line++;
        }

        if( $this->config->get('dibsfw_account') ) {
            $requestParams['account'] = $this->config->get('dibsfw_account');
        }


        if( $this->config->get('dibsfw_paytype')) {
            $requestParams['paytype'] = $this->config->get('dibsfw_paytype');
        }

        $requestParams['lang']               =  $this->config->get('dibsfw_lang');
        $requestParams['decorator']          =  $this->config->get('dibsfw_decorator');
        $this->config->get('dibsfw_testmode') == 'yes' ? $requestParams['test'] = 1 : 0;
        $this->config->get('dibsfw_uniqueoid') == 'yes' ? $requestParams['uniqueoid'] = 1 : 0;


        if( $this->config->get('dibsfw_key1') && $this->config->get('dibsfw_key2') ) {
            $k1 = html_entity_decode($this->config->get('dibsfw_key1'));
            $k2 = html_entity_decode($this->config->get('dibsfw_key2'));

            $parameter_string = '';
            $parameter_string .= 'merchant=' . $requestParams['merchant'];
            $parameter_string .= '&orderid=' . $requestParams['orderid'];
            $parameter_string .= '&currency=' . $requestParams['currency'];
            $parameter_string .= '&amount=' . $requestParams['amount'];

            $md5key = MD5($k2 . MD5($k1 . $parameter_string) );
            $requestParams['md5key'] = $md5key;
        }


        $requestParams['s_sysmod'] = self::MODULE_VERSION;


        return $requestParams;
    }

    /**
     * @param $order
     * @return XML | false (if we have different total amount and calculated amount)
     */
    private function collectInvoiceParams($order) {
        $doc = new DomDocument("1.0","UTF-8");
        $doc->preserveWhiteSpace = true;
        $doc->formatOutput = true;
        $root = $doc->appendChild($doc->createElement("orderInformation"));
        $root->appendChild($doc->createElement("yourRef"))
             ->appendChild($doc->createTextNode('1220676'));
        $i = 1;


        $aItems = $this->getCartItems($order);
        foreach($aItems as $oItem) {
            $oItem->price = isset($oItem->price) ? $this->roundAmount($oItem->price) : (int)0;
            if(!empty($oItem->price)) {
                if(!empty($oItem->name)) $oItem->name = $this->utf8Fix($oItem->name);
                elseif(!empty($oItem->sku)) $oItem->name = $this->utf8Fix($oItem->sku);
                else $oItem->name = $oItem->id;
                
                $aAttrs = array('itemID' => $oItem->id,
                                'itemDescription' => $oItem->name,
                                'comments' => 'SKU: ' . $oItem->sku,
                                'orderRowNumber' => $i,
                                'quantity' => $oItem->qty,
                                'price' => $oItem->price,
                                'unitCode' => 'pcs',
                                'VATAmount' => 0);
                                

                $occ = $root->appendChild($doc->createElement("orderItem"));            
                foreach($aAttrs as $sKey => $sVal) {
                    $occ->appendChild($doc->createAttribute($sKey))
                        ->appendChild($doc->createTextNode($sVal));
                }
                $i++;
            }
        }
        return htmlspecialchars($doc->saveXML(), ENT_COMPAT, "UTF-8");
    }


    /**
     * @param $mOrderInfo
     * @return object items | false (if  we have different total amount and calculated amount)
     */
    private function getCartItems($mOrderInfo) {
        $total_data = array();
        $total = 0;
        $taxes = $this->cart->getTaxes();
        $this->load->model('extension/extension');
        $sort_order = array(); 
        $results = $this->model_extension_extension->getExtensions('total');
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


        foreach($this->cart->getProducts() as $product) {
            $aItems[] = (object)array(
                'id'    => $product['product_id'],
                'name'  => $product['name'],
                'sku'   => $product['model'],
                'price' =>  $this->currency->format($product['price'], $order_info['currency_code'], $order_info['currency_value'], false),
                'qty'   => $product['quantity'],
                'tax'   => 0
            );


        }

        $amount = $this->currency->format($mOrderInfo['total'], $mOrderInfo['currency_code'], $mOrderInfo['currency_value'], false);

        $id = 0;
        foreach($order_data['totals'] as $total) {
             if( $total['code'] == 'coupon' ||  $total['code'] == 'voucher' || 
                     $total['code'] == 'tax' || $total['code'] == 'shipping') {
                  $aItems[] = (object)array(
                    'id'    => $total['code'].'_'.$id,
                    'name'  => $total['title'],
                    'sku'   => $total['code'].'_'.$id,
                    'price' => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'], false),
                    'qty'   => 1,
                    'tax'   => 0
            );


             }
             $id++;
        }


         return $aItems;
    }
    
    
    public function roundAmount($fNum, $iPrec = 2) {
        return empty($fNum) ? (int)0 : (int)(string)(round($fNum, $iPrec) * pow(10, $iPrec));
    }
    
    
    public static function utf8Fix($sText) {
        return (mb_detect_encoding($sText) == "UTF-8" && mb_check_encoding($sText, "UTF-8")) ?
               $sText : utf8_encode($sText);
    }
 
 
    
    
}