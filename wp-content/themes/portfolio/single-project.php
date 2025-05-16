<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>
    <div class="travel">
        <header class="travel__header">
            <div class="travel__head">
                <h2 class="travel__title"><?= get_the_title(); ?></h2>
                <p class="travel__excerpt"><?= get_the_excerpt(); ?></p>
                <div class="travel__rating" data-score="<?= $rating = get_field('rating'); ?>">
                    <p class="sro">Ce voyage obtient l'appréciation de <?= $rating; ?> étoiles sur 5</p>
                </div>
                <div class="travel__dates">
                    <?php
                    $departure = get_field('departure');
                    $return = get_field('return');

                    if($return): ?>
                        <p>Du <time datetime="<?= date('c', $departure); ?>"><?= date_i18n('d F Y', $departure); ?></time> au <time datetime="<?= date('c', $return); ?>"><?= date_i18n('d F Y', $return); ?></time></p>
                    <?php else: ?>
                        <p>Depuis le <time datetime="<?= date('c', $departure); ?>"><?= date_i18n('d F Y', $departure); ?></time>.</p>
                    <?php endif; ?>
                </div>
            </div>
            <figure class="travel__back">
                <?= get_the_post_thumbnail(size: 'travel-header', attr: ['class' => 'travel__cover']); ?>
            </figure>
        </header>

        <div class="travel__container">
            <aside class="travel__ingredients">
                <div>
                    <h3>Points-clés</h3>
                    <div class="wysiwyg">
                        <?= get_field('keypoints'); ?>
                    </div>
                </div>
                <figure class="travel__fig">
                    <?= wp_get_attachment_image(get_field('side_image'), 'travel-side', attr: ['class' => 'travel__img']); ?>
                </figure>
            </aside>

            <section class="travel__steps">
                <h3>Récit de voyage</h3>
                <div class="wysiwyg">
                    <?= get_field('story'); ?>
                </div>
            </section>
        </div>
    </div>

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>I don't think this project exist.</p>
<?php endif; ?>
<?php get_footer(); ?>
