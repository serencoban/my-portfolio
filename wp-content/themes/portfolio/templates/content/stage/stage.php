<?php $stage = get_field('stage'); ?>

<section class="stage">
  <?php if (isset($stage['supline']) && $stage['supline'] !== ""): ?>
    <p class="stage__supline">
      <?= $stage['supline'] ?>
    </p>
  <?php endif; ?>
  <h2 class="stage__headline">
    <?= $stage['headline'] ?>
  </h2>
  <p class="stage__supline">
    <?= $stage['subline'] ?>
  </p>
  <div class="stage__description">
    <?= $stage['text'] ?>
  </div>
  <a class="stage__link"
     href="<?= $stage['link']['url'] ?>"
     title="<?= $stage['link']['title'] ?>">
    <?= $stage['link']['title'] ?>
  </a>
  <img class="stage__image"
       src="<?= $stage['image']['url'] ?>"
       alt="<?= $stage['image']['alt'] ?>"
       width="<?= $stage['image']['width'] ?>"
       height="<?= $stage['image']['height'] ?>">
</section>
