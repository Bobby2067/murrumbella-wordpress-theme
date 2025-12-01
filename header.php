<?php
/**
 * Header template
 * 
 * @package Murrumbella
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="site-header">
        <div class="container-custom">
            <div class="site-title">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    bloginfo( 'name' );
                }
                ?>
            </div>
            
            <nav>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'fallback_cb'    => 'wp_page_menu',
                ) );
                ?>
            </nav>
        </div>
    </header>
