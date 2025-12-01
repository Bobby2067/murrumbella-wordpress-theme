<?php
/**
 * Single page template
 * 
 * @package Murrumbella
 */
get_header();
?>

<main class="site-main">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            ?>
            
            <article class="page-content">
                <div class="container-custom">
                    <?php
                    if ( has_post_thumbnail() ) {
                        echo '<div class="featured-image">';
                        the_post_thumbnail( 'murrumbella-hero' );
                        echo '</div>';
                    }
                    ?>
                    
                    <header class="page-header">
                        <h1><?php the_title(); ?></h1>
                    </header>

                    <div class="page-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>

            <?php
        }
    }
    ?>
</main>

<?php get_footer(); ?>
