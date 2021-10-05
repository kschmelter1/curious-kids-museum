<div class="block block-gallery">
  <!-- Slider main container -->
  <div class="swiper-container">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper my-gallery .lightgallery" id="lightgallery">
    <!-- Slides -->
    <?php foreach ($block['gallery'] as $img) : ?>
    <div class="swiper-slide">
      <div class="border-wrap">
      <div class="item" data-src="<?php echo $img['url'];?>">
        <div class="overlay"><i class="fal fa-search-plus"></i></div>
        <div class="img-wrap">
        <img src="<?php echo $img['url'];?>" class="img-fluid" alt="<?php echo $img['alt'];?>"/>
        </div>
      </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>

  <!-- If we need navigation buttons -->
  </div>

  <div class="swiper-navigation">
  <div class="swiper-button-prev"><i class="far fa-chevron-left"></i></div>
  <div class="pagination-wrapper"><div class="swiper-pagination"></div></div>
  <div class="swiper-button-next"><i class="far fa-chevron-right"></i></div>
  </div>
</div>
