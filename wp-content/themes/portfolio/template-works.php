<?php /* Template Name: Page "Works" */ ?>

<?php get_header(); ?>

<h2><?php the_title(); ?></h2>


<?php

    while (have_posts() ) :
        the_post();


     endwhile;
?>

<section>
    <div>
        
    </div>
    <div>
        <article>
            <a href=""></a>
            <div>
                <div>
                    <h3><?php the_field('work_name');?></h3>
                </div>
                <figure>
                    <img src="" alt="">
                </figure>
            </div>
        </article>

    </div>
</section>

<?php get_footer(); ?>