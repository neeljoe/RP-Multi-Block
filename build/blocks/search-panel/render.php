<?php
wp_interactivity_state(
	'rp-multi-block',
	array(
		'isSearchOpen' => false,
	)
);
?>

<div
	<?php echo get_block_wrapper_attributes( array( 'class' => 'search-toggle-panel' ) ); ?>
	data-wp-interactive="rp-multi-block"
	data-wp-class--is-open="state.isSearchOpen"
>
	<div class="search-panel-inner">
		<div class="search-panel-icon">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="8.5" cy="8.5" r="5.5" stroke="currentColor" stroke-width="1.5"/>
				<line x1="12.5" y1="12.5" x2="18" y2="18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
			</svg>
		</div>
		<form role="search" method="get" class="search-panel-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input
				type="search"
				class="search-panel-input"
				placeholder="<?php esc_attr_e( 'Search...', 'advanced-multi-block' ); ?>"
				value="<?php echo get_search_query(); ?>"
				name="s"
				autofocus
			/>
		</form>
	</div>
</div>
