<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?><div class="warning"><?php echo $error_warning; ?></div><?php } ?>
    <div class="box">
        <div class="heading">
            <h1><img src="view/image/payment/dibspw_small.gif" alt="" /> <?php echo $heading_title; ?></h1>
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
                                <select name="dibspw_status">
                                    <?php if ($dibspw_status) { ?>
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
                                <?php if ($dibspw_text_title != "") { ?>
                                <input type="text" name="dibspw_text_title" value="<?php echo $dibspw_text_title; ?>" />
                                <?php } else { ?>
                                <input type="text" name="dibspw_text_title" value="<?php echo $entry_default_title; ?>" />
                                <?php } ?>
                            </td>
		        </tr>
                        <tr>
                            <td><span class="required">*</span> <?php echo $entry_mid; ?></td>
		            <td>
                                <input type="text" name="dibspw_mid" value="<?php echo $dibspw_mid; ?>" />
                                <?php if ($error_mid) { ?>
                                <span class="error"><?php echo $error_mid; ?></span>
                                <?php } ?>
                            </td>
		        </tr>
                        <tr>
                            <td><?php echo $entry_hmac; ?></td>
                            <td><input type="text" name="dibspw_hmac" value="<?php echo $dibspw_hmac; ?>" /></td>
                        </tr>
		        <tr>
		            <td><?php echo $entry_testmode; ?></td>
		            <td>
                                <select name="dibspw_testmode">
                                    <?php if ($dibspw_testmode == 'yes') { ?>
                                    <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                    <?php } else { ?>
                                    <option value="yes"><?php echo $text_yes; ?></option>
                                    <?php } ?>
                                    <?php if ($dibspw_testmode == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
		        <tr>
		            <td><?php echo $entry_fee; ?></td>
		            <td>
                                <select name="dibspw_fee">
                                    <?php if ($dibspw_fee == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                    <?php if ($dibspw_fee == 'yes') { ?>
                                    <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                    <?php } else { ?>
                                    <option value="yes"><?php echo $text_yes; ?></option>
                                    <?php } ?>
		              </select>
                            </td>
		        </tr>
		        <tr>
		            <td><?php echo $entry_capturenow; ?></td>
		            <td>
                                <select name="dibspw_capturenow">
                                    <?php if ($dibspw_capturenow == 'no') { ?>
                                    <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                    <?php } else { ?>
                                    <option value="no"><?php echo $text_no; ?></option>
                                    <?php } ?>
                                    <?php if ($dibspw_capturenow == 'yes') { ?>
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
                                <?php if ($dibspw_paytype != "") { ?>
                                <input type="text" name="dibspw_paytype" value="<?php echo $dibspw_paytype; ?>" />
                                <?php } else { ?>
                                <input type="text" name="dibspw_paytype" value="<?php echo $entry_default_paytype; ?>" />
                                <?php } ?>
                            </td>
		        </tr>
		        <tr>
		            <td><?php echo $entry_lang; ?></td>
		            <td>
                                <select name="dibspw_lang">
                                    <?php if ($dibspw_lang == 'en_UK') { ?>
                                    <option value="en_UK" selected="selected"><?php echo $text_en; ?></option>
                                    <?php } else { ?>
                                    <option value="en_UK"><?php echo $text_en; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibspw_lang == 'da_DK') { ?>
                                    <option value="da_DK" selected="selected"><?php echo $text_da; ?></option>
                                    <?php } else { ?>
                                    <option value="da_DK"><?php echo $text_da; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibspw_lang == 'fi_FIN') { ?>
                                    <option value="fi_FIN" selected="selected"><?php echo $text_fi; ?></option>
                                    <?php } else { ?>
                                    <option value="fi_FIN"><?php echo $text_fi; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibspw_lang == 'nb_NO') { ?>
                                    <option value="nb_NO" selected="selected"><?php echo $text_nor; ?></option>
                                    <?php } else { ?>
                                    <option value="nb_NO"><?php echo $text_nor; ?></option>
                                    <?php } ?>
                                    
                                    <?php if ($dibspw_lang == 'sv_SE') { ?>
                                    <option value="sv_SE" selected="selected"><?php echo $text_sv; ?></option>
                                    <?php } else { ?>
                                    <option value="sv_SE"><?php echo $text_sv; ?></option>
                                    <?php } ?>
		              </select>
                            </td>
		        </tr>
                        <tr>
		            <td><?php echo $entry_account; ?></td>
		            <td><input type="text" name="dibspw_account" value="<?php echo $dibspw_account; ?>" /></td>
		        </tr>
                        <tr>
		            <td><?php echo $entry_distr; ?></td>
		            <td>
                                <select name="dibspw_distr">
                                    <?php if ($dibspw_distr == 'empty') { ?>
                                    <option value="empty" selected="selected"><?php echo $text_dempty; ?></option>
                                    <?php } else { ?>
                                    <option value="empty"><?php echo $text_dempty; ?></option>
                                    <?php } ?>
                                    <?php if ($dibspw_distr == 'email') { ?>
                                    <option value="email" selected="selected"><?php echo $text_demail; ?></option>
                                    <?php } else { ?>
                                    <option value="email"><?php echo $text_demail; ?></option>
                                    <?php } ?>
                                    <?php if ($dibspw_distr == 'paper') { ?>
                                    <option value="paper" selected="selected"><?php echo $text_dpaper; ?></option>
                                    <?php } else { ?>
                                    <option value="paper"><?php echo $text_dpaper; ?></option>
                                    <?php } ?>
		              </select>
                            </td>
		        </tr>
                        <tr>
                            <td><?php echo $entry_total; ?></td>
                            <td><input type="text" name="dibspw_total" value="<?php echo $dibspw_total; ?>" /></td>
                        </tr> 
                        <tr>
                            <td><?php echo $entry_order_status_id; ?></td>
                            <td>
                                <select name="dibspw_order_status_id">
                                    <?php foreach ($order_statuses as $order_status) { ?>
                                        <?php if($dibspw_order_status_id != '') {?>
                                            <?php if ($order_status['order_status_id'] == $dibspw_order_status_id) { ?>
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
                                <select name="dibspw_geo_zone_id">
                                    <option value="0"><?php echo $text_all_zones; ?></option>
                                    <?php foreach ($geo_zones as $geo_zone) { ?>
                                    <?php if ($geo_zone['geo_zone_id'] == $dibspw_geo_zone_id) { ?>
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
		            <td><input type="text" name="dibspw_sort_order" value="<?php echo $dibspw_sort_order; ?>" size="1" /></td>
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