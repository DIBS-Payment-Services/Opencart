<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerPaymentDibsfw extends Controller {
     public function index() {
         $this->language->load('payment/dibsfw');
	
        $this->load->model('setting/setting');
			
	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('dibsfw', $this->request->post);				
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
        $this->data['dibsfw_text_title'] = $this->language->get('dibsfw_text_title');
        $this->data['entry_default_title'] = $this->language->get('entry_default_title');
        $this->data['entry_mid'] = $this->language->get('entry_mid');
        $this->data['entry_pid'] = $this->language->get('entry_pid');
        $this->data['dibsfw_mid'] = $this->language->get('dibsfw_mid');
        $this->data['entry_key1'] = $this->language->get('entry_key1');
        $this->data['entry_key2'] = $this->language->get('entry_key2');
        $this->data['dibsfw_pid'] = $this->language->get('dibsfw_pid');
        $this->data['entry_hmac'] = $this->language->get('entry_hmac');
        $this->data['dibsfw_hmac'] = $this->language->get('dibsfw_hmac');
        $this->data['entry_testmode'] = $this->language->get('entry_testmode');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['entry_mid'] = $this->language->get('entry_mid');
        $this->data['text_no'] = $this->language->get('text_no');
        
         $this->data['entry_uniqueoid'] = $this->language->get('entry_uniqueoid');
        
        $this->data['text_de'] = $this->language->get('text_de');
        $this->data['text_pl'] = $this->language->get('text_pl');
        
        $this->data['text_es'] = $this->language->get('text_es');
        $this->data['text_fo'] = $this->language->get('text_fo');
        $this->data['text_it'] = $this->language->get('text_it');
        
        $this->data['text_nl'] = $this->language->get('text_nl');
        $this->data['text_kl'] = $this->language->get('text_kl');
        $this->data['text_fr'] = $this->language->get('text_fr');
        
        $this->data['text_distr_type_notset'] = $this->language->get('text_distr_type_notset');
        $this->data['text_distr_type_email']  = $this->language->get('text_distr_type_email');
        $this->data['text_distr_type_paper'] = $this->language->get('text_distr_type_paper');
        $this->data['entry_distrtype'] = $this->language->get('entry_distrtype');
        
        $this->data['entry_fee'] = $this->language->get('entry_fee');
        $this->data['dibsfw_fee'] = $this->language->get('dibsfw_fee');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['entry_capturenow'] = $this->language->get('entry_capturenow');
        $this->data['dibsfw_capturenow'] = $this->language->get('dibsfw_capturenow');
        $this->data['entry_paytype'] = $this->language->get('entry_paytype');
        $this->data['dibsfw_paytype'] = $this->language->get('dibsfw_paytype');
        $this->data['entry_default_paytype'] = $this->language->get('entry_default_paytype');
        $this->data['entry_lang'] = $this->language->get('entry_lang');
        $this->data['text_da'] = $this->language->get('text_da');
        $this->data['text_fi'] = $this->language->get('text_fi');
        $this->data['text_nor'] = $this->language->get('text_nor');
        $this->data['text_sv'] = $this->language->get('text_sv');
        $this->data['entry_account'] = $this->language->get('entry_account');
        $this->data['entry_decorator'] = $this->language->get('entry_decorator');
        $this->data['text_dec_default'] = $this->language->get('text_dec_default');
        $this->data['text_dec_basal'] = $this->language->get('text_dec_basal');
        $this->data['text_dec_rich'] = $this->language->get('text_dec_rich');
        $this->data['text_dec_responsive'] = $this->language->get('text_dec_responsive');
        $this->data['dibsfw_account'] = $this->language->get('dibsfw_account');
        $this->data['dibsfw_distr'] = $this->language->get('dibsfw_distr');
        $this->data['text_dempty'] = $this->language->get('text_dempty');
        $this->data['text_demail'] = $this->language->get('text_demail');
        $this->data['text_dpaper'] = $this->language->get('text_dpaper');
        $this->data['entry_total'] = $this->language->get('entry_total');
        $this->data['dibsfw_total'] = $this->language->get('dibsfw_total');
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
            'href'      => $this->url->link('payment/dibsfw', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);
				
	$this->data['action'] = $this->url->link('payment/dibsfw', 'token=' . $this->session->data['token'], 'SSL');
	$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->load->model('localisation/order_status');
	$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        $this->loadSettings($this->data);
        
        $this->load->model('localisation/geo_zone');
        $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
	
	$this->template = 'payment/dibsfw.tpl';
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
                $sTmpKey = str_replace("entry_","dibsfw_",$key);
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
        if (!$this->user->hasPermission('modify', 'payment/dibsfw')) {
            $this->error['warning'] = $this->language->get('error_permission');
	}
		
	if (isset($this->request->post['dibsfw_mid']) && strlen(trim($this->request->post['dibsfw_mid'])) == 0) {
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