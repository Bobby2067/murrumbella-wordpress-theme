<?php
/**
 * Post content template
 * 
 * @package Murrumbella
 */
?>

<article <?php post_class( 'card' ); ?>>
    <?php
    if ( has_post_thumbnail() ) {
        echo '<div class="post-thumbnail">';
        the_post_thumbnail( 'murrumbella-card' );
        echo '</div>';
    }
    ?>
    
    <div class="post-content">
        <header class="post-header">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
        </header>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
            <?php esc_html_e( 'Read More', 'murrumbella' ); ?>
        </a>
    </div>
</article>
