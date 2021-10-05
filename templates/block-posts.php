<?php
$ppp = get_option( 'posts_per_page' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array(
  'post_type'        => $block['type'], // You can add a custom post type if you like
  'paged'            => $paged,
  'posts_per_page'   => $ppp,
  'meta_key'         => 'event_date',
  'orderby'          => [
        'meta_value_num' => 'ASC',
        'post_date'      => 'DESC'
  ]
));
?>
<div class="block block-posts">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="row justify-content-between align-items-end single-blog">
        <div class="col-sm-12 text-col">
              <div class="single-item">
                <?php $date = get_field('event_date'); $dm = date('D M', strtotime($date)); $day = date('j', strtotime($date));?>
                <div class="date-wrap"><div class="date"><span><?php echo $dm; ?></span><span><?php echo $day;?></span></div></div>
                <div class="content">
                  <h2 class="item-title"><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                  <div class="item-text"><?php the_excerpt(); ?></div>
                  <div class="learn-more"><?php echo btn_outline_yellow(get_the_permalink($p->ID), 'Learn More', '');?></div>
                </div>
              </div>
        </div>
      <?php /*  <div class="col-sm-9 img-col">
          <?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
          <div class="img-wrap"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $alt; ?>"></div>
        </div> */ ?>
      </div>
    		<?php endwhile; ?>


        <div class="row"><div class="col">
    		<nav class="nav nav-posts justify-content-between">
    			<div class="nav-link prev"><?php next_posts_link('<i class="fas fa-caret-left"></i> Older Posts'); ?></div>
    			<div class="nav-link next"><?php previous_posts_link('Newer Posts <i class="fas fa-caret-right"></i>'); ?></div>
    		</nav>
        </div></div>

    		<?php wp_reset_postdata(); ?>
</div>
