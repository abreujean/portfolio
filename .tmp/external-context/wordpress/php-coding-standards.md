---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: php-coding-standards
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/
---

# PHP Coding Standards for WordPress

WordPress PHP coding standards are intended for the WordPress community as a whole. They are mandatory for WordPress Core and encouraged for themes and plugins. These standards encompass not just code style, but also established best practices for interoperability, translatability, and security.

## General Standards

### PHP Tags and Structure
- Use full PHP tags: `<?php ... ?>` and `<?php echo esc_html( $var ); ?>`
- Never use shorthand tags: `<? ... ?>` or `<?= ... ?>`
- Embed multi-line PHP snippets with tags on separate lines
- Single line inline PHP is acceptable: `<input name="<?php echo esc_attr( $name ); ?>" />`

### Quotes Usage
- Use single quotes for strings without evaluation: `'some string'`
- Use double quotes for strings with variables: `"{$variable}"`
- Alternate quote styles to avoid escaping

### Include Statements
- Use `require_once` for unconditional includes
- Include path without parentheses: `require_once ABSPATH . 'file-name.php';`
- Include exactly one space between keyword and path

## Naming Conventions

### Variables and Functions
- Use lowercase with underscores: `function some_name( $some_variable )`
- Don't abbreviate unnecessarily; make code self-documenting
- Avoid reserved keywords as parameter names

### Classes and Constants
- Class names: Capitalized words with underscores: `class Walker_Category`
- Constants: All uppercase with underscores: `define( 'DOING_AJAX', true );`
- Files: Lowercase with hyphens: `my-plugin-name.php`
- Class files: `class-` prefix with hyphens for underscores: `class-wp-error.php`

### Dynamic Hooks
- Use interpolation for dynamic hooks: `do_action( "{$new_status}_{$post->post_type}", $post->ID, $post );`
- Wrap variables in curly braces within double quotes

## Whitespace and Formatting

### Indentation
- Use real tabs, not spaces
- Align code with spaces mid-line when needed for readability
- Remove trailing spaces and blank lines at end of files

### Space Usage
- Spaces after commas and operators: `SOME_CONST === 23;`
- Spaces around parentheses in control structures: `foreach ( $foo as $bar ) {`
- Type casts lowercase: `(bool) $bar`, `(int) $foo`

### Arrays
- Use long array syntax: `array( 1, 2, 3 )`
- Multiline arrays with each item on new line
- Comma after last array item for easier diffs

## Object-Oriented Programming

### Class Structure
- Only one class/interface/trait/enum per file
- Explicit visibility for all properties and methods
- Visibility order: abstract/final → visibility → static/readonly → type

### Method Examples
```php
// Correct
abstract readonly class Foo {
    private const LABEL = 'Book';
    public static $foo;
    private readonly string $bar;
    abstract protected static function bar();
}

// Incorrect
class Foo {
    protected final const SLUG = 'book';
    static public $foo;
}
```

## Modern PHP Features

### Type Declarations
- Use PHP 7.0+ features when minimum version allows
- Type declarations with spaces: `function foo( Class_Name $parameter )`
- Return types: `function bar(): User|false`

### Namespace Usage
- One namespace declaration per file at top
- Capitalized words with underscores: `namespace Prefix\Admin\Domain_URL\Sub_Domain\Event;`
- Use import statements in specific order (classes → functions → constants)

## Security Best Practices

### Database Queries
- Always use `$wpdb->prepare()` for SQL queries
- Use WordPress functions when available
- Format SQL placeholders: `%s` for strings, `%d` for integers, `%i` for identifiers

### Data Handling
- Always escape output with appropriate functions
- Validate and sanitize input data
- Use WordPress escaping functions: `esc_html()`, `esc_attr()`, `esc_url()`

## Control Structures

### Conditional Logic
- Use `elseif`, not `else if`
- Use Yoda conditions: `if ( true === $the_force )`
- Always use braces for blocks

### Error Handling
- Prefer `require_once` over `include_once`
- Never use `@` error suppression operator
- Avoid `eval()` and `create_function()`

These standards ensure WordPress themes are secure, maintainable, and compatible with the WordPress ecosystem.