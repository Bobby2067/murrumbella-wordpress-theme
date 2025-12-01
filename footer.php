<?php
/**
 * Footer template
 * 
 * @package Murrumbella
 */
?>
    <footer class="site-footer">
        <div class="container-custom">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php bloginfo( 'name' ); ?></h3>
                    <p><?php bloginfo( 'description' ); ?></p>
                </div>

                <div class="footer-section">
                    <h4><?php esc_html_e( 'Navigation', 'murrumbella' ); ?></h4>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'fallback_cb'    => 'wp_page_menu',
                    ) );
                    ?>
                </div>

                <div class="footer-section">
                    <h4><?php esc_html_e( 'Contact', 'murrumbella' ); ?></h4>
                    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'murrumbella' ); ?></p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
