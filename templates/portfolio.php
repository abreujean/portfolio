<?php
/**
 * Portfolio section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="portfolio" class="portfolio-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('My Portfolio', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Recent projects I\'ve worked on', 'portfolio'); ?>
            </p>
        </header>

        <!-- Portfolio Filters -->
        <div class="portfolio-filters">
            <button class="filter-btn active" data-filter="all">
                <?php esc_html_e('All', 'portfolio'); ?>
            </button>
            <button class="filter-btn" data-filter="web">
                <?php esc_html_e('Web Design', 'portfolio'); ?>
            </button>
            <button class="filter-btn" data-filter="development">
                <?php esc_html_e('Development', 'portfolio'); ?>
            </button>
            <button class="filter-btn" data-filter="wordpress">
                <?php esc_html_e('WordPress', 'portfolio'); ?>
            </button>
        </div>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid">
            <!-- Project Card 1 -->
            <article class="portfolio-item" data-category="web development">
                <div class="project-card">
                    <div class="project-image">
                        <img src="" alt="<?php esc_attr_e('Project Thumbnail', 'portfolio'); ?>" loading="lazy">
                        <div class="project-overlay">
                            <div class="project-actions">
                                <a href="#" class="btn btn-small view-project" target="_blank" rel="noopener noreferrer">
                                    <?php esc_html_e('View Live', 'portfolio'); ?>
                                </a>
                                <a href="#" class="btn btn-small view-details">
                                    <?php esc_html_e('Details', 'portfolio'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">
                            <?php esc_html_e('Project Title', 'portfolio'); ?>
                        </h3>
                        <p class="project-description">
                            <?php esc_html_e('Brief description of the project and technologies used.', 'portfolio'); ?>
                        </p>
                        <div class="project-tags">
                            <span class="tag">HTML5</span>
                            <span class="tag">CSS3</span>
                            <span class="tag">JavaScript</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Repeat structure for more projects -->
            <!-- This is a template - actual projects will be loaded via WordPress or custom data -->

        </div>

        <!-- Load More Button -->
        <div class="portfolio-actions">
            <button id="load-more-projects" class="btn btn-secondary">
                <?php esc_html_e('Load More Projects', 'portfolio'); ?>
            </button>
        </div>
    </div>
</section>