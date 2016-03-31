<?php
require_once str_replace("\\", "/", dirname(__FILE__)) . '/dibs_api/pw/dibs_pw_api.php';

class ControllerPaymentDibspw extends dibs_pw_api {
    public function index() {
	$this->data['button_confirm'] = $this->helper_dibs_tools_lang('button_confirm');
	$this->data['text_info'] = $this->helper_dibs_tools_lang('text_info');
        $this->load->model('checkout/order');
        $this->data['action'] = self::api_dibs_get_formAction();
        $mOrderInfo = $this->model_checkout_order->getOrder((int)$this->session->data['order_id']);
   

        /** DIBS integration */
        $aData = $this->api_dibs_get_requestFields($mOrderInfo);
        /* DIBS integration **/
        $this->data['hidden'] = $aData;
	
        $this->template = (file_exists(DIR_TEMPLATE . 
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl')) ?
                          $this->helper_dibs_tools_conf('config_template', '') . 
                          '/template/payment/dibspw.tpl' :
                          $this->template = 'default/template/payment/dibspw.tpl';
        
	$this->render();
    }
    
    
    /**
     * Succes page handler
     */
    public function success() {
        if(isset($_POST['orderid']) && !empty($_POST['orderid'])) {
            $this->load->model('checkout/order');
            $aOrderInfo = $this->model_checkout_order->getOrder((int)$_POST['orderid']);
            $iCode = $this->api_dibs_action_success($aOrderInfo);
            if(!empty($iCode)) {
                echo $this->api_dibs_getFatalErrorPage($iCode);
                exit();
            }
            else {
                $transactionId = $_POST['transaction'];
                $this->model_checkout_order->confirm($_POST['orderid'], 
                $this->helper_dibs_tools_conf('config_order_status_id', ''), 
                "DIBS Transactionid: {$transactionId}", true);                  
                $this->redirect($this->helper_dibs_tools_url('checkout/success'));
            }
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
            $this->load->model('checkout/order');
            $aOrderInfo = $this->model_checkout_order->getOrder((int)$_POST['orderid']);
            $this->api_dibs_action_callback($aOrderInfo);
        }
        else exit("1");
    }
    
    public function cancel() {
        if(isset($_POST['orderid']) && !empty($_POST['orderid'])) {
            $this->api_dibs_action_cancel();
            $mId = $this->cms_dibs_get_orderStatusId("Canceled");
            if($mId !== FALSE) {
                $this->load->model('checkout/order');
                $this->model_checkout_order->update((int)$_POST['orderid'], 
                                                    $this->cms_dibs_get_orderStatusId("Canceled"), 
                                                    '', TRUE);
            }
        }
     $this->redirect($this->helper_dibs_tools_url($this->helper_dibs_obj_urls()->carturl));
    }
}