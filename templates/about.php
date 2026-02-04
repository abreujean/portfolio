<?php
/**
 * About section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

$about_data = portfolio_get_about_data();
?>

<section id="about" class="about-section">
    <div class="container">
        <div class="about-grid">
            <!-- Avatar -->
            <div class="about-avatar">
                <?php if (!empty($about_data['avatar'])) : ?>
                    <img src="<?php echo esc_url($about_data['avatar']); ?>" alt="<?php echo esc_attr($about_data['name']); ?>" loading="lazy" />
                <?php endif; ?>
            </div>

            <!-- Content -->
            <div class="about-content">
                <?php if (!empty($about_data['badge'])) : ?>
                    <span class="about-badge">
                        <?php echo esc_html($about_data['badge']); ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($about_data['name'])) : ?>
                    <h2 class="about-title">
                        <?php echo esc_html($about_data['name']); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($about_data['description'])) : ?>
                    <?php
                    $paragraphs = preg_split('/\R{2,}/', $about_data['description']);
                    foreach ($paragraphs as $paragraph) :
                        $paragraph = trim($paragraph);
                        if (!empty($paragraph)) :
                    ?>
                        <p class="about-text">
                            <?php echo esc_html($paragraph); ?>
                        </p>
                    <?php
                        endif;
                    endforeach;
                    ?>
                <?php endif; ?>

                <?php if (!empty($about_data['interests']) || !empty($about_data['objective'])) : ?>
                    <ul class="about-list">
                        <?php if (!empty($about_data['interests'])) : ?>
                            <li>
                                <strong><?php echo esc_html__('👨‍💻 Principais interesses:', 'portfolio'); ?></strong>
                                <?php echo esc_html($about_data['interests']); ?>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($about_data['objective'])) : ?>
                            <li>
                                <strong><?php echo esc_html__('🎯 Objetivo:', 'portfolio'); ?></strong>
                                <?php echo esc_html($about_data['objective']); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
