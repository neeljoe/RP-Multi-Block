<?php
wp_interactivity_state(
	'rp-multi-block',
	array(
		'mobileMenuOpen' => false,
	)
);
?>

<div
	<?php echo get_block_wrapper_attributes( array( 'class' => 'mobile-menu-toggle-wrapper' ) ); ?>
	data-wp-interactive="rp-multi-block"
>
	<button
		class="navbar-toggler"
		data-wp-on--click="actions.toggleMobileMenu"
		aria-label="Toggle navigation"
	>
		<span class="navbar-toggler-icon">
			<svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M29.225 10.3122C30.625 10.3122 31.71 9.22722 31.71 7.82722C31.71 6.46222 30.625 5.34222 29.225 5.34222H5.845C4.445 5.34222 3.36 6.46222 3.36 7.82722C3.36 9.22722 4.445 10.3122 5.845 10.3122H29.225ZM29.225 20.0422C30.625 20.0422 31.71 18.9222 31.71 17.5572C31.71 16.1922 30.625 15.0722 29.225 15.0722H5.845C4.445 15.0722 3.36 16.1922 3.36 17.5572C3.36 18.9222 4.445 20.0422 5.845 20.0422H29.225ZM29.225 29.7372C30.625 29.7372 31.71 28.6522 31.71 27.2522C31.71 25.8872 30.625 24.7672 29.225 24.7672H5.845C4.445 24.7672 3.36 25.8872 3.36 27.2522C3.36 28.6522 4.445 29.7372 5.845 29.7372H29.225Z" fill="currentColor"/>
			</svg>
		</span>
	</button>
</div>
