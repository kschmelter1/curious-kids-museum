<div class="block block-buttons">
  <ul class="nav">
    <?php foreach ($block['buttons'] as $btn) : ?>
      <li class="nav-item">
        <div class="nav-link"><?php echo btn_outline_yellow($btn['link']['url'], $btn['link']['title'], $btn['link']['target']);?></div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
