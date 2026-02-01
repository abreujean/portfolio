<?php
/**
 * Social Links Template Part
 * 
 * This template displays social media links with proper accessibility
 * and WordPress security standards.
 * 
 * @package Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$social_links = array(
	'github'   => array(
		'url'   => 'https://github.com/yourusername',
		'title' => __( 'GitHub Profile', 'portfolio' ),
		'icon'  => 'fab fa-github',
	),
	'linkedin' => array(
		'url'   => 'https://linkedin.com/in/yourusername',
		'title' => __( 'LinkedIn Profile', 'portfolio' ),
		'icon'  => 'fab fa-linkedin',
	),
	'twitter'  => array(
		'url'   => 'https://twitter.com/yourusername',
		'title' => __( 'Twitter Profile', 'portfolio' ),
		'icon'  => 'fab fa-twitter',
	),
	'email'    => array(
		'url'   => 'mailto:your.email@example.com',
		'title' => __( 'Email Contact', 'portfolio' ),
		'icon'  => 'fas fa-envelope',
	),
);

/**
 * Filter social links array
 * 
 * @param array $social_links Array of social media links
 */
$social_links = apply_filters( 'portfolio_social_links', $social_links );

// Only display if we have social links
if ( ! empty( $social_links ) ) : ?>
	<nav class="social-links" aria-label="<?php esc_attr_e( 'Social Media Links', 'portfolio' ); ?>">
		<ul class="social-links__list">
			<?php foreach ( $social_links as $platform => $data ) :
				// Skip if URL is empty
				if ( empty( $data['url'] ) ) {
					continue;
				}
				?>
				<li class="social-links__item social-links__item--<?php echo esc_attr( $platform ); ?>">
					<a 
						href="<?php echo esc_url( $data['url'] ); ?>" 
						class="social-links__link"
						target="_blank" 
						rel="noopener noreferrer"
						aria-label="<?php echo esc_attr( $data['title'] ); ?>"
						title="<?php echo esc_attr( $data['title'] ); ?>"
					>
						<?php if ( ! empty( $data['icon'] ) ) : ?>
							<i class="<?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
						<?php else : ?>
							<span class="screen-reader-text"><?php echo esc_html( $data['title'] ); ?></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
<?php endif; ?>