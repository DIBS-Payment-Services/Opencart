<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-bluepay-redirect" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo $button_save; ?></button>
                <a href="<?php echo $cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i> <?php echo $button_cancel; ?></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-bluepay-redirect" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-2 control-label"  for="input-test"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_status" class="form-control">
                                <?php if ($dibsfw_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-title"><?php echo $entry_text_title; ?></label>
                        <div class="col-sm-10">
                            <?php if ($dibsfw_text_title != "") { ?>
                            <input type="text" name="dibsfw_text_title" class="form-control" value="<?php echo $dibsfw_text_title; ?>" />
                            <?php } else { ?>
                            <input type="text" name="dibsfw_text_title" class="form-control" value="<?php echo $entry_default_title; ?>" />
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-partnerid"><?php echo $entry_mid; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="dibsfw_mid" class="form-control" value="<?php echo $dibsfw_mid; ?>" />
                            <?php if ($error_mid) { ?>
                            <span class="error"><?php echo $error_mid; ?></span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-partnerid"><?php echo $entry_pid; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="dibsfw_pid" class="form-control" value="<?php echo $dibsfw_pid; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-hmac"><?php echo $entry_key1; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="dibsfw_key1" class="form-control" value="<?php echo $dibsfw_key1; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-hmac"><?php echo $entry_key2; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="dibsfw_key2" class="form-control" value="<?php echo $dibsfw_key2; ?>" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-testmode"><?php echo $entry_testmode; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_testmode" class="form-control">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_fee; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_fee" class="form-control">
                                <?php if ($dibsfw_fee == 'no') { ?>
                                <option value="no" selected="selected"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="no"><?php echo $text_no; ?></option>
                                <?php } ?>
                                <?php if ($dibsfw_fee == 'yes') { ?>
                                <option value="yes" selected="selected"><?php echo $text_yes; ?></option>
                                <?php } else { ?>
                                <option value="yes"><?php echo $text_yes; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_capturenow; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_capturenow" class="form-control">
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
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_decorator; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_decorator" class="form-control">
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
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-debug"><?php echo $entry_paytype; ?></label>
                        <div class="col-sm-10">
                            <?php if ($dibsfw_paytype != "") { ?>
                            <input type="text" name="dibsfw_paytype" class="form-control"    value="<?php echo $dibsfw_paytype; ?>" />
                            <?php } else { ?>
                            <input type="text" name="dibsfw_paytype" class="form-control"   value="<?php echo $entry_default_paytype; ?>" />
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-account"><?php echo $entry_account; ?></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="dibsfw_account" value="<?php echo $dibsfw_account; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_lang; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_lang" class="form-control">
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

                                <?php if ($dibsfw_lang == 'nb') { ?>
                                <option value="nb" selected="selected"><?php echo $text_nor; ?></option>
                                <?php } else { ?>
                                <option value="nb"><?php echo $text_nor; ?></option>
                                <?php } ?>       
                                <?php if ($dibsfw_lang == 'sv') { ?>
                                <option value="sv" selected="selected"><?php echo $text_sv; ?></option>
                                <?php } else { ?>
                                <option value="sv"><?php echo $text_sv; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_uniqueoid; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_uniqueoid" class="form-control">
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
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_distrtype; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_distrtype" class="form-control">
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
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_order_status_id; ?></label>
                        <div class="col-sm-10">
                            <select name="dibsfw_order_status_id" class="form-control">
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>