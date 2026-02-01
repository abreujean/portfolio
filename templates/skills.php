<?php
/**
 * Skills section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="skills" class="skills-section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">
                <?php esc_html_e('Skills & Expertise', 'portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Technologies and tools I work with', 'portfolio'); ?>
            </p>
        </header>

        <!-- Skills Categories -->
        <div class="skills-categories">
            <button class="category-btn active" data-category="all">
                <?php esc_html_e('All Skills', 'portfolio'); ?>
            </button>
            <button class="category-btn" data-category="frontend">
                <?php esc_html_e('Frontend', 'portfolio'); ?>
            </button>
            <button class="category-btn" data-category="backend">
                <?php esc_html_e('Backend', 'portfolio'); ?>
            </button>
            <button class="category-btn" data-category="tools">
                <?php esc_html_e('Tools', 'portfolio'); ?>
            </button>
        </div>

        <!-- Skills Grid -->
        <div class="skills-grid">
            <!-- Frontend Skills -->
            <div class="skill-item" data-category="frontend">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-html5"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">HTML5</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 95%"></div>
                            </div>
                            <span class="level-text">95%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-item" data-category="frontend">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-css3"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">CSS3/SASS</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 90%"></div>
                            </div>
                            <span class="level-text">90%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-item" data-category="frontend">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-javascript"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">JavaScript</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 85%"></div>
                            </div>
                            <span class="level-text">85%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backend Skills -->
            <div class="skill-item" data-category="backend">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-php"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">PHP</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 80%"></div>
                            </div>
                            <span class="level-text">80%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-item" data-category="backend">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-wordpress"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">WordPress</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 88%"></div>
                            </div>
                            <span class="level-text">88%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools -->
            <div class="skill-item" data-category="tools">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-git"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">Git/GitHub</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 85%"></div>
                            </div>
                            <span class="level-text">85%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-item" data-category="tools">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="icon-figma"></i>
                    </div>
                    <div class="skill-info">
                        <h3 class="skill-name">Figma</h3>
                        <div class="skill-level">
                            <div class="level-bar">
                                <div class="level-fill" style="width: 75%"></div>
                            </div>
                            <span class="level-text">75%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
