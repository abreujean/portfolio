---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: html-coding-standards
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/html/
---

# HTML Coding Standards for WordPress

WordPress HTML coding standards ensure valid, accessible, and secure markup that integrates properly with WordPress core and plugins.

## HTML Validation

### Required Validation
- All HTML pages should be validated against the W3C validator
- Ensures markup is well-formed and standards-compliant
- Helps catch automation-testable problems
- Not a substitute for manual code review

**Validation Resources:**
- [W3C Markup Validator](https://validator.w3.org/)
- [HTML Validation Resources](https://codex.wordpress.org/Validating_a_Website#HTML_-_Validation)

## Self-Closing Elements

### Proper Format
```html
<!-- Correct: Space before slash -->
<br />
<img src="image.jpg" alt="Description" />
<hr />

<!-- Incorrect: No space -->
<br/>
<img src="image.jpg" alt="Description"/>
<hr/>
```

The W3C specifies exactly one space should precede the self-closing slash for proper XHTML compliance.

## Attributes and Tags

### Case Requirements
- All tags and attributes must be written in lowercase
- Attribute values should be lowercase when machine-interpreted
- Use proper title capitalization for human-readable text

### Machine-Interpreted Attributes
```html
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="page description" />
<link rel="stylesheet" href="style.css" type="text/css" />
```

### Human-Readable Attributes
```html
<a href="https://example.com/" title="Description Here">Example.com</a>
<h1 class="entry-title">Page Title</h1>
<p class="author-name">Written by John Doe</p>
```

## Quotes and Attribute Values

### Required Quoting
According to W3C XHTML specifications:
- All attributes must have a value
- All attribute values must use double or single quotes

### Correct Usage
```html
<input type="text" name="email" disabled="disabled" />
<input type='text' name='email' disabled='disabled' />
<a href="https://example.com/" title="Link Title">Link Text</a>
```

### Incorrect Usage
```html
<input type=text name=email disabled>
<a href=https://example.com/ title=Link Title>Link Text</a>
```

### Boolean Attributes
In HTML5, boolean attributes can be written without values:

```html
<!-- Correct: Minimal form -->
<input type="text" name="email" disabled>

<!-- Incorrect: Using true/false -->
<input type="text" name="email" disabled="true">
<input type="text" name="email" disabled="false">
```

## WordPress-Specific HTML Standards

### HTML5 Semantic Structure
Modern WordPress themes should use HTML5 semantic elements:

```html
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header id="masthead" class="site-header">
        <?php // Header content ?>
    </header>
    
    <main id="primary" class="site-main">
        <?php // Main content ?>
    </main>
    
    <aside id="secondary" class="widget-area">
        <?php // Sidebar content ?>
    </aside>
    
    <footer id="colophon" class="site-footer">
        <?php // Footer content ?>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
```

### WordPress Functions in HTML
```php
<!-- Language attributes -->
<html <?php language_attributes(); ?>>

<!-- Body classes -->
<body <?php body_class(); ?>>

<!-- Post classes -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- Comment classes -->
<li <?php comment_class(); ?>>

<!-- Menu attributes -->
<nav <?php wp_nav_menu_args(); ?>>
```

## Accessibility Standards

### Proper Alt Text
```html
<!-- Images with descriptive alt text -->
<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo.png' ) ); ?>" 
     alt="<?php bloginfo( 'name' ); ?>" 
     width="200" height="50">

<!-- Decorative images -->
<img src="decorative-line.png" alt="" role="presentation">
```

### Form Labels
```html
<label for="user-email">Email Address:</label>
<input type="email" id="user-email" name="user_email" required>

<label for="search-query">Search:</label>
<input type="search" id="search-query" name="s" placeholder="Search site...">
```

### ARIA Attributes
```html
<!-- Navigation landmarks -->
<nav aria-label="Main navigation">
  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>

<main role="main" aria-label="Main content">
  <?php // Main content ?>
</main>

<aside aria-label="Sidebar">
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

<!-- Dynamic content -->
<div aria-live="polite" id="search-results">
  <?php // Search results ?>
</div>
```

## Indentation Standards

### General Rules
- Use tabs, not spaces for indentation
- HTML indentation should reflect logical structure
- When mixing PHP and HTML, indent PHP blocks to match surrounding HTML

### Correct Indentation Example
```php
<?php if ( have_posts() ) : ?>
    <div id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php endif; ?>
```

### Incorrect Indentation Example
```php
<?php if ( have_posts() ) : ?>
<div id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
<h1 class="entry-title">
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<?php the_title(); ?>
</a>
</h1>
<div class="entry-content">
<?php the_content(); ?>
</div>
</div>
<?php endif; ?>
```

## Security Best Practices

### Always Escape Output
```php
<!-- URL escaping -->
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>

<!-- Attribute escaping -->
<input type="text" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $field_value ); ?>">

<!-- HTML escaping -->
<p><?php echo esc_html( get_the_content() ); ?></p>

<!-- Text escaping -->
<h1><?php echo esc_html( get_the_title() ); ?></h1>
```

### Nonce Fields in Forms
```html
<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <?php wp_nonce_field( 'my_action_name', 'my_nonce_field' ); ?>
    <input type="hidden" name="action" value="my_action_name">
    <!-- Form fields -->
    <input type="submit" value="Submit">
</form>
```

## Performance Considerations

### Efficient Markup
```html
<!-- Use appropriate elements -->
<header> instead of <div class="header">
<nav> instead of <div class="navigation">
<main> instead of <div class="main-content">
<section> instead of <div class="section">

<!-- Minimize nesting -->
<div class="card">
    <h3>Card Title</h3>
    <p>Card content</p>
</div>

<!-- Not: -->
<div class="card">
    <div class="card-inner">
        <div class="card-header">
            <div class="card-title">Card Title</div>
        </div>
        <div class="card-content">
            <div class="card-text">Card content</div>
        </div>
    </div>
</div>
```

### Meta Tags
```html
<!-- Essential meta tags -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">

<!-- Open Graph meta -->
<meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>">
<meta property="og:description" content="<?php echo esc_attr( get_the_excerpt() ); ?>">
<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
<meta property="og:type" content="article">
```

## Mobile-First Responsive Design

### Responsive Images
```html
<!-- WordPress responsive images -->
<?php
if ( has_post_thumbnail() ) :
    the_post_thumbnail( 'large', array(
        'class' => 'featured-image',
        'alt' => get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ),
        'loading' => 'lazy'
    ) );
endif;
?>

<!-- Picture element for art direction -->
<picture>
    <source media="(max-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-mobile.svg' ) ); ?>">
    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-desktop.svg' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
</picture>
```

### Viewport and Responsive Meta
```html
<!-- Essential for responsive design -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Touch optimization for mobile -->
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
```

By following these HTML coding standards, WordPress themes become more accessible, secure, and maintainable while ensuring compatibility with WordPress core and plugins.