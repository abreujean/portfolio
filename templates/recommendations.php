<?php
/**
 * Recommendations section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="recommendations" class="recommendations-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('Recommendations', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('What colleagues and clients say about me', 'portfolio'); ?>
            </p>
        </header>

        <!-- Recommendations Grid -->
        <div class="recommendations-grid">
            <!-- Recommendation 1 -->
            <article class="recommendation-item">
                <div class="recommendation-card">
                    <div class="quote-icon">
                        <i class="icon-quote"></i>
                    </div>
                    <div class="recommendation-content">
                        <blockquote class="recommendation-text">
                            <?php esc_html_e('Outstanding developer with excellent problem-solving skills. Delivers high-quality code on time and is always willing to go the extra mile to ensure project success.', 'portfolio'); ?>
                        </blockquote>
                    </div>
                    <div class="recommendation-author">
                        <div class="author-avatar">
                            <img src="" alt="<?php esc_attr_e('Author Avatar', 'portfolio'); ?>" loading="lazy">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">
                                <?php esc_html_e('John Smith', 'portfolio'); ?>
                            </h4>
                            <p class="author-role">
                                <?php esc_html_e('Project Manager, Tech Company', 'portfolio'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Recommendation 2 -->
            <article class="recommendation-item">
                <div class="recommendation-card">
                    <div class="quote-icon">
                        <i class="icon-quote"></i>
                    </div>
                    <div class="recommendation-content">
                        <blockquote class="recommendation-text">
                            <?php esc_html_e('Talented frontend developer with great attention to detail. Created beautiful, responsive designs that our users love. Highly recommended for any web development project.', 'portfolio'); ?>
                        </blockquote>
                    </div>
                    <div class="recommendation-author">
                        <div class="author-avatar">
                            <img src="" alt="<?php esc_attr_e('Author Avatar', 'portfolio'); ?>" loading="lazy">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">
                                <?php esc_html_e('Sarah Johnson', 'portfolio'); ?>
                            </h4>
                            <p class="author-role">
                                <?php esc_html_e('UX Designer, Creative Agency', 'portfolio'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Recommendation 3 -->
            <article class="recommendation-item">
                <div class="recommendation-card">
                    <div class="quote-icon">
                        <i class="icon-quote"></i>
                    </div>
                    <div class="recommendation-content">
                        <blockquote class="recommendation-text">
                            <?php esc_html_e('Excellent WordPress developer who transformed our website. Professional, reliable, and delivers exceptional results. Will definitely work with them again.', 'portfolio'); ?>
                        </blockquote>
                    </div>
                    <div class="recommendation-author">
                        <div class="author-avatar">
                            <img src="" alt="<?php esc_attr_e('Author Avatar', 'portfolio'); ?>" loading="lazy">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">
                                <?php esc_html_e('Michael Brown', 'portfolio'); ?>
                            </h4>
                            <p class="author-role">
                                <?php esc_html_e('CEO, Business Startup', 'portfolio'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- View More Button -->
        <div class="recommendations-actions">
            <a href="#" class="btn btn-secondary" target="_blank" rel="noopener noreferrer">
                <?php esc_html_e('View on LinkedIn', 'portfolio'); ?>
            </a>
        </div>
    </div>
</section>
