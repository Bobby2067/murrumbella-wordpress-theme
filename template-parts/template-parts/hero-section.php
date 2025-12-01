<?php
/**
 * Hero section template
 * 
 * @package Murrumbella
 */
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url( get_theme_mod( 'hero_image', '' ) ); ?>');">
    <div class="hero-content">
        <p class="hero-label"><?php echo esc_html( get_theme_mod( 'hero_label', '424 Horseshoe Road, Mullion' ) ); ?></p>
        <h1><?php echo esc_html( get_theme_mod( 'hero_title', get_bloginfo( 'name' ) ) ); ?></h1>
        <p class="hero-description"><?php echo wp_kses_post( get_theme_mod( 'hero_description', 'Premium property on the Murrumbidgee River' ) ); ?></p>
        
        <div class="hero-buttons">
            <a href="<?php echo esc_url( get_theme_mod( 'hero_button_1_url', '#' ) ); ?>" class="btn btn-primary">
                <?php echo esc_html( get_theme_mod( 'hero_button_1_text', 'Explore' ) ); ?>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'hero_button_2_url', '#' ) ); ?>" class="btn btn-secondary">
                <?php echo esc_html( get_theme_mod( 'hero_button_2_text', 'Enquire' ) ); ?>
            </a>
        </div>
    </div>
</section>
