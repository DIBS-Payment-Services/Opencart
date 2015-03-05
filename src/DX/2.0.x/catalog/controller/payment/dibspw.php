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
        
        //var_dump($data['hidden']);
	
        $this->template = (file_exists(DIR_TEMPLATE . 
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl')) ?
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl' :
                          $this->template = 'default/template/payment/dibspw.tpl';
        
      
        
        
        return $this->load->view($this->helper_dibs_tools_conf('config_template', '') . '/template/payment/dibspw.tpl', $data);
        
        
        
    }
    
   
     public function confirm() {
		if ($this->session->data['payment_method']['code'] == 'dibspw') {
			$this->load->model('checkout/order');

			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('cod_order_status_id'));
		} 
     }   
    
    
    /**
     * Succes page handler
     */
    public function success() {
        if(isset($_POST['orderid']) && !empty($_POST['orderid'])) {
         
            $this->load->model('checkout/order');
            $this->model_checkout_order->addOrderHistory($this->session->data['order_id'], 
                   $this->config->get('free_checkout_order_status_id'));
            
            
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
            if( isset( $_POST['MAC']) && $_POST['MAC'] ) {
                $hmac = $this->config->get('dibspw_hmac');
                $macCodeCalculated = dibs_pw_api::api_dibs_calcMAC($_POST, $hmac);
                if($macCodeCalculated !=  $_POST['MAC']) {
                    exit("0");
                }
            }
            
             $this->load->model('checkout/order');
             $this->model_checkout_order->addOrderHistory($_POST['orderid'], $this->config->get('dibspw_order_status_id'), '', true);
           
        }
        else exit("1");
    }
    
    public function cancel() {
        $this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));
    }
}