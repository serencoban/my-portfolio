<!DOCTYPE html>
<html lang="<?= __hepl('fr') ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
  <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
  <script src="<?= dw_asset('js') ?>" defer></script>
  <?php wp_head(); ?>
</head>
<body>
<header class="header">
  <h1 class="hidden"></h1>
    <nav role="navigation">
        <h2></h2>
        <img title="resources/img/seren-logo.svg" src="" alt="">
        <div>
            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'nav',
            ]); ?>
        </div>


</header>
<main>
