<?php $logo = get_field('logo_alt','options'); $locations = get_field('locations','options');?>
<div class="footer-menu">
  <div class="container">
    <nav class="footer-nav">
      <?php if ($logo) : ?>
        <a class="logo nav-link" href="/"><img class="img-fluid" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>"></a>
      <?php endif; ?>
      <?php

        wp_nav_menu([
          'theme_location'    => 'footer',
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
  </div>
</div>

<footer>
  <div class="container footer-top">
    <div class="row justify-content-between">
      <div class="col-md-4 col-lg-5">
        <div class="row"><div class="col"><h2 class="title">Location</h2></div></div>
        <div class="row">
          <?php foreach ($locations as $loc) : ?>
            <div class="col-md-auto footer-locations">
              <address>
                <?php echo '<span>'.$loc['name'].'</span>'.'<br>'.$loc['address']['street'].'<br>'.$loc['address']['city'].', '.$loc['address']['state'].' '.$loc['address']['zip'];?>
                <br>
                <a href="tel:<?php echo clean_phone($loc['phone']);?>"><?php echo $loc['phone'];?></a>
              </address>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-md-4 col-lg-3 footer-admission">
        <?php echo get_field('admission','options'); ?>
      </div>

      <div class="col-md-4 col-lg-3 footer-quicklinks">
        <h2 class="title">Quick Links</h2>
        <?php

          wp_nav_menu([
            'theme_location'    => 'quicklinks',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'nav flex-column',
            'echo'				=> true,
            'walker'            => new bs4Navwalker()
          ]);

        ?>
      </div>
    </div>
  </div>

  <div class="footer-credit">
    <div class="container">
      <span class="copy">&copy; <?php echo date('Y'); ?> <a href="<?php echo get_bloginfo('url');?>"><?php echo get_bloginfo('name');?></a></span> <span class="divider">&bull;</span> <span class="credit">Designed by <a href="https://compulse.com/" target="_blank">Compulse Integrated Marketing</a></span>
    </div>
  </div>

  <div class="footer-seo">
    <div class="container">
      <?php echo get_field('locality_footer_text','options'); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
