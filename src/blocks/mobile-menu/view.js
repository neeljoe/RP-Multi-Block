import { store, getContext, getElement } from '@wordpress/interactivity';

const { state } = store( 'rp-multi-block', {
	state: {
		learnOpen: false,
		gearsOpen: false,
	},
	actions: {
		toggleSection() {
			const context = getContext();
			const { ref } = getElement();

			const key = context.sectionId + 'Open';
			const wasAlreadyOpen = state[ key ];

			state.learnOpen = false;
			state.gearsOpen = false;

			if ( ! wasAlreadyOpen ) {
				state[ key ] = true;
				requestAnimationFrame( () => {
					ref.closest( '.mobile-nav-section' )
						?.scrollIntoView( { behavior: 'smooth', block: 'nearest' } );
				} );
			}
		},
	},
} );
