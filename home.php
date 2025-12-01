<?php
/**
 * Home/Blog template
 * 
 * @package Murrumbella
 */
get_header();
?>

<main class="site-main">
    <section class="hero-section" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
        <div class="hero-content">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
    </section>

    <section class="blog-section">
        <div class="container-custom">
            <div class="section-header">
                <h2><?php esc_html_e( 'Latest Updates', 'murrumbella' ); ?></h2>
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
