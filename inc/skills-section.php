<?php
/**
 * Skills Section Functions
 *
 * @package Portfolio
 */

/**
 * Get skills section data from Customizer
 *
 * @return array Skills section data
 */
function portfolio_get_skills_data() {
    $skill_labels = array(
        get_theme_mod('skills_icon_1_alt', 'PHP - Programador PHP'),
        get_theme_mod('skills_icon_2_alt', 'Framework Laravel'),
        get_theme_mod('skills_icon_3_alt', 'MySQL - Banco de Dados'),
        get_theme_mod('skills_icon_4_alt', 'Docker - Containerização'),
        get_theme_mod('skills_icon_5_alt', 'Google Cloud Platform'),
        get_theme_mod('skills_icon_6_alt', 'HTML5'),
        get_theme_mod('skills_icon_7_alt', 'CSS3'),
        get_theme_mod('skills_icon_8_alt', 'WordPress'),
        get_theme_mod('skills_icon_9_alt', ''),
        get_theme_mod('skills_icon_10_alt', ''),
    );

    return array(
        'badge'     => get_theme_mod('skills_badge', '🧑‍💻 Skills'),
        'title'     => get_theme_mod('skills_title', 'Tecnologias e habilidades'),
        'subtitle'  => get_theme_mod('skills_subtitle', 'Techs que uso no dia a dia'),
        'icons'     => array(
            get_theme_mod('skills_icon_1', get_template_directory_uri() . '/assets/images/php-skill.svg'),
            get_theme_mod('skills_icon_2', get_template_directory_uri() . '/assets/images/laravel-skill.svg'),
            get_theme_mod('skills_icon_3', get_template_directory_uri() . '/assets/images/mysql-skill.svg'),
            get_theme_mod('skills_icon_4', get_template_directory_uri() . '/assets/images/docker-skill.svg'),
            get_theme_mod('skills_icon_5', get_template_directory_uri() . '/assets/images/gcp-skill.svg'),
            get_theme_mod('skills_icon_6', get_template_directory_uri() . '/assets/images/html5-skill.svg'),
            get_theme_mod('skills_icon_7', get_template_directory_uri() . '/assets/images/css3-skill.svg'),
            get_theme_mod('skills_icon_8', get_template_directory_uri() . '/assets/images/wordpress-skill.svg'),
            get_theme_mod('skills_icon_9', ''),
            get_theme_mod('skills_icon_10', ''),
        ),
        'icon_labels' => $skill_labels,
    );
}
