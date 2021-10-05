<?php
date_default_timezone_set('America/New_York');
//date_default_timezone_set('America/Los_Angeles');
$status = array(
  "message" => "We're closed today.",
  "locs" => get_field('locations','options')
);
$closed = false;

$today = date('Y/m/d');
//$currentTime = date('G:i');
$dow = date('w');
$w = array('Su','Mo','Tu','We','Th','Fr','Sa');
$holidays = get_field('closed_days','options');
//$holidays = $holidays['dates'];

function displayTime($time) {
  $timestamp = strtotime($time);
  return date('g:i A', $timestamp);
}

foreach ($holidays as $day) {
  if ($day['date'] === date('d/m') && !$closed) {
    $closed = true;
  }
}

if (!$closed) :
  for ($i = 0; $i < count($status['locs']); $i++) {
  //foreach ($status['locs'] as $loc) {
    $status['locs'][$i]['open'] = false;

foreach ($status['locs'][$i]['seasonal_hours'] as $season) :
  //Finds the correct set of hours based on the current season
  if ($today >= $season['valid_from'] && $today <= $season['valid_through']) {
    // Get today's hours
    foreach ($season['hours'] as $days) {
      $day = array_search(substr($days['day'], 0, 2), $w);
      if ($days['to_day']) {
        $dayEnd = array_search(substr($days['to_day'], 0, 2), $w);
        if ($dow >= $day && $dow <= $dayEnd) {
          //$status = compareTime($currentTime, $days['open'], $days['close']);
          $status['message'] = "We're open today!";
          $status['locs'][$i]['time'] = displayTime($days['open'])." - ".displayTime($days['close']);
          $status['locs'][$i]['open'] = true;
          //$status["time"] = displayTime($days['open'])." - ".displayTime($days['close']);
        }
      } else {
        if ($day == $dow) {
          $status['message'] = "We're open today!";
          //$status = compareTime($currentTime, $days['open'], $days['close']);
          $status['locs'][$i]['time'] = displayTime($days['open'])." - ".displayTime($days['close']);
          $status['locs'][$i]['open'] = true;
        } else {
          // Not open on this day of the week
        }
      }
    }
  } else {
    // Default to closed, outside of seasonal hours range
  }
endforeach; //seasons as season
  } // endforeach location
endif;
?>

<div class="ck-hours">
  <span class="label"><?php echo $status['message'] ?></span>
  <?php for ($i = 0; $i < count($status['locs']); $i++) :
          if ($status['locs'][$i]['open']) {
            if ($i > 0 && $status['locs'][$i - 1]['open']) {echo ' <span class="divider">•</span> ';}
            echo '<span class="times">'.$status['locs'][$i]['short_name'].': '.$status['locs'][$i]['time'].'</span>';
          }
        endfor; ?>
</div>

<?php /*function compareTime($myTime, $time1, $time2) {
  $t1 = date('G:i', strtotime($time1));
  $t2 = date('G:i', strtotime($time2));
  if ($myTime >= $t1 && $myTime <= $t2) {
    if ($t2 - $myTime <= 1) {

      $status["message"] = "Closing Soon";
    } else {

      $status["message"] = "Open Today";
    }
  } else {

    $status["message"] = "Closed";
  }
  return $status;

  <!--  <div>Current time is: <?php echo date('h:i a'); ?> PST</div> -->
}*/ ?>
