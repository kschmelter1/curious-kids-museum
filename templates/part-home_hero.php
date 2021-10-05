<?php $hero = get_field('hero'); if ($hero) : ?>
  <div class="home-hero">
    <?php get_template_part('templates/part','navigation'); ?>

    <div class="swiper-container">

        <div class="swiper-wrapper">
            <?php foreach ($hero as $slide) : ?>
              <div class="swiper-slide" style="background-image:url('<?php echo $slide['background']['url'];?>')">
                <?php if ($slide['video']) {include( locate_template( 'templates/part-video_banner.php', false, false ) );}?>
                <div class="content">
                  <?php echo ($slide['title'] ? '<h1>'.$slide['title'].'</h1>' : ''); ?>
                  <?php echo ($slide['subtitle'] ? '<div class="subtitle">'.$slide['subtitle'].'</div>' : ''); ?>
                  <?php if ($slide['button']) : ?><a class="btn btn-outline-yellow" href="<?php echo $slide['button']['url']; ?>" <?php echo a_target($slide['button']); ?>><?php get_template_part('templates/svg','yellowbtn'); ?><?php echo $slide['button']['title']; ?></a><?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
        </div>

        <?php if (count($hero) > 1) : ?>
          <div class="swiper-pagination-wrapper">
            <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
