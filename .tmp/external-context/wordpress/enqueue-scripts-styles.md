---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: enqueue-scripts-styles
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/themes/core-concepts/including-assets/
---

# WordPress Scripts and Styles Enqueuing

WordPress provides a systematic approach for including CSS and JavaScript files through enqueueing functions. This ensures proper dependency management, cache busting, and plugin compatibility.

## URL and Path Helper Functions

### Primary URL Functions
- `get_stylesheet_uri()` - Returns active theme's `style.css` file URL
- `get_theme_file_uri( $file )` - Returns active theme's URL with optional file path
- `get_parent_theme_file_uri( $file )` - Returns parent theme's URL with optional file path

### Directory Path Functions
- `get_theme_file_path( $file )` - Returns active theme's directory path
- `get_parent_theme_file_path( $file )` - Returns parent theme's directory path

### Usage Examples
```php
// Get theme stylesheet URL
$style_url = get_stylesheet_uri();

// Get specific file URL (falls back to parent theme)
$custom_css = get_theme_file_uri( 'assets/css/custom.css' );

// Get parent theme file URL
$parent_js = get_parent_theme_file_uri( 'assets/js/main.js' );
```

## Enqueuing CSS Stylesheets

### wp_enqueue_style() Function
```php
wp_enqueue_style( 
    string $handle,           // Unique name/ID for stylesheet
    string $src = '',        // File URL of stylesheet
    string[] $deps = array(), // Array of dependent stylesheets
    string|bool|null $ver = false, // Version number for cache busting
    string $media = 'all'     // Media type (all, screen, print, etc.)
);
```

### Front-end Stylesheets
```php
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_styles' );

function theme_slug_enqueue_styles() {
    // Main stylesheet
    wp_enqueue_style(
        'theme-slug-style', 
        get_stylesheet_uri()
    );

    // Custom CSS file
    wp_enqueue_style(
        'theme-slug-primary',
        get_parent_theme_file_uri( 'assets/css/primary.css' ),
        array(), // No dependencies
        wp_get_theme()->get( 'Version' ), // Theme version for cache busting
        'all'
    );
}
```

### Inline Styles
```php
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_styles' );

function theme_slug_enqueue_styles() {
    wp_enqueue_style( 'theme-slug-primary', get_theme_file_uri( 'assets/css/primary.css' ) );
    
    // Add inline CSS
    wp_add_inline_style( 
        'theme-slug-primary', 
        'body { background: #eee; }'
    );
}
```

### Editor Stylesheets
```php
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {
    // Add main style to editor
    add_editor_style( get_stylesheet_uri() );
    
    // Add multiple styles
    add_editor_style( array(
        get_stylesheet_uri(),
        get_theme_file_uri( 'assets/css/editor.css' )
    ) );
}
```

## Enqueuing JavaScript Files

### wp_enqueue_script() Function
```php
wp_enqueue_script( 
    string $handle,           // Unique name/ID for script
    string $src = '',        // File URL of script
    string[] $deps = array(), // Array of dependent scripts
    string|bool|null $ver = false, // Version number for cache busting
    array|bool $in_footer = false  // Loading strategy and location
);
```

### Front-end JavaScript
```php
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_scripts' );

function theme_slug_enqueue_scripts() {
    wp_enqueue_script( 
        'theme-slug-navigation',
        get_theme_file_uri( 'assets/js/navigation.js' ),
        array( 'jquery' ), // Depend on jQuery
        wp_get_theme()->get( 'Version' ),
        array(
            'strategy' => 'defer', // Modern loading strategy
            'in_footer' => true
        )
    );
}
```

### Inline JavaScript
```php
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_scripts' );

function theme_slug_enqueue_scripts() {
    wp_enqueue_script( 'theme-slug-main', get_theme_file_uri( 'assets/js/main.js' ), array(), '1.0.0', true );
    
    // Add inline script
    wp_add_inline_script( 
        'theme-slug-main', 
        'console.log( "Theme loaded successfully" );'
    );
}
```

### Editor JavaScript
```php
add_action( 'enqueue_block_editor_assets', 'theme_slug_enqueue_editor_scripts' );

function theme_slug_enqueue_editor_scripts() {
    wp_enqueue_script( 
        'theme-slug-editor',
        get_theme_file_uri( 'assets/js/editor.js' ),
        array( 'wp-blocks', 'wp-element', 'wp-data' ),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
```

## Conditional Loading

### Load Scripts/Styles by Context
```php
function theme_slug_conditional_scripts() {
    // Load only on single posts
    if ( is_single() ) {
        wp_enqueue_script( 'theme-slug-single', get_theme_file_uri( 'assets/js/single.js' ) );
    }
    
    // Load only in admin
    if ( is_admin() ) {
        wp_enqueue_style( 'theme-slug-admin', get_theme_file_uri( 'assets/css/admin.css' ) );
    }
    
    // Load only on mobile
    if ( wp_is_mobile() ) {
        wp_enqueue_style( 'theme-slug-mobile', get_theme_file_uri( 'assets/css/mobile.css' ), array(), '1.0.0', 'screen and (max-width: 768px)' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_slug_conditional_scripts' );
```

### Page-Specific Loading
```php
function theme_slug_page_specific_scripts() {
    // Load contact form script only on contact page
    if ( is_page( 'contact' ) ) {
        wp_enqueue_script( 'theme-slug-contact-form', get_theme_file_uri( 'assets/js/contact-form.js' ), array(), '1.0.0', true );
    }
    
    // Load gallery script only on portfolio pages
    if ( is_page_template( 'templates/portfolio.php' ) ) {
        wp_enqueue_script( 'theme-slug-gallery', get_theme_file_uri( 'assets/js/gallery.js' ), array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_slug_page_specific_scripts' );
```

## Asset Organization Best Practices

### Directory Structure
```
theme/
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   ├── components.css
│   │   └── responsive.css
│   ├── js/
│   │   ├── main.js
│   │   ├── navigation.js
│   │   └── utils.js
│   ├── images/
│   │   ├── logo.svg
│   │   └── background.jpg
│   └── fonts/
│       └── custom-font.woff2
├── functions.php
└── style.css
```

### Enqueue Function Organization
```php
// functions.php
require get_theme_file_path( 'inc/enqueue-scripts.php' );
require get_theme_file_path( 'inc/enqueue-styles.php' );
require get_theme_file_path( 'inc/asset-helpers.php' );

// inc/enqueue-scripts.php
function theme_slug_enqueue_scripts() {
    wp_enqueue_script( 'theme-slug-main', get_theme_file_uri( 'assets/js/main.js' ), array(), '1.0.0', true );
    wp_enqueue_script( 'theme-slug-navigation', get_theme_file_uri( 'assets/js/navigation.js' ), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_scripts' );

// inc/enqueue-styles.php
function theme_slug_enqueue_styles() {
    wp_enqueue_style( 'theme-slug-style', get_stylesheet_uri() );
    wp_enqueue_style( 'theme-slug-components', get_theme_file_uri( 'assets/css/components.css' ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_styles' );
```

## Modern Loading Strategies

### Async and Defer Loading
```php
function theme_slug_modern_script_loading() {
    // Async loading for non-critical scripts
    wp_script_add_data( 'theme-slug-analytics', 'async', true );
    
    // Defer loading for scripts that don't block rendering
    wp_enqueue_script(
        'theme-slug-main',
        get_theme_file_uri( 'assets/js/main.js' ),
        array(),
        '1.0.0',
        array( 'strategy' => 'defer' )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_modern_script_loading' );
```

### Preloading Critical Resources
```php
function theme_slug_preload_critical_assets() {
    // Preload critical CSS
    wp_enqueue_style(
        'theme-slug-critical',
        get_theme_file_uri( 'assets/css/critical.css' ),
        array(),
        '1.0.0'
    );
    
    // Add preload link for above-the-fold images
    add_action( 'wp_head', function() {
        echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( 'assets/images/hero.jpg' ) ) . '" as="image">';
    } );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_preload_critical_assets' );
```

## Dependency Management

### Script Dependencies
```php
function theme_slug_script_dependencies() {
    // Script that depends on jQuery
    wp_enqueue_script(
        'theme-slug-jquery-plugin',
        get_theme_file_uri( 'assets/js/jquery-plugin.js' ),
        array( 'jquery' ), // Explicitly declare jQuery dependency
        '1.0.0',
        true
    );
    
    // Script that depends on the plugin above
    wp_enqueue_script(
        'theme-slug-main',
        get_theme_file_uri( 'assets/js/main.js' ),
        array( 'jquery', 'theme-slug-jquery-plugin' ), // Multiple dependencies
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_script_dependencies' );
```

### WordPress-Included Scripts
```php
function theme_slug_use_core_scripts() {
    // Instead of loading custom jQuery, use WordPress version
    wp_enqueue_script( 'jquery' );
    
    // Use built-in scripts when available
    wp_enqueue_script( 'wp-blocks' ); // Gutenberg blocks
    wp_enqueue_script( 'wp-element' ); // React-like components
    wp_enqueue_script( 'wp-data' ); // Data management
}
add_action( 'wp_enqueue_scripts', 'theme_slug_use_core_scripts' );
```

## Cache Busting

### Version Management
```php
function theme_slug_versioned_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );
    
    // Use theme version for cache busting
    wp_enqueue_style(
        'theme-slug-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );
    
    // Custom version for frequently changed files
    wp_enqueue_script(
        'theme-slug-main',
        get_theme_file_uri( 'assets/js/main.js' ),
        array(),
        filemtime( get_theme_file_path( 'assets/js/main.js' ) ), // File modification time
        true
    );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_versioned_assets' );
```

## Including Other Assets

### Images
```php
// Theme directory image (allows child theme override)
<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">

// Parent theme directory image
<img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/img/background.jpg' ) ); ?>" alt="Background image">
```

### Fonts
```php
// Font loading (better via theme.json, but sometimes needed)
function theme_slug_enqueue_fonts() {
    wp_enqueue_style(
        'theme-slug-fonts',
        get_theme_file_uri( 'assets/fonts/font-face.css' ),
        array(),
        '1.0.0'
    );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_fonts' );
```

By properly implementing enqueueing practices, themes ensure optimal performance, compatibility, and maintainability while following WordPress best practices.