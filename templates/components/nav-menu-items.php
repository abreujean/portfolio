<?php
/**
 * Navigation Menu Items Component
 * Renders the primary menu items
 * 
 * @package Portfolio
 * @param string $menu_class The CSS class for the menu list (optional)
 */

if (!defined('ABSPATH')) {
    exit;
}

$menu_class = $args['menu_class'] ?? 'primary-menu-list';
$menu_id = $args['menu_id'] ?? 'primary-menu';
$include_status = $args['include_status'] ?? false;

// Debug: Check if menu exists
$menu_locations = get_nav_menu_locations();
$menu_exists = isset($menu_locations['primary']) && wp_get_nav_menu_object($menu_locations['primary']);
?>

<ul id="<?php echo esc_attr($menu_id); ?>" class="<?php echo esc_attr($menu_class); ?>" role="menubar">
    <?php if ($include_status) : ?>
        <li class="nav-status" role="menuitem">
            <span class="status-dot"></span>
            <span class="status-text"><?php esc_html_e('Status', 'portfolio'); ?></span>
        </li>
    <?php endif; ?>
    
    <?php
    // Debug output (remove in production)
    if (current_user_can('edit_theme_options') && !$menu_exists) {
        ?>
        <li class="menu-notice">
            <?php
            printf(
                esc_html__('Por favor, atribua um menu em Aparência > Menus.', 'portfolio')
            );
            ?>
        </li>
        <?php
    }
    
    // Get menu items without wrapping <ul> by using 'echo' => false
    $menu_items = wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id'        => $menu_id,
        'menu_class'     => '',
        'container'      => false,
        'fallback_cb'    => 'portfolio_primary_menu_fallback',
        'item_spacing'   => 'discard',
        'depth'          => 1,
        'echo'           => false,
    ]);
    
    // Remove the wrapping <ul> that wp_nav_menu creates
    $menu_items = preg_replace('/^<ul[^>]*>/', '', $menu_items);
    $menu_items = preg_replace('/<\/ul>$/', '', $menu_items);
    
    echo $menu_items;
    ?>
</ul>
