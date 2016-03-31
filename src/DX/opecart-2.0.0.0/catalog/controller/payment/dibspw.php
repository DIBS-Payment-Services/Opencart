<?php
require_once str_replace("\\", "/", dirname(__FILE__)) . '/dibs_api/pw/dibs_pw_api.php';

class ControllerPaymentDibspw extends dibs_pw_api {
    public function index() {
        $data['button_confirm'] = $this->helper_dibs_tools_lang('button_confirm');
	$data['text_info'] = $this->helper_dibs_tools_lang('text_info');
        $this->load->model('checkout/order');
        $data['action'] = self::api_dibs_get_formAction();
        $mOrderInfo = $this->model_checkout_order->getOrder((int)$this->session->data['order_id']);
        
        /*$this->model_checkout_order->confirm($mOrderInfo['order_id'], 
                                             $this->helper_dibs_tools_conf('config_order_status_id', ''));
        */
        /** DIBS integration */
        $aData = $this->api_dibs_get_requestFields($mOrderInfo);
        /* DIBS integration **/
        
        $data['hidden'] = $aData;
       
        $this->template = (file_exists(DIR_TEMPLATE . 
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl')) ?
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl' :
                          $this->template = 'default/template/payment/dibspw.tpl';
        
        return $this->load->view($this->helper_dibs_tools_conf('config_template', '') . '/template/payment/dibspw.tpl', $data);
        
    }
    
    /**
     * Succes page handler
     */
    public function success() {
        if(isset($_POST['orderid']) && !empty($_POST['orderid'])) {
           $this->checkMACCode();
           $this->response->redirect($this->url->link('checkout/success', '', 'SSL'));
        }
        else {
            echo $this->api_dibs_getFatalErrorPage(1);
            exit();
        }
    }
    
    /**
     * Callback handler
     */
    public function callback(){
       if(isset($_POST['orderid']) && !empty($_POST['orderid'])) {
             if($this->checkMACCode()) {
                $this->load->model('checkout/order');
                $this->model_checkout_order->addOrderHistory($_POST['orderid'], 
                        $this->config->get('dibspw_order_status_id'), "Dibs transaction: " . $_POST['transaction'], true);
             }
             
        }
        else exit("1");
    }
    
    public function cancel() {
        $this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
    }
    
    private function checkMACCode() {
          $hmac = trim($this->config->get('dibspw_hmac'));
          if($hmac) {
                $macCodeCalculated = dibs_pw_api::api_dibs_calcMAC($_POST, $hmac);
      
                if($macCodeCalculated == $_POST['MAC']) {
                    return true;
                } else {
                    $log = new Log('dibs_dx.log');
                    $log->write("MAC code error calculation:");
                    $log->write("orderid:".$_POST['orderid']);
                    $log->write("calculated MAC:" . $macCodeCalculated);
                    $log->write("received MAC:" . $_POST['MAC']);
                    return false;
                }
            } else {
                return true;
            } 
    }
}