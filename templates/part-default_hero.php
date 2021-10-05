<?php
  if (get_field('banner')) {
    $banner = get_field('banner');
  } elseif (get_field('featured_image')) {
    $banner = get_field('featured_image');
  } else {
    $banner = get_field('default_banner','options');
  }
  ?>
  <div class="default-hero" style="background-image:url('<?php echo $banner['url'];?>')" >
    <?php get_template_part('templates/part','navigation'); ?>
    <div class="container"><div class="content">
      <h1><?php echo get_the_title(); ?></h1>
    </div></div>
  </div>

<?php $menu = get_field('menu'); if ($menu) : ?>
<div class="default-hero-nav"><div class="container">
  <?php if (get_field('side_image')) : ?><div class="row"><div class="col-lg-7"><?php endif; ?>
<nav>
  <?php

    wp_nav_menu([
      'menu'    => $menu,
      'depth'             => 2,
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => 'nav',
      'echo'				=> true,
      'walker'            => new bs4Navwalker()
    ]);

  ?>
  </nav>
<?php if (get_field('side_image')) : ?></div></div><?php endif; ?>
</div></div>
<?php endif; ?>
