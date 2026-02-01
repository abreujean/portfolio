---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: internationalization-functions
fetched: 2026-02-01T12:30:00Z
official_docs: https://developer.wordpress.org/apis/internationalization/internationalization-functions/
---

# WordPress Internationalization Functions

WordPress has a built-in translation system that allows localizing a theme without having to modify the source code. This documentation covers the internationalization functions used in WordPress theme development.

## Basic Internationalization Functions

### __() - Retrieve translated string
Retrieves the translation of `$text` and escapes it for safe use in HTML output.
```php
$string = __( 'Hello World', 'my-theme' );
```

### _e() - Echo translated string
Displays the translated string and escapes it for safe use in HTML output.
```php
_e( 'Welcome to our website', 'my-theme' );
```

### _x() - Retrieve translated string with context
Retrieves the translation of `$text` and escapes it for safe use in HTML output. The context helps translators understand the meaning of the string.
```php
$label = _x( 'Post', 'noun: a blog post', 'my-theme' );
$verb = _x( 'Post', 'verb: to publish content', 'my-theme' );
```

### _ex() - Echo translated string with context
Displays the translated string with context and escapes it for safe use in HTML output.
```php
_ex( 'Add New', 'user: add new user', 'my-theme' );
```

### _n() - Retrieve singular or plural form
Retrieves the translation of `$single` or `$plural` based on the `$number` provided.
```php
$comments_text = sprintf(
    _n(
        '%d comment',
        '%d comments',
        get_comments_number(),
        'my-theme'
    ),
    number_format_i18n( get_comments_number() )
);
```

### _nx() - Retrieve singular or plural form with context
Retrieves the translation of `$single` or `$plural` based on the `$number` provided, with context.
```php
$post_text = sprintf(
    _nx(
        '%s post published',
        '%s posts published',
        count( $posts ),
        'count of published posts',
        'my-theme'
    ),
    number_format_i18n( count( $posts ) )
);
```

### _n_noop() - Register plural strings in POT file
Registers plural strings with the `.pot` file but doesn't translate them.
```php
$labels = array(
    'post' => _n_noop( '%s post', '%s posts', 'my-theme' ),
    'page' => _n_noop( '%s page', '%s pages', 'my-theme' ),
);
```

### _nx_noop() - Register plural strings with context in POT file
Registers plural strings with context with the `.pot` file but doesn't translate them.
```php
$labels = array(
    'user' => _nx_noop( '%s user', '%s users', 'count of users', 'my-theme' ),
);
```

### translate_nooped_plural() - Translate and return plural form
Translates the result of `_n_noop()` or `_nx_noop()`.
```php
$labels = array(
    'post' => _n_noop( '%s post', '%s posts', 'my-theme' ),
);
echo translate_nooped_plural( $labels['post'], 3, 'my-theme' ); // "3 posts"
```

## Translate & Escape Functions

### esc_html__() - Retrieve and escape HTML
Retrieves the translation of `$text` and escapes it for safe use in HTML output.
```php
echo esc_html__( '<strong>Bold text</strong>', 'my-theme' );
```

### esc_html_e() - Echo and escape HTML
Displays the translated string and escapes it for safe use in HTML output.
```php
esc_html_e( '<em>Italic text</em>', 'my-theme' );
```

### esc_html_x() - Retrieve and escape HTML with context
Retrieves the translation of `$text` with context and escapes it for safe use in HTML output.
```php
echo esc_html_x( 'Add New', 'button text', 'my-theme' );
```

### esc_attr__() - Retrieve and escape attribute
Retrieves the translation of `$text` and escapes it for safe use in HTML attribute.
```php
$button_text = esc_attr__( 'Click here', 'my-theme' );
echo '<button title="' . $button_text . '">Submit</button>';
```

### esc_attr_e() - Echo and escape attribute
Displays the translated string and escapes it for safe use in HTML attribute.
```php
echo '<input placeholder="' . esc_attr_e( 'Search...', 'my-theme' ) . '">';
```

### esc_attr_x() - Retrieve and escape attribute with context
Retrieves the translation of `$text` with context and escapes it for safe use in HTML attribute.
```php
echo '<a href="#" title="' . esc_attr_x( 'View Details', 'link title', 'my-theme' ) . '">View</a>';
```

## Date and Number Functions

### number_format_i18n() - Format number based on locale
Formats a number with grouped thousands and localized decimal/thousands separators.
```php
echo number_format_i18n( 1234.56, 2 ); // "1,234.56" in en_US, "1.234,56" in de_DE
```

### date_i18n() - Retrieve date in localized format
Retrieves the date in localized format based on the current locale.
```php
echo date_i18n( get_option( 'date_format' ), strtotime( '2024-01-15' ) );
```

## Text Domain Configuration

### Setting up Text Domain in style.css
```css
/*
Theme Name: My Theme
Text Domain: my-theme
Domain Path: /languages
*/
```

### Loading Text Domain
```php
function my_theme_load_textdomain() {
    load_theme_textdomain(
        'my-theme',
        get_template_directory() . '/languages'
    );
}
add_action( 'after_setup_theme', 'my_theme_load_textdomain' );
```

### Child Theme Text Domain
```php
function my_child_theme_load_textdomain() {
    load_child_theme_textdomain(
        'my-child-theme',
        get_stylesheet_directory() . '/languages'
    );
}
add_action( 'after_setup_theme', 'my_child_theme_load_textdomain' );
```

## Best Practices

### Always Use Text Domain
```php
// Correct
__( 'Hello World', 'my-theme' );

// Incorrect - missing text domain
__( 'Hello World' );
```

### Use Context for Ambiguous Strings
```php
// Without context - translator doesn't know meaning
__( 'Post', 'my-theme' );

// With context - clear meaning
_x( 'Post', 'noun: blog post', 'my-theme' );
_x( 'Post', 'verb: publish content', 'my-theme' );
```

### Use Appropriate Escaping Functions
```php
// For HTML content
esc_html__( '<strong>Welcome</strong>', 'my-theme' );

// For HTML attributes
$placeholder = esc_attr__( 'Enter your email', 'my-theme' );
echo '<input placeholder="' . $placeholder . '">';

// For URLs
$url = esc_url__( 'https://example.com', 'my-theme' );
echo '<a href="' . $url . '">Link</a>';
```

### Handle Plurals Correctly
```php
$comment_count = get_comments_number();
printf(
    _n(
        'One comment',
        '%s comments',
        $comment_count,
        'my-theme'
    ),
    number_format_i18n( $comment_count )
);
```

## JavaScript Internationalization

### Setting up JavaScript i18n
```php
function my_theme_enqueue_scripts() {
    wp_enqueue_script(
        'my-theme-script',
        get_template_directory_uri() . '/js/script.js',
        array( 'wp-i18n' )
    );
    
    wp_set_script_translations(
        'my-theme-script',
        'my-theme',
        get_template_directory() . '/languages'
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );
```

### Using i18n in JavaScript
```javascript
import { __, _x, _n } from '@wordpress/i18n';

console.log( __( 'Hello World', 'my-theme' ) );
console.log( _x( 'Post', 'noun', 'my-theme' ) );
console.log( _n( 'One comment', '%s comments', commentCount, 'my-theme' ) );
```

## Translation File Structure

### Translation Files Location
```
languages/
├── my-theme.pot          # Template file
├── my-theme-de_DE.po      # German source file
├── my-theme-de_DE.mo      # German compiled file
├── my-theme-es_ES.po      # Spanish source file
└── my-theme-es_ES.mo      # Spanish compiled file
```

### Automatic Translation Loading
For themes in the WordPress.org directory:
- WordPress automatically downloads translations from translate.wordpress.org
- Files are stored in `wp-content/languages/themes/`
- Manual loading not required

### Manual Translation Loading
For custom themes:
```php
function my_theme_load_translations() {
    load_theme_textdomain(
        'my-theme',
        get_template_directory() . '/languages'
    );
}
add_action( 'after_setup_theme', 'my_theme_load_translations' );
```

## Common String Patterns

### Navigation Menus
```php
_e( 'Primary Menu', 'my-theme' );
_e( 'Footer Menu', 'my-theme' );
_e( 'Social Menu', 'my-theme' );
```

### Post Meta Information
```php
printf(
    esc_html__( 'Posted on %1$s by %2$s', 'my-theme' ),
    '<time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>',
    '<span class="author">' . esc_html( get_the_author() ) . '</span>'
);
```

### Comments Section
```php
esc_html_e( 'Leave a Reply', 'my-theme' );
esc_html_e( 'Your email address will not be published.', 'my-theme' );

printf(
    _n(
        'One thought on &ldquo;%2$s&rdquo;',
        '%1$s thoughts on &ldquo;%2$s&rdquo;',
        get_comments_number(),
        'my-theme'
    ),
    number_format_i18n( get_comments_number() ),
    get_the_title()
);
```

### Search Forms
```php
_e( 'Search for:', 'my-theme' );
$placeholder = esc_attr__( 'Search &hellip;', 'my-theme' );
$button_text = esc_attr__( 'Search', 'my-theme' );
```

### 404 Pages
```php
esc_html_e( 'Oops! That page can&rsquo;t be found.', 'my-theme' );
esc_html_e( 'It looks like nothing was found at this location.', 'my-theme' );
```

## Translation Guidelines

### String Writing Best Practices
- Use complete sentences
- Avoid concatenating translated strings
- Use placeholders for variables
- Keep strings simple and translatable
- Avoid technical jargon when possible

### Handling Variables
```php
// Incorrect - breaks translation
echo 'Welcome, ' . $user_name . '!';

// Correct - uses placeholder
printf(
    esc_html__( 'Welcome, %s!', 'my-theme' ),
    esc_html( $user_name )
);
```

### Context and Comments
```php
/* translators: %s: post title */
printf(
    esc_html__( 'Post: %s', 'my-theme' ),
    get_the_title()
);

_x( 'Date', 'column header', 'my-theme' );
_x( 'Date', 'romantic meeting', 'my-theme' );
```

By following these internationalization practices, WordPress themes become accessible to global audiences and can be easily translated by the WordPress community.