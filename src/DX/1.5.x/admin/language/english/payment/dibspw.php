<?php
    // Heading
    $_['heading_title']         = 'DIBS Payment Window';
                                            
    // Text                                     
    $_['text_auto']             = 'Auto';
    $_['text_standard']         = 'DIBS Payment Window';
    $_['text_yes']              = 'yes';
    $_['text_no']               = 'no';
    $_['text_success']          = 'Success: You have modified DIBS account details!';
    $_['text_dempty']           = '-'; 
    $_['text_demail']           = 'Email';
    $_['text_dpaper']           = 'Paper';
    $_['text_payment']          = 'Payment';
    $_['text_da']               = 'Danish';
    $_['text_nl']               = 'Dutch';
    $_['text_en']               = 'English';
    $_['text_fo']               = 'Faroese';
    $_['text_fi']               = 'Finnish';
    $_['text_fr']               = 'French';
    $_['text_de']               = 'German';
    $_['text_it']               = 'Italian';
    $_['text_nor']              = 'Norwegian';
    $_['text_pl']               = 'Polish';
    $_['text_es']               = 'Spanish';
    $_['text_sv']               = 'Swedish';
    $_['text_dibspw']           = '<a onclick="window.open(\'http://dibspayment.com/\');">
                                       <img src="http://tech.dibspayment.com/sites/tech/files/pictures/LOGO/DIBS/DIBS_logo_blue.png" alt="DIBS" title="DIBS" style="width:95px; height:48px;border: none;" />
                                   </a>';
    $_['text_techsite']         = 'Detailed description of configuration parameters can be found on our <a href="http://tech.dibs.dk" target="_blank">Tech site</a>.';
    // Entry          
    $_['entry_status'] 	        = 'Status:' .
                                  '<br /><span class="help">' . 
                                      'Module status.' .
                                  '</span>';
    $_['entry_lang'] 	        = 'Language:' .
                                  '<br /><span class="help">' . 
                                      'Language of Payment Window.' .
                                  '</span>';
    $_['entry_default_title']   = 'DIBS Payment Window';
    $_['entry_text_title']      = 'Title:' .
                                  '<br /><span class="help">' . 
                                      'Payment module title showed by OpenCart to customer.' .
                                  '</span>';
    $_['entry_testmode']        = 'Test:' .
                                  '<br /><span class="help">' . 
                                      'Run module in test mode.' .
                                  '</span>';
    $_['entry_mid']             = 'Merchant ID:' .
                                  '<br /><span class="help">' . 
                                      'Your merchant ID in DIBS system.' .
                                  '</span>';
    
    $_['entry_pid']             = 'Partner ID:' .
                                  '<br /><span class="help">' . 
                                      'Partner ID.' .
                                  '</span>';
	
    $_['entry_paytype']         = 'Paytype:' .
                                  '<br /><span class="help">' . 
                                      'Comma-separated paytypes available for customers (e.g.: VISA,MC).' .
                                  '</span>';
    $_['entry_default_paytype'] = '';
    $_['entry_fee']          	= 'Add fee:' .
                                  '<br /><span class="help">' . 
                                      'Customers pays fee.' .
                                  '</span>';
    $_['entry_capturenow']      = 'Capture now:' .
                                  '<br /><span class="help">' . 
                                      'Function to automatically capture the transaction upon a successful authorization (DIBS PW only).' .
                                  '</span>';
    $_['entry_sort_order']   	= 'Sort Order:';
    $_['entry_hmac']          	= 'HMAC:' .
                                  '<br /><span class="help">' . 
                                      'Transaction protection key.' .
                                  '</span>';

    $_['entry_account']         = 'Account:' .
                                  '<br /><span class="help">' . 
                                      'Account ID used to visually separate transactions in admin.' .
                                  '</span>';
    $_['entry_distr']        	= 'Distribution type:' .
                                  '<br /><span class="help">' . 
                                      'Only relevant for invoice payment types (DIBS PW only).' .
                                  '</span>';
    $_['entry_order_status_id'] = 'Order Status:' .
                                  '<br /><span class="help">' . 
                                      'Order status after success payment.' .
                                  '</span>';
    $_['entry_geo_zone_id']        = 'Geo Zone:';
    $_['entry_total']           = 'Total:<br /><span class="help">' . 
                                  'The checkout total the order must reach' .
                                  ' before this payment method becomes active.</span>';

    // Error
    $_['error_permission']      = 'Warning: You do not have permission to modify payment DIBS!';
    $_['error_warning']         = 'Warning: Please check the form carefully for errors!';
    $_['error_mid']             = 'Merchant ID Required!';  
    $_['entry_logos']            = 'DIBS logo:'
                                    .
                                  '<br /><span class="help">' . 
                                  'How to use dibs logos, please read here: <a target="_blank" href="https://github.com/DIBS-Payment-Services/Opencart">https://github.com/DIBS-Payment-Services/Opencart</a> in Readme section '.
                                  '</span>';