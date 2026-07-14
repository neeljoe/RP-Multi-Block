import { store } from '@wordpress/interactivity';

const { state } = store( 'rp-multi-block', {
	state: {
		mobileMenuOpen: false,
	},
	actions: {
		toggleMobileMenu() {
			state.mobileMenuOpen = ! state.mobileMenuOpen;
			state.isSearchOpen = false;
		},
	},
} );
