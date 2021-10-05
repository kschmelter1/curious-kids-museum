<?php $sections = get_field('news_sections'); if ($sections) : ?>
  <div class="home-news">
    <div class="container">
      <div class="row">
        <?php foreach ($sections as $section) : ?>
          <?php
          $args = array(
                'post_type' => $section['type'],
                'posts_per_page' => $section['number_of_posts']
                );
          $posts = get_posts($args);  if ($posts) : ?>
          <div class="col-lg <?php echo $section['type'];?>">
              <div class="news-content">
            <div class="title">
              <h2 class="title-text"><?php echo $section['title']; ?></h2>
              <a href="<?php echo $section['link']['url'];?>" class="title-link"><?php echo $section['link']['title'];?> <i class="fas fa-caret-right"></i></a>
            </div>
            <div class="posts">
              <?php foreach ($posts as $p) : ?>
                <div class="single-item">
                  <?php if (get_field('event_date',$p->ID)) {$date = get_field('event_date',$p->ID);}
                        else {$date = get_the_date('m/d/Y',$p->ID);}
                        $dm = date('D M', strtotime($date)); $day = date('j', strtotime($date));
                  ?>
                  <div class="date-wrap"><div class="date"><span><?php echo $dm; ?></span><span><?php echo $day;?></span></div></div>
                  <div class="content">
                    <h3 class="item-title"><?php echo $p->post_title;?></h3>
                    <div class="item-text"><?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $p->post_content ), 35 ) );?></div>
                    <?php echo btn_outline_yellow(get_the_permalink($p->ID), 'Learn More', '');?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            </div>
          </div>
        <?php endif; endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
