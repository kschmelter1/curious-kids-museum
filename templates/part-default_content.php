<?php $side_img = get_field('side_image'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg">
<?php
  $blocks = (get_field('content'));
  if ($blocks) {
    $x = 0;
    foreach ($blocks as $block) :
      include( locate_template( 'templates/block-'.$block['acf_fc_layout'].'.php', false, false ) );
      $x++;
    endforeach;
  } else {
    ?><div class="single-content"><?php
    if (get_field('event_date')) {
      echo '<div class="post-date">';
      echo date('l, F j, Y', strtotime(get_field('event_date')));
      if (get_field('end_date')) {
        echo ' to '.date('l, F j, Y', strtotime(get_field('end_date')));
      }
      echo '</div>';
    }
    the_content();
    ?></div><?php
  }
?>
    </div>
    <?php if ($side_img) : ?>
      <div class="col-lg-5">
        <div class="side-image">
          <div class="img-wrap">
            <?php echo print_img($side_img, 'large'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
