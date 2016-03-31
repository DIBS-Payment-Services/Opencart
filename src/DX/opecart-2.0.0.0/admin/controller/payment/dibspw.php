<?php 
class ControllerPaymentDibspw extends Controller {
    private $error = array(); 

    public function index() {
        $this->load->language('payment/dibspw');
	
        $this->load->model('setting/setting');
			
	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            
            $this->model_setting_setting->editSetting('dibspw', $this->request->post);				
            
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
	}
        
        $data['heading_title'] = $this->language->get('heading_title');
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['tab_general'] = $this->language->get('tab_general');
        $data['text_techsite'] = $this->language->get('text_techsite');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['entry_text_title'] = $this->language->get('entry_text_title');
        $data['dibspw_text_title'] = $this->language->get('dibspw_text_title');
        $data['entry_default_title'] = $this->language->get('entry_default_title');
        $data['entry_mid'] = $this->language->get('entry_mid');
        $data['entry_pid'] = $this->language->get('entry_pid');
        $data['dibspw_mid'] = $this->language->get('dibspw_mid');
        $data['dibspw_pid'] = $this->language->get('dibspw_pid');
        $data['entry_hmac'] = $this->language->get('entry_hmac');
        $data['dibspw_hmac'] = $this->language->get('dibspw_hmac');
        $data['entry_testmode'] = $this->language->get('entry_testmode');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['entry_mid'] = $this->language->get('entry_mid');
        $data['text_no'] = $this->language->get('text_no');
        $data['entry_fee'] = $this->language->get('entry_fee');
        $data['text_edit'] =  $this->language->get('text_edit');
        $data['dibspw_fee'] = $this->language->get('dibspw_fee');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['entry_capturenow'] = $this->language->get('entry_capturenow');
        $data['dibspw_capturenow'] = $this->language->get('dibspw_capturenow');
        $data['entry_paytype'] = $this->language->get('entry_paytype');
        $data['dibspw_paytype'] = $this->language->get('dibspw_paytype');
        $data['entry_default_paytype'] = $this->language->get('entry_default_paytype');
        $data['entry_lang'] = $this->language->get('entry_lang');
        $data['text_da'] = $this->language->get('text_da');
        $data['text_fi'] = $this->language->get('text_fi');
        $data['text_nor'] = $this->language->get('text_nor');
        $data['text_sv'] = $this->language->get('text_sv');
        $data['entry_account'] = $this->language->get('entry_account');
        $data['dibspw_account'] = $this->language->get('dibspw_account');
        $data['dibspw_distr'] = $this->language->get('dibspw_distr');
        $data['text_dempty'] = $this->language->get('text_dempty');
        $data['text_demail'] = $this->language->get('text_demail');
        $data['text_dpaper'] = $this->language->get('text_dpaper');
        $data['entry_total'] = $this->language->get('entry_total');
        $data['dibspw_total'] = $this->language->get('dibspw_total');
        $data['entry_order_status_id'] = $this->language->get('entry_order_status_id');
        $data['entry_distr'] = $this->language->get('entry_distr');
        $data['text_en'] = $this->language->get('text_en');
        $data['order_statuses'] = $this->language->get('order_statuses');
        $data['text_all_zones'] = $this->language->get('text_all_zones');
        $data['entry_geo_zone_id'] = $this->language->get('entry_geo_zone_id');
        $data['geo_zones'] = $this->language->get('geo_zones');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $data['entry_order_status_id'] = $this->language->get('entry_order_status_id');
        $data['heading_title'] = $this->language->get('heading_title');
        $data['entry_logo'] = $this->language->get('entry_logo');

        
 	if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
	}
        else {
            $data['error_warning'] = '';
	}

 	if (isset($this->error['mid'])) {
            $data['error_mid'] = $this->error['mid'];
	}
        else {
            $data['error_mid'] = '';
	}

  	$data['breadcrumbs'] = array();
   	$data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),      		
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_payment'),
            'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);

   	$data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('payment/dibspw', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);
				
	$data['action'] = $this->url->link('payment/dibspw', 'token=' . $this->session->data['token'], 'SSL');
	$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->load->model('localisation/order_status');
	$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        $this->loadSettings($data);
        
        $this->load->model('localisation/geo_zone');
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
	
	$this->template = 'payment/dibspw.tpl';
	$this->children = array(
            'common/header',
            'common/footer',
	);
				
	//$this->response->setOutput($this->render());
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $this->response->setOutput($this->load->view('payment/dibspw.tpl', $data));
    }
        
    function loadSettings(&$data) {
               
        $aTmp = $data;
        foreach($aTmp as $key => $val) {
            if(strpos($key, 'entry_') !== FALSE) {
                $sTmpKey = str_replace("entry_","dibspw_",$key);
                if (isset($this->request->post[$sTmpKey])) {
                    $data[$sTmpKey] = $this->request->post[$sTmpKey];
                }
                else {
                    $data[$sTmpKey] = $this->config->get($sTmpKey);
                }
                unset($sTmpKey);
            }
        }
        unset($aTmp);
        
    }
        
    private function validate() {		
        if (!$this->user->hasPermission('modify', 'payment/dibspw')) {
            $this->error['warning'] = $this->language->get('error_permission');
	}
		
	if (isset($this->request->post['dibspw_mid']) && strlen(trim($this->request->post['dibspw_mid'])) == 0) {
            $this->error['mid'] = $this->language->get('error_mid');
	}
		
	if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
	}
	
	if (!$this->error) {
            return true;
	}
        else {
            return false;
	}	
    }
}
?>