<?php
$locs = get_field('locations','options');
foreach ($locs as $loc) :
foreach ($loc['seasonal_hours'] as $season) : ?>
<div class="season">
  <h4 class="title"><?php echo $season['season'];?> <span class="small"><?php echo $season['range']; ?></span></h4>
  <meta itemprop="validFrom" content="<?php echo $season['valid_from'];?>">
  <meta itemprop="validThrough" content="<?php echo $season['valid_through'];?>">
  <div class="hour-list">
  <?php foreach ($season['hours'] as $day) : ?>
    <?php if ($day['open']) : ?>
    <meta class="company-hours" itemprop="openingHours" content="<?php
    echo substr($day['day'], 0, 2);
    echo ($day['to_day'] ? '-'.substr($day['to_day'], 0, 2) : '');
    echo ' '.$day['open'].'-'.$day['close'];
    ?>"><?php
    echo $day['day'];
    echo ($day['to_day'] ? '-'.$day['to_day'] : '');
    ?>: <?php
    $time1 = date('g:i A', strtotime($day['open']));
    $time2 = date('g:i A', strtotime($day['close']));
    echo $time1.'-'.$time2;?><br>
    <?php else : ?>
      <?php
      echo $day['day'];
      echo ($day['to_day'] ? '-'.$day['to_day'] : '');
      ?>: Closed <br>
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
</div>
<?php endforeach; ?>
<?php endforeach; //locs as loc ?>
<div class="closed-days">
  <?php $closed = get_field('closed_days','options'); echo $closed['text'];?>
</div>

(LOCATED IN THE SILVER BEACH CENTER, JUST STEPS AWAY FROM CURIOUS KIDS' MUSEUM)
