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
        $data['dibsfw_text_title'] = $this->language->get('dibsfw_text_title');
        $data['entry_default_title'] = $this->language->get('entry_default_title');
        $data['entry_mid'] = $this->language->get('entry_mid');
        $data['entry_pid'] = $this->language->get('entry_pid');
        $data['dibsfw_mid'] = $this->language->get('dibsfw_mid');
        $data['entry_key1'] = $this->language->get('entry_key1');
        $data['entry_key2'] = $this->language->get('entry_key2');
        $data['dibsfw_pid'] = $this->language->get('dibsfw_pid');
        $data['entry_hmac'] = $this->language->get('entry_hmac');
        $data['dibsfw_hmac'] = $this->language->get('dibsfw_hmac');
        $data['entry_testmode'] = $this->language->get('entry_testmode');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['entry_mid'] = $this->language->get('entry_mid');
        $data['text_no'] = $this->language->get('text_no');
        $data['dibsfw_pid'] = $this->language->get('dibsfw_pid');
        $data['entry_uniqueoid'] = $this->language->get('entry_uniqueoid');
        $data['text_edit'] =  $this->language->get('text_edit');
        $data['text_de'] = $this->language->get('text_de');
        $data['text_pl'] = $this->language->get('text_pl');
        
        $data['text_es'] = $this->language->get('text_es');
        $data['text_fo'] = $this->language->get('text_fo');
        $data['text_it'] = $this->language->get('text_it');
        
        $data['text_nl'] = $this->language->get('text_nl');
        $data['text_kl'] = $this->language->get('text_kl');
        $data['text_fr'] = $this->language->get('text_fr');
        
        $data['text_distr_type_notset'] = $this->language->get('text_distr_type_notset');
        $data['text_distr_type_email']  = $this->language->get('text_distr_type_email');
        $data['text_distr_type_paper'] = $this->language->get('text_distr_type_paper');
        $data['entry_distrtype'] = $this->language->get('entry_distrtype');
        
        $data['entry_fee'] = $this->language->get('entry_fee');
        $data['dibsfw_fee'] = $this->language->get('dibsfw_fee');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['entry_capturenow'] = $this->language->get('entry_capturenow');
        $data['dibsfw_capturenow'] = $this->language->get('dibsfw_capturenow');
        $data['entry_paytype'] = $this->language->get('entry_paytype');
        $data['dibsfw_paytype'] = $this->language->get('dibsfw_paytype');
        $data['entry_default_paytype'] = $this->language->get('entry_default_paytype');
        $data['entry_lang'] = $this->language->get('entry_lang');
        $data['text_da'] = $this->language->get('text_da');
        $data['text_fi'] = $this->language->get('text_fi');
        $data['text_nor'] = $this->language->get('text_nor');
        $data['text_sv'] = $this->language->get('text_sv');
        $data['entry_account'] = $this->language->get('entry_account');
        $data['entry_decorator'] = $this->language->get('entry_decorator');
        $data['text_dec_default'] = $this->language->get('text_dec_default');
        $data['text_dec_basal'] = $this->language->get('text_dec_basal');
        $data['text_dec_rich'] = $this->language->get('text_dec_rich');
        $data['text_dec_responsive'] = $this->language->get('text_dec_responsive');
        $data['dibsfw_account'] = $this->language->get('dibsfw_account');
        $data['dibsfw_distr'] = $this->language->get('dibsfw_distr');
        $data['text_dempty'] = $this->language->get('text_dempty');
        $data['text_demail'] = $this->language->get('text_demail');
        $data['text_dpaper'] = $this->language->get('text_dpaper');
        $data['entry_total'] = $this->language->get('entry_total');
        $data['dibsfw_total'] = $this->language->get('dibsfw_total');
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
            'href'      => $this->url->link('payment/dibsfw', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
   	);
				
	$data['action'] = $this->url->link('payment/dibsfw', 'token=' . $this->session->data['token'], 'SSL');
	$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->load->model('localisation/order_status');
	$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        $this->loadSettings($data);
        
        $this->load->model('localisation/geo_zone');
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
	
	$this->template = 'payment/dibsfw.tpl';
	$this->children = array(
            'common/header',
            'common/footer',
	);
				
	//$this->response->setOutput($this-

         $data['header'] = $this->load->controller('common/header');
         $data['column_left'] = $this->load->controller('common/column_left');
         $data['footer'] = $this->load->controller('common/footer');
         $this->response->setOutput($this->load->view('payment/dibsfw.tpl', $data));
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