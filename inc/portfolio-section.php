<?php
/**
 * Portfolio Section Functions
 *
 * @package Portfolio
 */

/**
 * Get portfolio section data from Customizer
 *
 * @return array Portfolio section data
 */
function portfolio_get_portfolio_data() {
    return array(
        'title'            => get_theme_mod('portfolio_title', 'Projetos'),
        'filter_apps'      => get_theme_mod('portfolio_filter_apps', 'Apps'),
        'filter_sites'     => get_theme_mod('portfolio_filter_sites', 'Sites'),
        'projects'         => portfolio_get_projects(),
    );
}

/**
 * Get projects from Customizer
 *
 * @return array Projects data
 */
function portfolio_get_projects() {
    $projects = array();

    // Get number of projects (default 3)
    $project_count = get_theme_mod('portfolio_project_count', 3);

    for ($i = 1; $i <= $project_count; $i++) {
        $title = get_theme_mod("portfolio_project_{$i}_title", '');

        // Only add projects with a title
        if (!empty($title)) {
            $projects[] = array(
                'title'       => $title,
                'description' => get_theme_mod("portfolio_project_{$i}_description", ''),
                'image'       => get_theme_mod("portfolio_project_{$i}_image", ''),
                'stack'       => get_theme_mod("portfolio_project_{$i}_stack", ''),
                'preview_url' => get_theme_mod("portfolio_project_{$i}_preview_url", ''),
                'video_url'   => get_theme_mod("portfolio_project_{$i}_video_url", ''),
                'github_url'  => get_theme_mod("portfolio_project_{$i}_github_url", ''),
                'category'    => get_theme_mod("portfolio_project_{$i}_category", 'apps'),
                'order'       => get_theme_mod("portfolio_project_{$i}_order", $i),
            );
        }
    }

    // Sort projects by order
    usort($projects, function($a, $b) {
        return $a['order'] - $b['order'];
    });

    return $projects;
}
