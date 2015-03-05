<?php 
class ModelPaymentDibspw extends Model {
    public function getMethod($address, $total) {
        //$this->load->language('payment/dibspw');
	
	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . 
                                  "zone_to_geo_zone WHERE geo_zone_id = '" . 
                                  (int)$this->config->get('dibspw_geo_zone_id') . 
                                  "' AND country_id = '" . (int)$address['country_id'] . 
                                  "' AND (zone_id = '" . (int)$address['zone_id'] . 
                                  "' OR zone_id = '0')");
		
	if ($this->config->get('dibspw_total') > $total) {
            $status = false;
	}
        elseif (!$this->config->get('dibspw_geo_zone_id')) {
            $status = true;
	}
        elseif ($query->num_rows) {
            $status = true;
	}
        else {
            $status = false;
	}	
		
	$method_data = array();
	
        $sTitle = "";
        $sUsersTitle = $this->config->get('dibspw_text_title');
        if(!empty($sUsersTitle)) {
            $sTitle = $sUsersTitle;
        }
        else $sTitle = $this->language->get('text_title');
        if ($status) {  
            $method_data = array( 
                'code'       => 'dibspw',
                'title'      => $sTitle,
                'terms'       => '',
                'sort_order' => $this->config->get('dibspw_sort_order')
            );
        }
   
        return $method_data;
    }
}
?>