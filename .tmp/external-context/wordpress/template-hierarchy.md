---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: template-hierarchy
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/themes/templates/template-hierarchy/
---

# WordPress Template Hierarchy

WordPress uses a query string to determine which template file to use for displaying pages. The system searches down through the template hierarchy and uses the first matching template file.

## How Template Hierarchy Works

1. **Match Query String** - WordPress matches the query to a query type
2. **Select Template Order** - Determines the template search order
3. **Search Theme Directory** - Looks for matching template files in order
4. **Use First Match** - Uses the first matching template found
5. **Fallback to index.php** - Falls back to main template if no match

## Template Hierarchy by Page Type

### Front Page Display
1. `front-page.php` - Used for both "latest posts" or static page
2. `home.php` - If front-page.php doesn't exist and "latest posts" is set
3. `page.php` - When "front page" is set in Settings → Reading
4. `index.php` - Final fallback

### Blog Posts Index (Home)
1. `home.php` - Renders blog posts index
2. `index.php` - Fallback template

### Single Post Display
1. `single-{post-type}-{slug}.php` - Specific post: `single-product-dmc-12.php`
2. `single-{post-type}.php` - Post type specific: `single-product.php`
3. `single.php` - Generic single post template
4. `singular.php` - Fallback for any singular content
5. `index.php` - Final fallback

### Single Page Display
1. Custom template file assigned to page
2. `page-{slug}.php` - Page slug specific: `page-recent-news.php`
3. `page-{id}.php` - Page ID specific: `page-6.php`
4. `page.php` - Generic page template
5. `singular.php` - Singular content fallback
6. `index.php` - Final fallback

### Category Archives
1. `category-{slug}.php` - Category slug: `category-news.php`
2. `category-{id}.php` - Category ID: `category-6.php`
3. `category.php` - Generic category archive
4. `archive.php` - Generic archive template
5. `index.php` - Final fallback

### Tag Archives
1. `tag-{slug}.php` - Tag slug: `tag-sometag.php`
2. `tag-{id}.php` - Tag ID: `tag-6.php`
3. `tag.php` - Generic tag archive
4. `archive.php` - Generic archive template
5. `index.php` - Final fallback

### Custom Taxonomies
1. `taxonomy-{taxonomy}-{term}.php` - Specific term: `taxonomy-sometax-someterm.php`
2. `taxonomy-{taxonomy}.php` - Taxonomy specific: `taxonomy-sometax.php`
3. `taxonomy.php` - Generic taxonomy archive
4. `archive.php` - Generic archive template
5. `index.php` - Final fallback

### Author Archives
1. `author-{nicename}.php` - Author nice name: `author-matt.php`
2. `author-{id}.php` - Author ID: `author-6.php`
3. `author.php` - Generic author archive
4. `archive.php` - Generic archive template
5. `index.php` - Final fallback

### Date-Based Archives
1. `date.php` - Date-based archive template
2. `archive.php` - Generic archive template
3. `index.php` - Final fallback

### Search Results
1. `search.php` - Search results template
2. `index.php` - Final fallback

### 404 Not Found
1. `404.php` - Error page template
2. `index.php` - Final fallback

### Attachment Pages
1. `{MIME-type}.php` - MIME type specific: `image.php`, `video.php`, `pdf.php`
2. `attachment.php` - Generic attachment template
3. `single-attachment-{slug}.php` - Specific attachment
4. `single-attachment.php` - Generic single attachment
5. `single.php` - Single content fallback
6. `singular.php` - Singular content fallback
7. `index.php` - Final fallback

### Embed Templates
1. `embed-{post-type}-{post_format}.php` - Specific format: `embed-post-audio.php`
2. `embed-{post-type}.php` - Post type specific: `embed-product.php`
3. `embed.php` - Generic embed template
4. Core fallback template

## Special Templates

### Privacy Policy Page
1. `privacy-policy.php` - Privacy policy specific template
2. Custom template file assigned to page
3. `page-{slug}.php` - Page slug template
4. `page-{id}.php` - Page ID template
5. `page.php` - Generic page template
6. `singular.php` - Singular content fallback
7. `index.php` - Final fallback

## Template Hierarchy Filtering

WordPress allows filtering the hierarchy using `{$type}_template` hooks:
- `embed_template`
- `404_template`
- `search_template`
- `frontpage_template`
- `home_template`
- `privacypolicy_template`
- `taxonomy_template`
- `attachment_template`
- `single_template`
- `page_template`
- `singular_template`
- `category_template`
- `tag_template`
- `author_template`
- `date_template`
- `archive_template`
- `index_template`

### Example: Adding Author Role Template
```php
function author_role_template( $templates = '' ) {
    $author = get_queried_object();
    $role   = $author->roles[0];

    if ( ! is_array( $templates ) && ! empty( $templates ) ) {
        $templates = locate_template( array( "author-$role.php", $templates ), false );
    } elseif ( empty( $templates ) ) {
        $templates = locate_template( "author-$role.php", false );
    } else {
        $new_template = locate_template( array( "author-$role.php" ) );
        if ( ! empty( $new_template ) ) {
            array_unshift( $templates, $new_template );
        }
    }
    return $templates;
}
add_filter( 'author_template', 'author_role_template' );
```

## Child Theme Override Behavior

Child themes override parent theme templates:
- Child theme `category-unicorns.php` overrides parent `category-unicorns.php`
- Child theme `category.php` overrides parent `category-unicorns.php`
- Parent theme specific template takes priority over child theme generic template

## Non-ASCII Character Handling

Since WordPress 4.7, template names with non-ASCII characters support both encoded and unencoded forms:
- `page-hello-world-😀.php`
- `page-hello-world-%f0%9f%98%80.php` (encoded)
- `page-6.php`
- `page.php`
- `singular.php`

Understanding the template hierarchy is essential for creating well-structured WordPress themes that handle all content types appropriately.