<?php
/**
 * About section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="about" class="about-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('About Me', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Get to know me better', 'portfolio'); ?>
            </p>
        </header>

        <div class="about-content">
            <!-- About Text -->
            <div class="about-text">
                <div class="about-description">
                    <h3><?php esc_html_e('Who I Am', 'portfolio'); ?></h3>
                    <p>
                        <!-- About text - can be customizer option or page content -->
                        <?php esc_html_e('I am a passionate web developer with expertise in creating modern, responsive, and user-friendly web applications. With a strong foundation in both frontend and backend technologies, I bring ideas to life through clean code and thoughtful design.', 'portfolio'); ?>
                    </p>
                    
                    <p>
                        <?php esc_html_e('My journey in web development started several years ago, and since then, I\'ve worked on various projects ranging from small business websites to complex web applications. I believe in continuous learning and staying updated with the latest industry trends and best practices.', 'portfolio'); ?>
                    </p>
                </div>

                <!-- Personal Details -->
                <div class="about-details">
                    <h3><?php esc_html_e('Personal Details', 'portfolio'); ?></h3>
                    <ul class="details-list">
                        <li>
                            <span class="detail-label"><?php esc_html_e('Name:', 'portfolio'); ?></span>
                            <span class="detail-value"><?php esc_html_e('Your Name', 'portfolio'); ?></span>
                        </li>
                        <li>
                            <span class="detail-label"><?php esc_html_e('Location:', 'portfolio'); ?></span>
                            <span class="detail-value"><?php esc_html_e('Your City, Country', 'portfolio'); ?></span>
                        </li>
                        <li>
                            <span class="detail-label"><?php esc_html_e('Email:', 'portfolio'); ?></span>
                            <span class="detail-value">hello@example.com</span>
                        </li>
                        <li>
                            <span class="detail-label"><?php esc_html_e('Available:', 'portfolio'); ?></span>
                            <span class="detail-value"><?php esc_html_e('Freelance & Full-time', 'portfolio'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- About Image/Card -->
            <div class="about-image">
                <div class="about-card">
                    <div class="card-image">
                        <!-- About section image -->
                        <img src="" alt="<?php esc_attr_e('About Me', 'portfolio'); ?>" loading="lazy">
                    </div>
                    <div class="card-content">
                        <h4><?php esc_html_e('Let\'s Work Together', 'portfolio'); ?></h4>
                        <p><?php esc_html_e('I\'m always interested in hearing about new projects and opportunities.', 'portfolio'); ?></p>
                        <a href="#contact" class="btn btn-primary">
                            <?php esc_html_e('Contact Me', 'portfolio'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>