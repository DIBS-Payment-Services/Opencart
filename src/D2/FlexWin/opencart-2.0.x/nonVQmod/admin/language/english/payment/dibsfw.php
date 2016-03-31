<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    // Heading
    $_['heading_title']         = 'DIBS FlexWin';
    $_['text_edit']             = 'Edit DIBS FlexWin';
                                            
    // Text                                     
    $_['text_auto']             = 'Auto';
    $_['text_standard']         = 'DIBS FlixWin';
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
    $_['text_dec_default']      = 'Default';
    $_['text_dec_basal']        = 'Basal';
    $_['text_dec_rich']         = 'Rich';
    $_['text_dec_responsive']   = 'Responsive';
    $_['ord_desc_title']        = 'Description';
    $_['ord_price_title']       = 'Price';
    $_['entry_uniqueoid']       = 'Uniqueoid';
    $_['entry_pid']             = 'Partner ID:';
    
    $_['text_distr_type_notset'] = 'Notset';
    $_['text_distr_type_email']  = 'Email';
    $_['text_distr_type_paper']  = 'Paper';
    
    $_['text_info']              = 'Payment with DIBS Flex Win';
    
    $_['text_dibsfw']            = '<a onclick="window.open(\'http://dibspayment.com/\');">
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
    $_['entry_decorator'] 	        = 'Decorator:' .
                                  '<br /><span class="help">' . 
                                      'Decoretor.' .
                                  '</span>';
    $_['entry_distrtype']       = 'Distribution type:' .
                                  '<br /><span class="help">' . 
                                      'Which media the bill should be sent to the customer.' .
                                  '</span>';
    
    $_['entry_default_title']   = 'DIBS FlexWin';
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
    $_['entry_key1']             = 'Key1:' .
                                  '<br /><span class="help">' . 
                                      'Your k1 keySecret key. Need to calculate MD5 key.' .
                                  '</span>';
    $_['entry_key2']             = 'Key2:' .
                                  '<br /><span class="help">' . 
                                      'Your k1 keySecret key. Need to calculate MD5 key.' .
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