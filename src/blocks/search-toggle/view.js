import { store } from '@wordpress/interactivity';

const { state } = store( 'rp-multi-block', {
	state: {
		isSearchOpen: false,
	},
	actions: {
		toggleSearch() {
			state.isSearchOpen = ! state.isSearchOpen;
			state.mobileMenuOpen = false;
		},
		closeSearch() {
			state.isSearchOpen = false;
		},
	},
} );
