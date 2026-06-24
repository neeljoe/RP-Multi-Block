import { store } from '@wordpress/interactivity';

const { state } = store( 'disney', {
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
