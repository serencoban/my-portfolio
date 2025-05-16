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
<header>
  <h1 class="hidden"><?php the_title(); ?></h1>
    <div class="nav_container">
            <img src="resources/img/logo.svg" alt="">
        <nav class="nav_menu">
            <h2 class="hidden"></h2>
            <div id="menuToggle">
                <input type="checkbox" id="menuCheckbox"/>
                <span></span>
                <span></span>
                <div>
                    <?php wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => 'nav',
                    ]); ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<main>
