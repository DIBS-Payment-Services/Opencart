<?php

class ControllerPaymentDibsfw extends Controller {
    const REDIRECT_FLEXWIN_URL = 'https://payment.architrade.com/paymentweb/start.action';
    
        public function index() {
        $this->language->load('payment/dibsfw');

        $data['button_confirm'] = $this->language->get('button_confirm');
	    $data['text_info'] = $this->language->get('text_info');
        $this->load->model('checkout/order');

        $mOrderInfo = $this->model_checkout_order->getOrder((int)$this->session->data['order_id']);
        $this->load->model('payment/dibsfw');

        /** DIBS integration */
        $aData = $this->model_payment_dibsfw->getRequestParams($mOrderInfo);

        /* DIBS integration **/
        $data['hidden'] = $aData;
        
        $data['action'] = self::REDIRECT_FLEXWIN_URL;
	
        $this->template = (file_exists(DIR_TEMPLATE . 
                          $this->config->get('config_template') . 
                          '/template/payment/dibsfw.tpl')) ?
                          $this->config->get('config_template') . 
                          '/template/payment/dibsfw.tpl' :
                          $this->template = 'default/template/payment/dibsfw.tpl';


        return $this->load->view($this->config->get('config_template', '') . '/template/payment/dibsfw.tpl', $data);
    }
    
    public function callback() {
        $this->load->model('checkout/order');
        $this->model_checkout_order->addOrderHistory($_POST['opc_order'],
                            $this->config->get('dibsfw_order_status_id'), '', true);
    }
    
    public function success() {
         $this->response->redirect($this->url->link('checkout/success'));
    }
    
    public function cancel() {
        $this->response->redirect($this->url->link('checkout/cart'));
    }
    
    public function orderAction() {
        
    }
}

