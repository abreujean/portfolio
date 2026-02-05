<?php
/**
 * Skills section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

$skills_data = portfolio_get_skills_data();
$skills_icons = array_filter($skills_data['icons'], function($icon) {
    return !empty($icon);
});
?>

<section class="skills-section" id="skills-section">
    <!-- Badge -->
    <?php if (!empty($skills_data['badge'])) : ?>
        <span class="skills-badge">
            <?php echo esc_html($skills_data['badge']); ?>
        </span>
    <?php endif; ?>

    <!-- Title -->
    <?php if (!empty($skills_data['title'])) : ?>
        <h2 class="skills-title">
            <?php echo esc_html($skills_data['title']); ?>
        </h2>
    <?php endif; ?>

    <!-- Subtitle -->
    <?php if (!empty($skills_data['subtitle'])) : ?>
        <p class="skills-subtitle">
            <?php echo esc_html($skills_data['subtitle']); ?>
        </p>
    <?php endif; ?>

    <!-- Icons -->
    <?php if (!empty($skills_icons)) : ?>
        <div class="skills-icons">
            <?php foreach ($skills_icons as $icon) : ?>
                <?php if (!empty($icon)) : ?>
                    <div class="skill-icon">
                        <img src="<?php echo esc_url($icon); ?>" alt="Skill icon" loading="lazy" />
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
