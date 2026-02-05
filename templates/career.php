<?php
/**
 * Career section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get career data from Customizer
$career_data = portfolio_get_career_data();
?>

<section id="career-section" class="career-section">
    <!-- Badge -->
    <span class="career-badge">
        <?php echo esc_html($career_data['badge']); ?>
    </span>

    <!-- Title -->
    <h2 class="career-title">
        <?php echo esc_html($career_data['title']); ?>
    </h2>

    <div class="career-grid">

        <!-- Profissional -->
        <div class="career-column">
            <h3 class="career-column-title">Profissional</h3>
            <span class="career-period">
                <?php echo esc_html($career_data['professional_period']); ?>
            </span>

            <div class="career-cards-container">
                <?php foreach ($career_data['professional_experiences'] as $experience) : ?>
                    <article class="career-card <?php echo !empty($experience['highlight']) ? 'highlight' : ''; ?>">
                        <h4 class="card-title">
                            <?php echo wp_kses_post($experience['title'] ?? ''); ?>
                        </h4>

                        <p class="card-text">
                            <?php echo esc_html($experience['description'] ?? ''); ?>
                        </p>

                        <?php if (!empty($experience['tags'])) : ?>
                            <div class="card-tags">
                                <?php
                                $tags = array_map('trim', explode(',', $experience['tags']));
                                foreach ($tags as $tag) :
                                ?>
                                    <span><?php echo esc_html($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <span class="card-date <?php echo !empty($experience['highlight']) ? 'success' : ''; ?>">
                            <?php echo esc_html($experience['period'] ?? ''); ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Acadêmica -->
        <div class="career-column">
            <h3 class="career-column-title">Acadêmica</h3>
            <span class="career-period">
                <?php echo esc_html($career_data['academic_period']); ?>
            </span>

            <div class="career-cards-container">
                <?php foreach ($career_data['academic_experiences'] as $course) : ?>
                    <article class="career-card">
                        <h4 class="card-title">
                            <?php echo esc_html($course['title'] ?? ''); ?>
                        </h4>

                        <p class="card-text">
                            <?php echo esc_html($course['description'] ?? ''); ?>
                        </p>

                        <span class="card-date">
                            <?php echo esc_html($course['period'] ?? ''); ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
