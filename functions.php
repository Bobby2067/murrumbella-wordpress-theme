<?php
/**
 * Murrumbella Theme Functions
 * 
 * @package Murrumbella
 */

// Theme setup
function murrumbella_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'murrumbella' ),
        'footer'  => esc_html__( 'Footer Menu', 'murrumbella' ),
    ) );
}
add_action( 'after_setup_theme', 'murrumbella_setup' );

// Enqueue styles
function murrumbella_enqueue_styles() {
    wp_enqueue_style( 'murrumbella-style', get_stylesheet_uri() );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'murrumbella_enqueue_styles' );

// Enqueue scripts
function murrumbella_enqueue_scripts() {
    wp_enqueue_script( 'murrumbella-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'murrumbella-blocks', get_template_directory_uri() . '/assets/js/blocks.js', array( 'wp-blocks', 'wp-element' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'murrumbella_enqueue_scripts' );

// Register sidebars
function murrumbella_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'murrumbella' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Main sidebar', 'murrumbella' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area', 'murrumbella' ),
        'id'            => 'footer-widgets',
        'description'   => esc_html__( 'Footer widgets', 'murrumbella' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'murrumbella_widgets_init' );

// Custom post types
function murrumbella_register_post_types() {
    register_post_type( 'property', array(
        'label'       => 'Properties',
        'public'      => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'   => 'dashicons-building',
    ) );
}
add_action( 'init', 'murrumbella_register_post_types' );

// Custom image sizes
add_image_size( 'murrumbella-hero', 1920, 1080, true );
add_image_size( 'murrumbella-card', 600, 400, true );
add_image_size( 'murrumbella-thumbnail', 300, 300, true );
add_image_size( 'murrumbella-gallery', 800, 600, true );

// Register Gutenberg blocks
function murrumbella_register_blocks() {
    register_block_type( 'murrumbella/cinematic-section', array(
        'editor_script'   => 'murrumbella-blocks',
        'editor_style'    => 'murrumbella-editor-style',
        'render_callback' => 'murrumbella_render_cinematic_section',
        'attributes'      => array(
            'title'       => array( 'type' => 'string', 'default' => 'Section Title' ),
            'description' => array( 'type' => 'string', 'default' => 'Section description' ),
            'image'       => array( 'type' => 'string', 'default' => '' ),
        ),
    ) );

    register_block_type( 'murrumbella/property-card', array(
        'editor_script'   => 'murrumbella-blocks',
        'editor_style'    => 'murrumbella-editor-style',
        'render_callback' => 'murrumbella_render_property_card',
        'attributes'      => array(
            'title'   => array( 'type' => 'string', 'default' => 'Property Title' ),
            'price'   => array( 'type' => 'string', 'default' => '' ),
            'image'   => array( 'type' => 'string', 'default' => '' ),
        ),
    ) );
}
add_action( 'init', 'murrumbella_register_blocks' );

// Render cinematic section block
function murrumbella_render_cinematic_section( $attributes ) {
    $title       = isset( $attributes['title'] ) ? sanitize_text_field( $attributes['title'] ) : '';
    $description = isset( $attributes['description'] ) ? wp_kses_post( $attributes['description'] ) : '';
    $image       = isset( $attributes['image'] ) ? esc_url( $attributes['image'] ) : '';

    ob_start();
    ?>
    <section class="cinematic-section" style="background-image: url('<?php echo $image; ?>');">
        <div class="cinematic-overlay">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description; ?></p>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

// Render property card block
function murrumbella_render_property_card( $attributes ) {
    $title = isset( $attributes['title'] ) ? sanitize_text_field( $attributes['title'] ) : '';
    $price = isset( $attributes['price'] ) ? sanitize_text_field( $attributes['price'] ) : '';
    $image = isset( $attributes['image'] ) ? esc_url( $attributes['image'] ) : '';

    ob_start();
    ?>
    <div class="property-card card">
        <?php if ( $image ) : ?>
            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="property-image">
        <?php endif; ?>
        <h3><?php echo $title; ?></h3>
        <?php if ( $price ) : ?>
            <p class="property-price"><?php echo $price; ?></p>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

// Enqueue editor styles
function murrumbella_enqueue_block_editor_assets() {
    wp_enqueue_style( 'murrumbella-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'murrumbella_enqueue_block_editor_assets' );

// Sanitize output
function murrumbella_sanitize_text( $text ) {
    return wp_kses_post( $text );
}

// Remove unnecessary WordPress stuff
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// Add theme color to admin
function murrumbella_admin_colors() {
    echo '<style>
        .wp-admin {
            --wp-admin-theme-color: #b56a4d;
            --wp-admin-theme-color-darker-10: #a25a3d;
        }
    </style>';
}
add_action( 'admin_head', 'murrumbella_admin_colors' );
