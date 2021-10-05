<?php if (get_field('display_alert','alerts')) : ?>
  <div id="alert">
    <div class="container">
      <div class="text text-center">
        <?php echo get_field('alert_text','alerts'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php $locs = get_field('locations','options'); $bar = get_field('topbar','options');?>
<div id="top-bar">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-12 col-sm-auto">
        <?php if ($bar['display_time']) {get_template_part('templates/part','hours_widget');} ?>
        <?php if ($bar['display_phone']) : ?>
        <div class="ck-phone"><span class="label">Call us for more info:</span> <?php
          for ($i = 0; $i < count($locs); $i++) {
            if ($locs[$i]['phone']) :
              if ($i > 0) {echo ' <span class="divider">•</span> ';}
              echo '<span class="phone">'.$locs[$i]['short_name'].': <a href="tel:'.clean_phone($locs[$i]['phone']).'">'.$locs[$i]['phone'].'</a></span>';
            endif;
          } ?>
        </div>
      <?php endif; ?>
      </div>
      <?php if ($bar['link']) : ?>
      <div class="col-auto">
        <a class="directions" href="<?php echo $bar['link']['url'];?>" <?php echo a_target($bar['link']); ?>><?php echo $bar['link']['title'];?> <i class="fas fa-caret-right"></i></a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
