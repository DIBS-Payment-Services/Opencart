<?php echo $header; ?>
<div id = "content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?><div class="warning"><?php echo $error_warning; ?></div><?php } ?>
    <div class="box">
        <div class="heading">
            <h1><img src="" alt="DIBS" title="DIBS" style="width:95px; height:48px;border: none;" /> <?php echo $heading_title; ?></h1>
            <div class="buttons">
                <a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a>
                <a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a>
            </div>
        </div>
        <div class="content">
            <div id="tabs" class="htabs">
                <a href="#tab-general"><?php echo $tab_general; ?></a>
	    </div>
	    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <div id="tab-general">
                    <p><?php echo $text_techsite; ?></p>
                    <table class="form">
                        <tr>
                            <td><?php echo $entry_status; ?></td>
                            <td>
                                <select name="dibsfw_status">
                                    <?php if ($dibsfw_status) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
		        <tr>
                            <td><?php echo $entry_text_title; ?></td>
		            <td>
                                <?php if ($dibsfw_text_title != "") { ?>
                                <input type="text" name="dibsfw_text_title" value="<?php echo $dibsfw_text_title; ?>" />
                                <?php } else { ?>
                                <input type="text" name="dibsfw_text_title" value="<?php echo $entry_default_title; ?>" />
                                <?php } ?>
                            </td>
		        </tr>
                        <tr>
                            <td><span class="required">*</span> <?php echo $entry_mid; ?></td>
		            <td>
                                <input type="text" name="dibsfw_mid" value="<?php echo $dibsfw_mid; ?>" />
                                <?php if ($error_mid) { ?>
                                <span class="error"><?php echo $error_mid; ?></span>
                                <?php } ?>
                            </td>
		        </tr>
                        <tr>
                            <td> <?php echo $entry_key1; ?></td>
		            <td>
                                <input type="text" name="dibsfw_key1" value="<?php echo $dibsfw_key1; ?>" />
                            </td>
		        </tr>
                            <tr>
                            <td><?php echo $entry_key2; ?></td>
		            <td>
                                <input type="text" name="dibsfw_key2" value="<?php echo $dibsfw_key2; ?>" />
                            </td>
		        </tr>
		        <tr>
		            <td><?php echo $entry_testmode; ?></td>
		            <td>
                                <select name="dibsfw_testmode">
                                    <?php if ($dibsfw_testmode == 'yes') { ?>
                                    <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                    <?php } else { ?>
                                    <option value="yes"><?php echo $text_yes; ?></option>
                                    <?php } ?>
                                    <?php if ($dibsfw_testmode == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
		        <tr>
		            <td><?php echo $entry_capturenow; ?></td>
		            <td>
                                <select name="dibsfw_capturenow">
                                    <?php if ($dibsfw_capturenow == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                    <?php if ($dibsfw_capturenow == 'yes') { ?>
                                    <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                    <?php } else { ?>
                                    <option value="yes"><?php echo $text_yes; ?></option>
                                    <?php } ?>
		              </select>
                            </td>
		        </tr>
                        
                        <tr>
		            <td><?php echo $entry_uniqueoid; ?></td>
		            <td>
                                <select name="dibsfw_uniqueoid">
                                    <?php if ($dibsfw_uniqueoid == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                    <?php if ($dibsfw_uniqueoid == 'yes') { ?>
                                    <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                    <?php } else { ?>
                                    <option value="yes"><?php echo $text_yes; ?></option>
                                    <?php } ?>
		              </select>
                            </td>
		        </tr>
                        
		        <tr>
                            <td><?php echo $entry_paytype; ?></td>
		            <td>
                                <?php if ($dibsfw_paytype != "") { ?>
                                <input type="text" name="dibsfw_paytype" value="<?php echo $dibsfw_paytype; ?>" />
                                <?php } else { ?>
                                <input type="text" name="dibsfw_paytype" value="<?php echo $entry_default_paytype; ?>" />
                                <?php } ?>
                            </td>
		        </tr>
		        <tr>
		            <td><?php echo $entry_lang; ?></td>
		            <td>
                                <select name="dibsfw_lang">
                                    <?php if ($dibsfw_lang == 'en') { ?>
                                    <option value="en" selected="selected"><?php echo $text_en; ?></option>
                                    <?php } else { ?>
                                    <option value="en"><?php echo $text_en; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'da') { ?>
                                    <option value="da" selected="selected"><?php echo $text_da; ?></option>
                                    <?php } else { ?>
                                    <option value="da"><?php echo $text_da; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'fi') { ?>
                                    <option value="fi" selected="selected"><?php echo $text_fi; ?></option>
                                    <?php } else { ?>
                                    <option value="fi"><?php echo $text_fi; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_nor; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_nor; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'sv') { ?>
                                    <option value="sv" selected="selected"><?php echo $text_sv; ?></option>
                                    <?php } else { ?>
                                    <option value="sv"><?php echo $text_sv; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'de') { ?>
                                    <option value="de" selected="selected"><?php echo $text_de; ?></option>
                                    <?php } else { ?>
                                    <option value="de"><?php echo $text_de; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'es') { ?>
                                    <option value="es" selected="selected"><?php echo $text_es; ?></option>
                                    <?php } else { ?>
                                    <option value="es"><?php echo $text_es; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'fi') { ?>
                                    <option value="fi" selected="selected"><?php echo $text_fi; ?></option>
                                    <?php } else { ?>
                                    <option value="fi"><?php echo $text_fi; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'fo') { ?>
                                    <option value="fo" selected="selected"><?php echo $text_fo; ?></option>
                                    <?php } else { ?>
                                    <option value="fo"><?php echo $text_fo; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'fr') { ?>
                                    <option value="fr" selected="selected"><?php echo $text_fr; ?></option>
                                    <?php } else { ?>
                                    <option value="fr"><?php echo $text_fr; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'it') { ?>
                                    <option value="it" selected="selected"><?php echo $text_it; ?></option>
                                    <?php } else { ?>
                                    <option value="it"><?php echo $text_it; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'nl') { ?>
                                    <option value="nl" selected="selected"><?php echo $text_nl; ?></option>
                                    <?php } else { ?>
                                    <option value="nl"><?php echo $text_nl; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'pl') { ?>
                                    <option value="pl" selected="selected"><?php echo $text_pl; ?></option>
                                    <?php } else { ?>
                                    <option value="pl"><?php echo $text_pl; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_lang == 'kl') { ?>
                                    <option value="kl" selected="selected"><?php echo $text_kl; ?></option>
                                    <?php } else { ?>
                                    <option value="kl"><?php echo $text_kl; ?></option>
                                    <?php } ?>
                            </select>
                            </td>
		        </tr>
                        
                        <tr>
		            <td><?php echo $entry_decorator; ?></td>
                            <td>
                                 <select name="dibsfw_decorator">
                                    <?php if ($dibsfw_decorator == 'default') { ?>
                                    <option value="default" selected="selected"><?php echo $text_dec_default; ?></option>
                                    <?php } else { ?>
                                    <option value="default"><?php echo $text_dec_default; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_decorator == 'basal') { ?>
                                    <option value="basal" selected="selected"><?php echo $text_dec_basal; ?></option>
                                    <?php } else { ?>
                                    <option value="basal"><?php echo $text_dec_basal; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_decorator == 'rich') { ?>
                                    <option value="rich" selected="selected"><?php echo $text_dec_rich; ?></option>
                                    <?php } else { ?>
                                    <option value="rich"><?php echo $text_dec_rich; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_decorator == 'responsive') { ?>
                                    <option value="responsive" selected="selected"><?php echo $text_dec_responsive; ?></option>
                                    <?php } else { ?>
                                    <option value="responsive"><?php echo $text_dec_responsive; ?></option>
                                    <?php } ?>
                                 </select>
                            </td>
		        </tr>
                        
                        <tr>
		            <td><?php echo $entry_distrtype; ?></td>
                            <td>
                                 <select name="dibsfw_distrtype">
                                    <?php if ($dibsfw_distrtype == 'notset') { ?>
                                    <option value="notset" selected="selected"><?php echo $text_distr_type_notset; ?></option>
                                    <?php } else { ?>
                                    <option value="notset"><?php echo $text_distr_type_notset; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_distrtype == 'email') { ?>
                                    <option value="email" selected="selected"><?php echo $text_distr_type_email; ?></option>
                                    <?php } else { ?>
                                    <option value="email"><?php echo $text_distr_type_email; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibsfw_distrtype == 'paper') { ?>
                                    <option value="paper" selected="selected"><?php echo $text_distr_type_paper; ?></option>
                                    <?php } else { ?>
                                    <option value="paper"><?php echo $text_distr_type_paper; ?></option>
                                    <?php } ?>
                                 </select>
                            </td>
		        </tr>
                        
                        
                    
                        <tr>
		            <td><?php echo $entry_account; ?></td>
		            <td><input type="text" name="dibsfw_account" value="<?php echo $dibsfw_account; ?>" /></td>
		        </tr>
   
                        <tr>
                            <td><?php echo $entry_total; ?></td>
                            <td><input type="text" name="dibsfw_total" value="<?php echo $dibsfw_total; ?>" /></td>
                        </tr> 
                        <tr>
                            <td><?php echo $entry_order_status_id; ?></td>
                            <td>
                                <select name="dibsfw_order_status_id">
                                    <?php foreach ($order_statuses as $order_status) { ?>
                                        <?php if($dibsfw_order_status_id != '') {?>
                                            <?php if ($order_status['order_status_id'] == $dibsfw_order_status_id) { ?>
                                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($order_status['name'] == 'Processing') { ?>
                                                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                            <?php } ?>                                        
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $entry_geo_zone_id; ?></td>
                            <td>
                                <select name="dibsfw_geo_zone_id">
                                    <option value="0"><?php echo $text_all_zones; ?></option>
                                    <?php foreach ($geo_zones as $geo_zone) { ?>
                                    <?php if ($geo_zone['geo_zone_id'] == $dibsfw_geo_zone_id) { ?>
                                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
        	        <tr>
		            <td><?php echo $entry_sort_order; ?></td>
		            <td><input type="text" name="dibsfw_sort_order" value="<?php echo $dibsfw_sort_order; ?>" size="1" /></td>
		        </tr>
		    </table>
	        </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    <!--
    $('#tabs a').tabs();
    //-->
</script> 
<?php echo $footer; ?> 