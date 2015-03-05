<form action="<?php echo $action; ?>" method="post" id="payment">
    <p class="information"><?php echo $text_info; ?></p>
    <?php foreach ($hidden as $name => $value) { ?>
        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
    <?php } ?>
   <div class="buttons">
    <div class="pull-right">
      <input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
    </div>
  </div>
</form>