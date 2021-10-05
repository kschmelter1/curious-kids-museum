<?php

function outputLights($cols) {
  $output = '';
  for ($c = 0; $c < $cols; $c++) {
    if ($c % 2 == 0) {
      //if even output 5 lights
      $r = 5;
    } else {
      // output 6 lights
      $r = 6;
    }
    $output .= '<div class="col">';
    for ($i = 0; $i < $r; $i++) {
      $output .= '<div class="light" data-color="0"></div>';
    }
    $output .= '</div>';
  }
  return $output;
}

?>

<?php $content = get_field('about_section'); if ($content) : ?>
  <div class="home-about">
    <div class="container-fluid">
      <div class="row no-gutters align-items-center">
        <div class="order-last order-lg-first col-lg-6 col-xl-6">
          <div class="row no-gutters lights">
            <?php echo outputLights(12); ?>
          </div>
        </div>
        <div class="col-lg-6 col-xl-4">
          <div class="content">
            <?php echo $content['text']; ?>
            <?php if ($content['button']) : ?>
              <a class="btn btn-outline-yellow" href="<?php echo $content['button']['url']; ?>" <?php echo a_target($content['button']); ?>><?php get_template_part('templates/svg','yellowbtn'); ?><?php echo $content['button']['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="d-none d-xl-block col-xl-2">
          <div class="row no-gutters lights">
            <?php echo outputLights(4); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
