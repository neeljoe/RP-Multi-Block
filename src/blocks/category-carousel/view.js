import { store, getContext, getElement } from '@wordpress/interactivity';

const autoplayIntervals = new Map();
const AUTO_SCROLL_DELAY = 5000;

function getCardStep( container ) {
	return container?.offsetWidth ?? 0;
}

function scrollNext( container ) {
	if ( ! container ) return;
	const step = getCardStep( container );
	const maxScroll = container.scrollWidth - container.clientWidth;
	if ( container.scrollLeft + step >= maxScroll ) {
		container.scrollTo( { left: 0, behavior: 'smooth' } );
	} else {
		container.scrollBy( { left: step, behavior: 'smooth' } );
	}
}

store( 'rp-multi-block', {
	actions: {
		carouselPrev() {
			const wrapper = getElement().ref.closest( '.rp-carousel' );
			if ( ! wrapper ) return;
			const container = wrapper.querySelector( '.rp-carousel-track' );
			if ( ! container ) return;
			const step = getCardStep( container );
			if ( container.scrollLeft - step <= 0 ) {
				container.scrollTo( {
					left: container.scrollWidth,
					behavior: 'smooth',
				} );
			} else {
				container.scrollBy( { left: -step, behavior: 'smooth' } );
			}
		},

		carouselNext() {
			const wrapper = getElement().ref.closest( '.rp-carousel' );
			if ( ! wrapper ) return;
			const container = wrapper.querySelector( '.rp-carousel-track' );
			scrollNext( container );
		},

		carouselGoTo() {
			const context = getContext();
			const wrapper = getElement().ref.closest( '.rp-carousel' );
			if ( ! wrapper ) return;
			const container = wrapper.querySelector( '.rp-carousel-track' );
			if ( ! container ) return;
			const step = getCardStep( container );
			const pageIndex = context.pageIndex || 0;
			container.scrollTo( {
				left: pageIndex * step,
				behavior: 'smooth',
			} );
		},

		pauseCarousel() {
			const wrapper = getElement().ref.closest( '.rp-carousel' );
			if ( ! wrapper ) return;
			const id = wrapper.dataset.carouselId;
			if ( id && autoplayIntervals.has( id ) ) {
				clearInterval( autoplayIntervals.get( id ) );
				autoplayIntervals.delete( id );
			}
		},

		resumeCarousel() {
			const wrapper = getElement().ref.closest( '.rp-carousel' );
			if ( ! wrapper ) return;
			const id = wrapper.dataset.carouselId;
			if ( ! id ) return;
			if ( autoplayIntervals.has( id ) ) {
				clearInterval( autoplayIntervals.get( id ) );
			}
			autoplayIntervals.set(
				id,
				setInterval( () => {
					const el = document.querySelector(
						`[data-carousel-id="${ id }"]`
					);
					if ( ! el ) return;
					const container = el.querySelector(
						'.rp-carousel-track'
					);
					scrollNext( container );
				}, AUTO_SCROLL_DELAY )
			);
		},
	},

	callbacks: {
		initCarousel() {
			const prefersReduced = window.matchMedia(
				'(prefers-reduced-motion: reduce)'
			).matches;
			if ( prefersReduced ) return;

			document.querySelectorAll( '.rp-carousel' ).forEach( ( el ) => {
				const id = `rp-carousel-${ Math.random()
					.toString( 36 )
					.slice( 2, 9 ) }`;
				el.dataset.carouselId = id;
				autoplayIntervals.set(
					id,
					setInterval( () => {
						const container = el.querySelector(
							'.rp-carousel-track'
						);
						scrollNext( container );
					}, AUTO_SCROLL_DELAY )
				);
			} );
		},
	},
} );
