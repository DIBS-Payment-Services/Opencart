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
                          '/template/payment/dibsfw.tpl' :
                          $this->template = 'default/template/payment/dibsfw.tpl';
        
	$this->render();
    }
    
    
    /**
     * Callback from BIBS, it confirms order 
     * if order was not previously confirmad on success()
     * 
     */
    public function callback() {
        $orderid = $this->getReturnedOrderId();
        if(!$orderid) {
            return null;
        }
        
        $orderData = $this->getOrder($orderid);
        if ( !empty($orderData) && $orderData['order_status_id'] == 0 
                && $this->responseSequrityCheck()) {
              $this->confirmOrder($orderid);
        }
    }
    
    /**
     * Success from BIBS, it confirms order 
     * if order was not previously confirmad on callback()
     * 
     */
    public function success() {
        $orderid = $this->getReturnedOrderId();
        if(!$orderid) {
            return null;
        }
        $orderData = $this->getOrder($orderid);
        
        if ( !empty($orderData) && $orderData['order_status_id'] == 0 
                && $this->responseSequrityCheck()) {
              $this->confirmOrder($orderid);
        }
        $this->redirect($this->url->link('checkout/success'));
    }
    
    public function cancel() {
        $this->redirect($this->url->link('checkout/cart'));
    }
    
    /**
     * Confirm order and set order status
     * add comment with DIBS transactionid and DIBS orderid
     */
    private function confirmOrder($orderid) {
         $this->load->model('checkout/order');
         $this->model_checkout_order->confirm($orderid , $this->config->get('dibsfw_order_status_id'), 
        "DIBS Transactionid: <b>{$_POST['transact']}</b> \n DIBS Orderid: <b>{$_POST['orderid']}</b>", true);    
    }
    
    private function getOrder($orderid) {
        $this->load->model('checkout/order');
        $order = $this->model_checkout_order->getOrder($orderid);
        return $order;
    }
    
    /**
     * Get orderid returned from DIBS, this is real 
     * Opencart order id from table order. 
     * 
     * @return int orderid
     */
    private function getReturnedOrderId() {
        if( !isset($_POST['opc_order']) && empty($_POST['opc_order'])) {
            return null;
        } else {
            return $_POST['opc_order'];
        }
    }
    
    /**
     * Check md5key
     */
    private function checkMd5Key($k1, $k2, $response) {
            $result = false;
        
            $k1 = html_entity_decode($k1);
            $k2 = html_entity_decode($k2);
            
            $parameter_string = '';
            $parameter_string .= 'merchant=' . $response['merchant'];
            $parameter_string .= '&orderid=' . $response['orderid'];
            $parameter_string .= '&currency=' . $response['currency'];
            $parameter_string .= '&amount=' . $response['amount'];
           
            $md5keyCalculated = MD5($k2 . MD5($k1 . $parameter_string) );
            
            if( $response['md5key'] ==  $md5keyCalculated) {
                $result = true;
            }
            return $result;
    }
    
    /**
     * Initial check 
     * 
     * @return boolean
     */
    private function responseSequrityCheck() {
        $response = $_POST;
        $result = true;
         if(isset($response['md5key']) && $response ) {
            $k1 = $this->config->get('dibsfw_key1');
            $k2 = $this->config->get('dibsfw_key2');
            if(!$this->checkMd5Key($k1, $k2, $response)) {
                $result= false;
                $this->log->write("DIBS FlexWin 'md5key' error. transaction=" .     $response['transact'] . " "
                                  . "merchant=".$response['merchant'] . " orderid=" . $response['orderid'] .  
                                  " date time=" . date("Y.m.d H:i:s") );	
            }
        }
        
        return $result;
        
    }
    
}