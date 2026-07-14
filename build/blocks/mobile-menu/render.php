<?php
wp_interactivity_state(
	'rp-multi-block',
	array(
		'learnOpen'  => false,
		'gearsOpen'  => false,
	)
);
?>

<div
	<?php echo get_block_wrapper_attributes( array( 'class' => 'mobile-menu' ) ); ?>
	data-wp-interactive="rp-multi-block"
	data-wp-bind--hidden="!state.mobileMenuOpen"
	hidden
>
	<div class="mobile-menu-inner">
		<div class="mobile-nav-section" data-wp-context='{ "sectionId": "learn" }'>
			<button class="mobile-nav-toggle" data-wp-on--click="actions.toggleSection" data-wp-bind--aria-expanded="state.learnOpen">
				<span>Learn</span>
				<svg class="chevron" width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</button>
			<ul class="mobile-submenu" data-wp-bind--hidden="!state.learnOpen" hidden>
				<li><a href="/learn/barefoot-running/">barefoot running</a></li>
				<li><a href="/learn/running-form/">running form</a></li>
				<li><a href="/learn/science/">science</a></li>
			</ul>
		</div>

		<div class="mobile-nav-section" data-wp-context='{ "sectionId": "gears" }'>
			<button class="mobile-nav-toggle" data-wp-on--click="actions.toggleSection" data-wp-bind--aria-expanded="state.gearsOpen">
				<span>Gears</span>
				<svg class="chevron" width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</button>
			<ul class="mobile-submenu" data-wp-bind--hidden="!state.gearsOpen" hidden>
				<li><a href="/gears/trail-running-shoes/">Trail running shoes</a></li>
				<li><a href="/gears/running-shoes/">Running Shoes</a></li>
			</ul>
		</div>

		<a href="/shop/" class="mobile-nav-link">Shop</a>

		<a href="/about-us/" class="mobile-nav-link">About</a>
	</div>
</div>
