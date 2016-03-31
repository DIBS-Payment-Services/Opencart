<?php

class ControllerPaymentDibsfw extends Controller {
    const REDIRECT_FLEXWIN_URL = 'https://payment.architrade.com/paymentweb/start.action';
    
        public function index() {
        $this->language->load('payment/dibsfw');
            
	$this->data['button_confirm'] = $this->language->get('button_confirm');
	$this->data['text_info'] = $this->language->get('text_info');
        $this->load->model('checkout/order');
        //$this->data['action'] = self::api_dibs_get_formAction();
        $mOrderInfo = $this->model_checkout_order->getOrder((int)$this->session->data['order_id']);
        $this->load->model('payment/dibsfw');
        
        /** DIBS integration */
        $aData = $this->model_payment_dibsfw->getRequestParams($mOrderInfo);
        
        /* DIBS integration **/
        $this->data['hidden'] = $aData;
        
        $this->data['action'] = self::REDIRECT_FLEXWIN_URL;
	
        $this->template = (file_exists(DIR_TEMPLATE . 
                          $this->config->get('config_template') . 
                          '/template/payment/dibsfw.tpl')) ?
                          $this->config->get('config_template') . 
                          '/template/payment/dibspw.tpl' :
                          $this->template = 'default/template/payment/dibsfw.tpl';
        
	$this->render();
    }
    
    public function callback() {
        $orderid = $_POST['opc_order'];
        $this->load->model('checkout/order');
        $mOrderInfo = $this->model_checkout_order->getOrder($orderid);
        $this->model_checkout_order->confirm($orderid , 2,
        "DIBS Transactionid: {$_POST['transact']}", true);    
    }
    
    public function success() {
         $this->redirect($this->url->link('checkout/success'));
    }
    
    public function cancel() {
        $this->redirect($this->url->link('checkout/cart'));
    }
    
    public function orderAction() {
        
    }
}

