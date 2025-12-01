<?php
/**
 * The Land section template
 * 
 * @package Murrumbella
 */
?>

<section class="land-section white">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-label"><?php esc_html_e( 'The Land', 'murrumbella' ); ?></span>
            <h2><?php echo esc_html( get_theme_mod( 'land_title', '164.31 Hectares' ) ); ?></h2>
            <p><?php echo wp_kses_post( get_theme_mod( 'land_description', 'Cool climate country with river frontage' ) ); ?></p>
        </div>

        <div class="land-grid">
            <div class="land-image">
                <?php
                $land_image = get_theme_mod( 'land_image', '' );
                if ( $land_image ) {
                    echo '<img src="' . esc_url( $land_image ) . '" alt="Land">';
                } else {
                    echo '<div style="background: #ccc; height: 400px;"></div>';
                }
                ?>
            </div>

            <div class="land-content">
                <h3><?php echo esc_html( get_theme_mod( 'land_subtitle', 'Not a Hobby Block' ) ); ?></h3>
                <p><?php echo wp_kses_post( get_theme_mod( 'land_text', 'This is genuine rural country.' ) ); ?></p>

                <div class="land-metrics grid grid-2">
                    <div class="metric">
                        <h4>164.31</h4>
                        <p><?php esc_html_e( 'Hectares', 'murrumbella' ); ?></p>
                    </div>
                    <div class="metric">
                        <h4>2.5km</h4>
                        <p><?php esc_html_e( 'River Frontage', 'murrumbella' ); ?></p>
                    </div>
                    <div class="metric">
                        <h4>RU1</h4>
                        <p><?php esc_html_e( 'Zoning', 'murrumbella' ); ?></p>
                    </div>
                    <div class="metric">
                        <h4>40min</h4>
                        <p><?php esc_html_e( 'To Canberra', 'murrumbella' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
