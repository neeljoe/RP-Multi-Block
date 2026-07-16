<?php
/**
 * Server-side render for the Category Carousel block.
 *
 * Queries categories with posts and their featured/latest post,
 * then outputs carousel markup with Interactivity API directives.
 *
 * @package RP_Multi_Block
 * @since 2.1.0
 */

$categories = get_categories(
	array(
		'hide_empty' => true,
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 9,
	)
);

$carousel_items = array();

foreach ( $categories as $cat ) {
	// Try to find a post marked as featured for this category.
	$featured_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'category__in'   => array( $cat->term_id ),
			'posts_per_page' => 1,
			'orderby'        => 'date',
			'order'          => 'DESC',
			'meta_query'     => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				array(
					'key'   => '_rp_carousel_featured',
					'value' => '1',
				),
			),
		)
	);

	// Fallback to the latest post if none is featured.
	if ( ! $featured_query->have_posts() ) {
		$featured_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'category__in'   => array( $cat->term_id ),
				'posts_per_page' => 1,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);
	}

	if ( $featured_query->have_posts() ) {
		$featured_query->the_post();

		$carousel_items[] = array(
			'category_name'  => $cat->name,
			'category_url'   => get_category_link( $cat->term_id ),
			'post_count'     => $cat->count,
			'post_title'     => get_the_title(),
			'post_url'       => get_the_permalink(),
			'featured_image' => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ),
		);

		wp_reset_postdata();
	}
}

wp_reset_query();

$total_items = count( $carousel_items );

if ( 0 === $total_items ) {
	return;
}

wp_interactivity_state(
	'rp-multi-block',
	array(
		'carousel' => array(
			'currentPage' => 0,
		),
	)
);
?>

<div
	<?php echo get_block_wrapper_attributes( array( 'class' => 'rp-carousel' ) ); ?>
	data-wp-interactive="rp-multi-block"
	data-wp-init="callbacks.initCarousel"
	data-wp-on--mouseenter="actions.pauseCarousel"
	data-wp-on--mouseleave="actions.resumeCarousel"
	role="region"
	aria-label="<?php esc_attr_e( 'Category carousel', 'advanced-multi-block' ); ?>"
>
	<h2 class="rp-carousel-heading"><?php esc_html_e( 'Explore Topics', 'advanced-multi-block' ); ?></h2>

	<div class="rp-carousel-wrapper">
		<button
			class="rp-carousel-prev"
			data-wp-on--click="actions.carouselPrev"
			aria-label="<?php esc_attr_e( 'Previous categories', 'advanced-multi-block' ); ?>"
		>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<div class="rp-carousel-track">
			<?php foreach ( $carousel_items as $item ) : ?>
			<div class="rp-carousel-card">
				<a href="<?php echo esc_url( $item['category_url'] ); ?>" class="rp-carousel-card-link">
					<?php if ( $item['featured_image'] ) : ?>
					<div class="rp-carousel-card-image">
						<img
							src="<?php echo esc_url( $item['featured_image'] ); ?>"
							alt="<?php echo esc_attr( $item['category_name'] ); ?>"
							loading="lazy"
						/>
					</div>
					<?php endif; ?>
					<div class="rp-carousel-card-content">
						<span class="rp-carousel-card-category">
							<?php echo esc_html( $item['category_name'] ); ?>
						</span>
						<span class="rp-carousel-card-title">
							<?php echo esc_html( $item['post_title'] ); ?>
						</span>
						<span class="rp-carousel-card-count">
							<?php
							printf(
								/* translators: %s: number of articles */
								esc_html( _n( '%s article', '%s articles', $item['post_count'], 'advanced-multi-block' ) ),
								number_format_i18n( $item['post_count'] )
							);
							?>
						</span>
					</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>

		<button
			class="rp-carousel-next"
			data-wp-on--click="actions.carouselNext"
			aria-label="<?php esc_attr_e( 'Next categories', 'advanced-multi-block' ); ?>"
		>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
	</div>

	<div class="rp-carousel-dots" data-wp-bind--aria-label="<?php esc_attr_e( 'Carousel navigation', 'advanced-multi-block' ); ?>">
		<?php for ( $i = 0; $i < $total_items; $i++ ) : ?>
		<button
			class="rp-carousel-dot"
			data-wp-on--click="actions.carouselGoTo"
			data-wp-context='<?php echo wp_json_encode( array( 'pageIndex' => $i ) ); ?>'
			data-wp-class--is-active="context.pageIndex === state.carousel.currentPage"
			aria-label="<?php
				printf(
					/* translators: %d: page number */
					esc_attr__( 'Go to slide %d', 'advanced-multi-block' ),
					$i + 1
				);
			?>"
		></button>
		<?php endfor; ?>
	</div>
</div>
