<?php
/**
 * Main index template (fallback)
 * 
 * @package Murrumbella
 */
get_header();
?>

<main class="site-main">
    <section class="archive-section">
        <div class="container-custom">
            <div class="section-header">
                <h1><?php esc_html_e( 'Posts', 'murrumbella' ); ?></h1>
            </div>

            <?php
            if ( have_posts() ) {
                echo '<div class="grid grid-2">';
                
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content' );
                }
                
                echo '</div>';

                the_posts_pagination( array(
                    'prev_text' => esc_html__( 'Previous', 'murrumbella' ),
                    'next_text' => esc_html__( 'Next', 'murrumbella' ),
                ) );
            } else {
                echo '<p>' . esc_html__( 'No posts found.', 'murrumbella' ) . '</p>';
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
