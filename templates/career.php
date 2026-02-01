<?php
/**
 * Career section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="career" class="career-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('Career Journey', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('My professional experience and education', 'portfolio'); ?>
            </p>
        </header>

        <div class="career-timeline">
            <!-- Timeline Line -->
            <div class="timeline-line"></div>

            <!-- Timeline Items -->
            <div class="timeline-items">
                <!-- Current Position -->
                <div class="timeline-item current">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <?php esc_html_e('2022 - Present', 'portfolio'); ?>
                        </div>
                        <div class="timeline-card">
                            <h3 class="timeline-title">
                                <?php esc_html_e('Senior Web Developer', 'portfolio'); ?>
                            </h3>
                            <h4 class="timeline-company">
                                <?php esc_html_e('Tech Company Inc.', 'portfolio'); ?>
                            </h4>
                            <div class="timeline-description">
                                <p>
                                    <?php esc_html_e('Leading development of modern web applications using React, Node.js, and cloud technologies. Mentoring junior developers and implementing best practices for code quality and performance.', 'portfolio'); ?>
                                </p>
                                <ul class="timeline-achievements">
                                    <li><?php esc_html_e('Developed and launched 5+ major web applications', 'portfolio'); ?></li>
                                    <li><?php esc_html_e('Improved application performance by 40%', 'portfolio'); ?></li>
                                    <li><?php esc_html_e('Led team of 3 developers', 'portfolio'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Previous Position -->
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <?php esc_html_e('2020 - 2022', 'portfolio'); ?>
                        </div>
                        <div class="timeline-card">
                            <h3 class="timeline-title">
                                <?php esc_html_e('Full Stack Developer', 'portfolio'); ?>
                            </h3>
                            <h4 class="timeline-company">
                                <?php esc_html_e('Digital Agency', 'portfolio'); ?>
                            </h4>
                            <div class="timeline-description">
                                <p>
                                    <?php esc_html_e('Developed custom websites and web applications for various clients. Worked with PHP, WordPress, JavaScript, and modern frontend frameworks.', 'portfolio'); ?>
                                </p>
                                <ul class="timeline-achievements">
                                    <li><?php esc_html_e('Built 20+ client websites', 'portfolio'); ?></li>
                                    <li><?php esc_html_e('Integrated payment systems and APIs', 'portfolio'); ?></li>
                                    <li><?php esc_html_e('Optimized website SEO and performance', 'portfolio'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="timeline-item education">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            <?php esc_html_e('2016 - 2020', 'portfolio'); ?>
                        </div>
                        <div class="timeline-card">
                            <h3 class="timeline-title">
                                <?php esc_html_e('Bachelor of Computer Science', 'portfolio'); ?>
                            </h3>
                            <h4 class="timeline-company">
                                <?php esc_html_e('University Name', 'portfolio'); ?>
                            </h4>
                            <div class="timeline-description">
                                <p>
                                    <?php esc_html_e('Graduated with honors. Focus on software engineering, web development, and database management. Active member of coding club and hackathon participant.', 'portfolio'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
