<?php
/**
 * Contact section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="contact" class="contact-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('Get In Touch', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Let\'s discuss your next project', 'portfolio'); ?>
            </p>
        </header>

        <div class="contact-content">
            <!-- Contact Information -->
            <div class="contact-info">
                <div class="contact-card">
                    <h3><?php esc_html_e('Let\'s Connect', 'portfolio'); ?></h3>
                    <p>
                        <?php esc_html_e('I\'m always interested in hearing about new projects and opportunities. Whether you have a question or just want to say hi, feel free to reach out!', 'portfolio'); ?>
                    </p>

                    <!-- Contact Details -->
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="icon-email"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e('Email', 'portfolio'); ?></h4>
                                <a href="mailto:hello@example.com" class="contact-link">
                                    hello@example.com
                                </a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e('Phone', 'portfolio'); ?></h4>
                                <a href="tel:+1234567890" class="contact-link">
                                    +1 (234) 567-890
                                </a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="icon-location"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e('Location', 'portfolio'); ?></h4>
                                <span class="contact-link">
                                    Your City, Country
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="contact-social">
                        <h4><?php esc_html_e('Follow Me', 'portfolio'); ?></h4>
                        <?php get_template_part('templates/social-links', 'contact'); ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <div class="form-card">
                    <h3><?php esc_html_e('Send Message', 'portfolio'); ?></h3>
                    
                    <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]'); ?>
                    
                    <!-- Fallback HTML Form if CF7 not available -->
                    <form id="portfolio-contact-form" class="contact-form-element" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <?php wp_nonce_field('portfolio_contact_nonce', 'contact_nonce'); ?>
                        <input type="hidden" name="action" value="portfolio_submit_contact">

                        <div class="form-group">
                            <label for="contact-name" class="form-label">
                                <?php esc_html_e('Name', 'portfolio'); ?>
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="contact-name" 
                                name="contact_name" 
                                class="form-input" 
                                required 
                                aria-required="true"
                                placeholder="<?php esc_attr_e('Your Name', 'portfolio'); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-email" class="form-label">
                                <?php esc_html_e('Email', 'portfolio'); ?>
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="contact-email" 
                                name="contact_email" 
                                class="form-input" 
                                required 
                                aria-required="true"
                                placeholder="<?php esc_attr_e('your@email.com', 'portfolio'); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-subject" class="form-label">
                                <?php esc_html_e('Subject', 'portfolio'); ?>
                            </label>
                            <input 
                                type="text" 
                                id="contact-subject" 
                                name="contact_subject" 
                                class="form-input" 
                                placeholder="<?php esc_attr_e('Project Discussion', 'portfolio'); ?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="contact-message" class="form-label">
                                <?php esc_html_e('Message', 'portfolio'); ?>
                                <span class="required">*</span>
                            </label>
                            <textarea 
                                id="contact-message" 
                                name="contact_message" 
                                class="form-textarea" 
                                rows="5" 
                                required 
                                aria-required="true"
                                placeholder="<?php esc_attr_e('Tell me about your project...', 'portfolio'); ?>"
                            ></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <?php esc_html_e('Send Message', 'portfolio'); ?>
                            </button>
                        </div>

                        <!-- Form Messages -->
                        <div id="form-messages" class="form-messages" aria-live="polite"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
