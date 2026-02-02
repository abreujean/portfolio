<?php
/**
 * Navigation Logo Component
 * Shared logo component used in both desktop and mobile navigation
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="nav-logo" href="#hero">
    <?php if (has_custom_logo()) : ?>
        <div class="logo-container">
            <?php the_custom_logo(); ?>
        </div>
    <?php else : ?>
        <span class="logo-mark" >
            <img 
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" 
                alt="<?php esc_attr_e('Extra Logo', 'portfolio'); ?>" 
            />
        </span>
    <?php endif; ?>
</div>
