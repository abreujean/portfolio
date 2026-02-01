---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: security-best-practices
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/themes/advanced-topics/security/
---

# WordPress Theme Security Best Practices

Security is a critical aspect of WordPress theme development. Responsible coding means being vigilant about all ways your theme can be exploited. This guide covers common vulnerabilities and protection techniques.

## Common Vulnerabilities

### Cross-Site Scripting (XSS)

#### What is XSS?
Cross-Site Scripting occurs when a malicious party injects JavaScript into a web page, potentially stealing user data or performing unauthorized actions.

#### Prevention Techniques

**Always Escape Output**
```php
// Image URLs
<img src="<?php echo esc_url( $great_user_picture_url ); ?>" />

// HTML content with allowed tags
$allowed_html = array(
    'a' => array( 'href' => array() ),
    'br' => array(),
    'em' => array(),
    'strong' => array()
);
echo wp_kses( $custom_content, $allowed_html );

// HTML attributes
<input type="text" name="<?php echo esc_attr( $field_name ); ?>" />

// Text content
<h1><?php echo esc_html( $page_title ); ?></h1>
```

**Context-Specific Escaping**
- `esc_html()` - For HTML content
- `esc_attr()` - For HTML attributes
- `esc_url()` - For URLs in attributes
- `esc_js()` - For JavaScript values
- `wp_kses_post()` - For post content with allowed HTML

### SQL Injection

#### What is SQL Injection?
SQL Injection happens when values being input are not properly sanitized, allowing SQL commands to be executed in database queries.

#### Prevention Techniques

**Use WordPress Functions First**
```php
// Good - Use WordPress functions
add_post_meta( $post_id, '_custom_field', $value );

// Bad - Direct SQL queries
$wpdb->query( "INSERT INTO {$wpdb->postmeta} VALUES ({$post_id}, '_custom_field', '{$value}')" );
```

**When Custom Queries Are Necessary**
```php
// Always use $wpdb->prepare()
$wpdb->get_var( $wpdb->prepare(
    "SELECT something FROM table WHERE foo = %s and status = %d",
    $name,  // Unescaped string (function sanitizes)
    $status // Untrusted integer (function sanitizes)
) );
```

**Query Examples**
```php
// Insert query
$wpdb->insert(
    $wpdb->prefix . 'my_table',
    array(
        'name' => sanitize_text_field( $_POST['name'] ),
        'email' => sanitize_email( $_POST['email'] ),
        'created_at' => current_time( 'mysql' )
    ),
    array( '%s', '%s', '%s' )
);

// Update query
$wpdb->update(
    $wpdb->prefix . 'my_table',
    array( 'status' => 'active' ),
    array( 'id' => absint( $_GET['id'] ) ),
    array( '%s', '%d' )
);
```

### Cross-Site Request Forgery (CSRF)

#### What is CSRF?
CSRF tricks authenticated users into performing unwanted actions within a web application they're logged into.

#### Prevention Techniques

**Use Nonces for Form Protection**
```php
<form method="post">
    <!-- some inputs here ... -->
    <?php wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' ); ?>
    <input type="submit" value="Save Changes">
</form>
```

**Verify Nonces in Processing**
```php
if ( isset( $_POST['name_of_nonce_field'] ) && 
     wp_verify_nonce( $_POST['name_of_nonce_field'], 'name_of_my_action' ) ) {
    
    // Process the form data
    $user_data = array(
        'display_name' => sanitize_text_field( $_POST['display_name'] ),
        'user_email' => sanitize_email( $_POST['user_email'] )
    );
    
    wp_update_user( $user_data );
} else {
    wp_die( 'Security check failed!' );
}
```

**AJAX Request Protection**
```php
add_action( 'wp_ajax_my_custom_action', 'my_custom_ajax_handler' );

function my_custom_ajax_handler() {
    check_ajax_referer( 'my_custom_action_nonce', 'nonce' );
    
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'Permission denied' );
    }
    
    // Process AJAX request
    wp_send_json_success( array( 'message' => 'Action completed' ) );
}
```

## Data Validation and Sanitization

### Input Validation
```php
// Validate required fields
if ( empty( $_POST['required_field'] ) ) {
    wp_die( 'Required field is missing' );
}

// Validate numeric values
$user_id = isset( $_GET['user_id'] ) ? absint( $_GET['user_id'] ) : 0;

// Validate email addresses
$email = sanitize_email( $_POST['email'] );
if ( ! is_email( $email ) ) {
    wp_die( 'Invalid email address' );
}

// Validate URLs
$url = esc_url_raw( $_POST['website'] );
if ( ! wp_http_validate_url( $url ) ) {
    wp_die( 'Invalid URL' );
}
```

### Sanitization Functions
```php
// Text fields
$text_field = sanitize_text_field( $_POST['text_input'] );

// Textarea content
$textarea = sanitize_textarea_field( $_POST['textarea_input'] );

// HTML content
$html_content = wp_kses_post( $_POST['html_content'] );

// File names
$filename = sanitize_file_name( $_FILES['upload']['name'] );

// Hex colors
$color = sanitize_hex_color( $_POST['color_value'] );
```

## User Capability Checks

### Role-Based Access
```php
// Check user capabilities
if ( ! current_user_can( 'edit_posts' ) ) {
    wp_die( 'You do not have permission to perform this action' );
}

// Page-specific checks
if ( ! current_user_can( 'edit_page', $post_id ) ) {
    return;
}

// Custom capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error">Insufficient permissions</div>';
    });
}
```

### Current User Verification
```php
// Verify user is logged in
if ( ! is_user_logged_in() ) {
    auth_redirect();
    exit;
}

// Get current user safely
$current_user = wp_get_current_user();
if ( $current_user->ID === 0 ) {
    wp_die( 'User not authenticated' );
}
```

## File Handling Security

### Upload Validation
```php
// Check file types
$allowed_mimes = array(
    'jpg|jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif'
);

if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}

$uploadedfile = wp_handle_upload( $_FILES['file_upload'], array( 'mimes' => $allowed_mimes ) );

// Verify file is actually an image
if ( $uploadedfile && ! empty( $uploadedfile['file'] ) ) {
    $image_info = getimagesize( $uploadedfile['file'] );
    if ( $image_info === false ) {
        unlink( $uploadedfile['file'] ); // Delete non-image files
        wp_die( 'Only image files are allowed' );
    }
}
```

### File Inclusion Prevention
```php
// Never include files based on user input directly
// Bad:
$filename = $_GET['file'];
include $filename; // Dangerous!

// Good:
$allowed_files = array(
    'template1.php',
    'template2.php',
    'template3.php'
);

$filename = sanitize_text_field( $_GET['file'] );
if ( in_array( $filename, $allowed_files ) ) {
    include get_template_directory() . '/' . $filename;
}
```

## Database Security

### Prepared Statements
```php
// Always use prepared statements
$results = $wpdb->get_results( $wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}custom_table 
     WHERE user_id = %d 
     AND status = %s 
     ORDER BY created_at DESC",
    get_current_user_id(),
    'published'
) );
```

### Data Escaping in Database
```php
// Store data safely
$update_result = $wpdb->update(
    $wpdb->prefix . 'user_meta',
    array(
        'meta_value' => maybe_serialize( $complex_data ),
        'updated_at' => current_time( 'mysql' )
    ),
    array(
        'user_id' => get_current_user_id(),
        'meta_key' => 'custom_settings'
    )
);
```

## Additional Security Measures

### HTTPS Enforcement
```php
// Force HTTPS for sensitive areas
if ( ! is_ssl() && ( is_admin() || is_login() ) ) {
    wp_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
    exit;
}

// Check secure connections
function my_theme_require_ssl() {
    if ( ! is_ssl() ) {
        wp_die( 'This site requires a secure connection' );
    }
}
add_action( 'login_init', 'my_theme_require_ssl' );
```

### Rate Limiting
```php
// Simple rate limiting for sensitive actions
function my_theme_rate_limit_check( $action, $limit = 5, $time_window = 300 ) {
    $user_id = get_current_user_id();
    $transient_key = "rate_limit_{$action}_{$user_id}";
    
    $attempts = get_transient( $transient_key );
    if ( $attempts >= $limit ) {
        return false;
    }
    
    set_transient( $transient_key, $attempts + 1, $time_window );
    return true;
}

// Usage
if ( ! my_theme_rate_limit_check( 'password_reset' ) ) {
    wp_die( 'Too many password reset attempts. Please try again later.' );
}
```

## Security Resources

### Official Documentation
- [Common APIs Handbook: Security](https://developer.wordpress.org/apis/security/)
- [Escaping Data](https://developer.wordpress.org/apis/security/escaping/)
- [Sanitizing Data](https://developer.wordpress.org/apis/security/sanitizing/)
- [Validating Data](https://developer.wordpress.org/apis/security/data-validation/)
- [Nonces](https://developer.wordpress.org/apis/security/nonces/)

### External Resources
- [WordPress Security Whitepaper](https://wordpress.org/about/security/)
- [WordPress Security Release](https://wordpress.org/news/category/security/)
- [OWASP Top 10](https://www.owasp.org/index.php/OWASP_Top_Ten_Cheat_Sheet)

### Staying Current
- Subscribe to WordPress security updates
- Follow security best practices blogs
- Regular security audits and code reviews
- Update dependencies and WordPress core regularly

By implementing these security practices, WordPress themes become significantly more secure and resistant to common attack vectors.