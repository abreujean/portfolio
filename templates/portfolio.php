<?php
/**
 * Portfolio section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

$portfolio_data = portfolio_get_portfolio_data();
$projects = $portfolio_data['projects'];
?>

<section id="portfolio" class="projects-section">
    <!-- Header -->
    <header class="projects-header">
        <div class="portfolio-badge">
            🔗 <?php esc_html_e('Portfólio', 'portfolio'); ?>
        </div>

        <h2 class="projects-title">
            <?php echo esc_html($portfolio_data['title']); ?>
        </h2>

        <div class="projects-filter">
            <button class="filter-btn active" data-filter="apps">
                <?php echo esc_html($portfolio_data['filter_apps']); ?>
            </button>
            <button class="filter-btn" data-filter="sites">
                <?php echo esc_html($portfolio_data['filter_sites']); ?>
            </button>
        </div>
    </header>

    <!-- Carousel -->
    <div class="projects-carousel">
        <div class="carousel-nav prev"></div>
        <div class="carousel-nav next"></div>

        <div class="swiper projects-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($projects as $index => $project) : ?>
                    <?php if (!empty($project['title'])) : ?>
                        <!-- Slide -->
                        <div class="swiper-slide" data-category="<?php echo esc_attr($project['category']); ?>">
                            <article class="project-card">

                                <?php if (!empty($project['image'])) : ?>
                                    <div class="project-image">
                                        <img src="<?php echo esc_url($project['image']); ?>" alt="<?php echo esc_attr($project['title']); ?>" loading="lazy">
                                    </div>
                                <?php endif; ?>

                                <h3 class="project-title">
                                    <?php echo esc_html($project['title']); ?>
                                </h3>

                                <?php if (!empty($project['description'])) : ?>
                                    <p class="project-description">
                                        <?php echo esc_html($project['description']); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($project['stack'])) : ?>
                                    <p class="project-stack">
                                        <?php echo esc_html($project['stack']); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="project-actions">
                                    <?php if (!empty($project['preview_url'])) : ?>
                                        <a href="<?php echo esc_url($project['preview_url']); ?>" class="btn-outline" target="_blank" rel="noopener noreferrer">
                                            <?php esc_html_e('Preview', 'portfolio'); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($project['video_url'])) : ?>
                                        <a href="<?php echo esc_url($project['video_url']); ?>" class="btn-outline" target="_blank" rel="noopener noreferrer">
                                            <?php esc_html_e('Vídeo', 'portfolio'); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($project['github_url'])) : ?>
                                        <a href="<?php echo esc_url($project['github_url']); ?>" class="btn-primary" target="_blank" rel="noopener noreferrer">
                                            GitHub
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </article>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
