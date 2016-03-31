<?php 
class ControllerPaymentDibspw extends Controller {
    private $error = array(); 

    public function index() {
        $this->language->load('payment/dibspw');
	
        $this->load->model('setting/setting');
			
	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('dibspw', $this->request->post);				
            $this->session->data['success'] = $this->language->get('text_success');
            $this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
	}
        
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
        $this->data['tab_general'] = $this->language->get('tab_general');
        $this->data['text_techsite'] = $this->language->get('text_techsite');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['entry_text_title'] = $this->language->get('entry_text_title');
        $this->data['dibspw_text_title'] = $this->language->get('dibspw_text_title');
        $this->data['entry_default_title'] = $this->language->get('entry_default_title');
        $this->data['entry_mid'] = $this->language->get('entry_mid');
        $this->data['entry_pid'] = $this->language->get('entry_pid');
        $this->data['dibspw_mid'] = $this->language->get('dibspw_mid');
        $this->data['dibspw_pid'] = $this->language->get('dibspw_pid');
        $this->data['entry_hmac'] = $this->language->get('entry_hmac');
        $this->data['dibspw_hmac'] = $this->language->get('dibspw_hmac');
        $this->data['entry_testmode'] = $this->language->get('entry_testmode');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['entry_mid'] = $this->language->get('entry_mid');
        $this->data['text_no'] = $this->language->get('text_no');
        $this->data['entry_fee'] = $this->language->get('entry_fee');
        $this->data['dibspw_fee'] = $this->language->get('dibspw_fee');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['entry_capturenow'] = $this->language->get('entry_capturenow');
        $this->data['dibspw_capturenow'] = $this->language->get('dibspw_capturenow');
        $this->data['entry_paytype'] = $this->language->get('entry_paytype');
        $this->data['dibspw_paytype'] = $this->language->get('dibspw_paytype');
        $this->data['entry_default_paytype'] = $this->language->get('entry_default_paytype');
        $this->data['entry_lang'] = $this->language->get('entry_lang');
        $this->data['text_da'] = $this->language->get('text_da');
        $this->data['text_fi'] = $this->language->get('text_fi');
        $this->data['text_nor'] = $this->language->get('text_nor');
        $this->data['text_sv'] = $this->language->get('text_sv');
        $this->data['entry_account'] = $this->language->get('entry_account');
        $this->data['dibspw_account'] = $this->language->get('dibspw_account');
        $this->data['dibspw_distr'] = $this->language->get('dibspw_distr');
        $this->data['text_dempty'] = $this->language->get('text_dempty');
        $this->data['text_demail'] = $this->language->get('text_demail');
        $this->data['text_dpaper'] = $this->language->get('text_dpaper');
        $this->data['entry_total'] = $this->language->get('entry_total');
        $this->data['dibspw_total'] = $this->language->get('dibspw_total');
        $this->data['entry_order_status_id'] = $this->language->get('entry_order_status_id');
        $this->data['entry_distr'] = $this->language->get('entry_distr');
        $this->data['text_en'] = $this->language->get('text_en');
        $this->data['order_statuses'] = $this->language->get('order_statuses');
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');
        $this->data['entry_geo_zone_id'] = $this->language->get('entry_geo_zone_id');
        $this->data['geo_zones'] = $this->language->get('geo_zones');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_order_status_id'] = $this->language->get('entry_order_status_id');
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['entry_logos'] = $this->language->get('entry_logos');
            
 	if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
	}
        else {
            $this->data['error_warning'] = '';
	}

 	if (isset($this->error['mid'])) {
            $this->data['error_mid'] = $this->error['mid'];
	}
        else {
            $this->data['error_mid'] = '';
	}

  	$this->data['breadcrumbs'] = array();
   	$this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),      		
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_payment'),
            'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);

   	$this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('payment/dibspw', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);
				
	$this->data['action'] = $this->url->link('payment/dibspw', 'token=' . $this->session->data['token'], 'SSL');
	$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->load->model('localisation/order_status');
	$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        $this->loadSettings($this->data);
        
        $this->load->model('localisation/geo_zone');
        $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
	
	$this->template = 'payment/dibspw.tpl';
	$this->children = array(
            'common/header',
            'common/footer',
	);
				
	$this->response->setOutput($this->render());
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