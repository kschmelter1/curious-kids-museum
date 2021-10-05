<div class="block block-accordion">
  <?php if ($block['items']) : ?>
    <div class="accordion-controls">
      <button class="accordion-show btn" data-target="accordion<?php echo $x;?>"><i class="far fa-plus-circle"></i> Expand All</button>
      <button class="accordion-hide btn" data-target="accordion<?php echo $x;?>"><i class="far fa-minus-circle"></i> Collapse All</button>
    </div>
  <?php endif; ?>
  <?php if ($block['title']) {echo '<h2>'.$block['title'].'</h2>';}?>

  <?php if ($block['items']) : ?>
    <div class="accordion-main" id="accordion<?php echo $x;?>">
      <?php $i = 0; foreach ($block['items'] as $item) : ?>
  <div class="card">
    <div class="card-header" id="<?php echo make_id($item['title']); ?>">
      <h3 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $x.$i;?>" aria-expanded="false<?php //echo ($i == 0 && $x == 0 ? 'true' : 'false');?>" aria-controls="collapse<?php echo $x.$i;?>">
          <?php echo $item['title']; ?> <i class="fas fa-caret-right"></i>
        </button>
      </h3>
    </div>

    <div id="collapse<?php echo $x.$i;?>" class="collapse <?php //echo ($i == 0 && $x == 0 ? 'show' : '');?>" aria-labelledby="<?php echo make_id($item['title']); ?>" <?php /*data-parent="#accordion<?php echo $x;?>"*/?> >
      <div class="card-body">
        <?php if ($item['image']) : ?>
          <div class="img-wrap">
            <?php echo print_img($item['image']); ?>
            <?php if ($item['text']): ?>
            <div class="caption">
              <?php echo $item['text']; ?>
            </div>
            <?php endif; ?>
          </div>
        <?php else : ?>
          <div class="text">
            <?php echo $item['text']; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
      <?php $i++; endforeach; ?>
    </div>
  <?php endif; ?>

</div>
