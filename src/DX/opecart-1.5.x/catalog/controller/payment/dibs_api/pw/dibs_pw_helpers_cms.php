<?php
class dibs_pw_helpers_cms extends Controller {
    
    protected function cms_dibs_get_orderStatusId($sStatus) {
        $oId = $this->helper_dibs_db_read_single("SELECT `order_status_id` FROM `" . 
                                          $this->helper_dibs_tools_prefix() . 
                                         "order_status` WHERE `name` = '" . 
                                         dibs_pw_api::api_dibs_sqlEncode($sStatus) . 
                                         "' LIMIT 1;", 'order_status_id');
        return ($oId !== null) ? $oId : FALSE;
    }
    
    protected function cms_dibs_get_taxes($sValue, $iTaxClass) {
        return !empty($sValue) ? $this->tax->getTax($sValue, $iTaxClass) : 0;
    }
    
    protected function cms_dibs_get_items() {
        $aItemInfo = array();
        $i = 0;
        $aItems = $this->session->data['cart'];
        foreach ($aItems as $key => $val) {
            $aItemInfo[$i]['id'] = $key;
            $aItemInfo[$i]['info'] = $this->cms_dibs_get_itemInfo($key);
            $aItemInfo[$i]['qty'] = $val;
            $aItemInfo[$i]['tax_rate'] = $this->cms_dibs_get_taxes($aItemInfo[$i]['info']['price'], 
                                                                   $aItemInfo[$i]['info']['tax_class_id']);
            $i++;
        }

        return $aItemInfo;
    }
    
    protected function cms_dibs_get_itemInfo($iId) {
        $this->load->model('catalog/product');
        $aItem = $this->model_catalog_product->getProduct($iId);
        return $aItem;
    }
    
    public function cms_dibs_applyCurrency($fAmount, $sCurrencyCode) {
        return $this->currency->convert($fAmount,
                                        $this->helper_dibs_tools_conf('config_currency',''), 
                                        $sCurrencyCode);
    }
}
?>
