<?php
/**
 * Recommendations section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

$recommendations_data = portfolio_get_recommendations_data();
$recommendations = array_filter($recommendations_data['recommendations'], function($item) {
    return !empty($item['name']) && !empty($item['text']);
});
?>

<section id="recommendations-section" class="testimonials-section">
    <!-- Header -->
    <div class="testimonials-header">
        <div>
            <?php if (!empty($recommendations_data['badge'])) : ?>
                <span class="testimonials-badge">
                    <?php echo esc_html($recommendations_data['badge']); ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($recommendations_data['title'])) : ?>
                <h2 class="testimonials-title">
                    <?php echo esc_html($recommendations_data['title']); ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="testimonials-nav">
            <button class="nav-btn swiper-button-prev"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/right-arrow.svg');?>" alt="right arrow"> </button>
            <button class="nav-btn swiper-button-next"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/left-arrow.svg');?>" alt="right arrow"> </button>
        </div>
    </div>

    <!-- Cards -->
    <div class="swiper testimonials-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($recommendations as $recommendation) : ?>
                <div class="swiper-slide">
                    <article class="testimonial-card">
                        <span class="quote">❝❝</span>

                        <?php if (!empty($recommendation['text'])) : ?>
                            <p class="testimonial-text">
                                <?php echo esc_html($recommendation['text']); ?>
                            </p>
                        <?php endif; ?>

                        <div class="testimonial-author">
                            <?php if (!empty($recommendation['avatar'])) : ?>
                                <img src="<?php echo esc_url($recommendation['avatar']); ?>" alt="<?php echo esc_attr($recommendation['name']); ?>" loading="lazy">
                            <?php endif; ?>

                            <div>
                                <?php if (!empty($recommendation['name'])) : ?>
                                    <strong><?php echo esc_html($recommendation['name']); ?></strong>
                                <?php endif; ?>

                                <?php if (!empty($recommendation['role'])) : ?>
                                    <span><?php echo esc_html($recommendation['role']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
