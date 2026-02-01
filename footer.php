    </main><!-- #main-content -->

    <!-- Footer Section -->
    <footer id="site-footer" class="site-footer" role="contentinfo">
        <div class="footer-container">
            <!-- Social Links -->
            <div class="footer-social">
                <?php get_template_part('templates/social-links'); ?>
            </div>
            
            <!-- Copyright Information -->
            <div class="footer-copyright">
                <p class="copyright-text">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
                    <?php 
                    /* translators: %s: WordPress link */
                    printf(esc_html__('Proudly powered by %s', 'portfolio'), '<a href="' . esc_url(__('https://wordpress.org/', 'portfolio')) . '" target="_blank" rel="noopener noreferrer">WordPress</a>'); 
                    ?>
                </p>
            </div>
            
            <!-- Theme Info -->
            <div class="footer-theme">
                <p class="theme-info">
                    <?php 
                    /* translators: 1: theme name, 2: author */
                    printf(esc_html__('Theme: %1$s by %2$s', 'portfolio'), 'Portfolio', 'Portfolio Author'); 
                    ?>
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'portfolio'); ?>">
        <span class="screen-reader-text"><?php esc_html_e('Back to top', 'portfolio'); ?></span>
        <i class="icon-arrow-up" aria-hidden="true"></i>
    </button>

    <?php wp_footer(); ?>
</body>
</html>