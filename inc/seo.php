<?php
/**
 * SEO: Meta description, Open Graph, Twitter Cards, Canonical, JSON-LD
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

function portfolio_add_seo_meta_tags() {
    $site_url   = home_url('/');
    $site_name  = get_bloginfo('name');
    $hero_data  = portfolio_get_hero_data();

    $meta_description = get_theme_mod('seo_meta_description',
        'Jean Abreu | Programador PHP Freelancer especializado no Framework Laravel. Desenvolvimento de sistemas web robustos, APIs e aplicações sob medida.'
    );

    $og_image = !empty($hero_data['hero_image']) ? $hero_data['hero_image'] : '';

    $linkedin = !empty($hero_data['linkedin_url']) ? $hero_data['linkedin_url'] : '';
    $github   = !empty($hero_data['github_url'])   ? $hero_data['github_url']   : '';

    echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    echo '<meta name="robots" content="index, follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($site_url) . '">' . "\n";

    echo "\n" . '<!-- Open Graph -->' . "\n";
    echo '<meta property="og:type" content="profile">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($meta_description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($site_url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    if ($og_image) {
        echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    }

    echo "\n" . '<!-- Twitter Card -->' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($meta_description) . '">' . "\n";
    if ($og_image) {
        echo '<meta name="twitter:image" content="' . esc_url($og_image) . '">' . "\n";
    }

    $first_name = !empty($hero_data['first_name']) ? $hero_data['first_name'] : '';
    $last_name  = !empty($hero_data['last_name'])  ? $hero_data['last_name']  : '';
    $full_name  = trim($first_name . ' ' . $last_name);

    $same_as = array_filter(array($linkedin, $github));

    $json_ld = array(
        '@context'  => 'https://schema.org',
        '@type'     => 'Person',
        'name'      => $full_name,
        'jobTitle'  => 'Programador PHP Freelancer',
        'knowsAbout' => array('PHP', 'Framework Laravel', 'MySQL', 'Docker', 'WordPress'),
        'url'       => $site_url,
    );

    if (!empty($same_as)) {
        $json_ld['sameAs'] = array_values($same_as);
    }

    echo "\n" . '<!-- Structured Data (JSON-LD) -->' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'portfolio_add_seo_meta_tags');
