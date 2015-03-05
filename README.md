Opencart
=======

In versions for DX ( opencart_1.5.x_dibspw_dx_4.1.7, opencart_2.0_4.1.5_dx_dibspw ) was added DIBS logos

http://tech.dibspayment.com/logos#check-out-logos

If you want to use these logos in module go to logo page, http://tech.dibspayment.com/logos#check-out-logos choose logo and copy html markup. Then go to module admin settings.

For Opencart 1.5.x
==================

  - Find **DIBS logo:** textarea
  - Paste logo HTML marckup in textarea
  - Save changes
  
Then you have to modify template file : **catalog\view\theme\default\template\checkout\payment_method.tpl**

Find line 15
------------
    <td><label for="<?php echo $payment_method['code']; ?>"><?php echo $payment_method['title']; ?></label>
And insert after this line the following php code:
--------------------------------------------------
    <?php if( $payment_method['code'] == 'dibspw'){echo htmlspecialchars_decode($this->config->get('dibspw_logos'));} ?>

For Opencart 2.0.x
==================
  - Find **DIBS logo:** textarea
  - Paste logo HTML marckup in textarea
  - Save changes

Then you have to modify template file : **catalog\view\theme\default\template\checkout\payment_method.tpl**

Find line 18 
------------
    <?php } ?>
  
and after this line insert the this code in template:

    <?php if ( isset($payment_method['logo']) && $payment_method['logo'] ) { ?>
    <?php    echo $payment_method['logo']; ?>
    <?php } ?>



