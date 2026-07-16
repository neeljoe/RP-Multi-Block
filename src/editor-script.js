/**
 * Block Editor Script Functionality
 *
 * The following scripts are compiled into a single asset and loaded into the block editor.
 *
 */

import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { useSelect, useDispatch } from '@wordpress/data';
import { ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';

function CarouselFeaturedPanel() {
	const meta = useSelect(
		( select ) => select( 'core/editor' ).getEditedPostAttribute( 'meta' ),
		[]
	);
	const { editPost } = useDispatch( 'core/editor' );

	return (
		<PluginDocumentSettingPanel
			name="rp-carousel-featured"
			title={ __( 'Category Carousel', 'advanced-multi-block' ) }
		>
			<ToggleControl
				label={ __(
					'Feature in category carousel',
					'advanced-multi-block'
				) }
				checked={ !! meta?._rp_carousel_featured }
				onChange={ ( val ) =>
					editPost( {
						meta: { _rp_carousel_featured: val },
					} )
				}
			/>
		</PluginDocumentSettingPanel>
	);
}

registerPlugin( 'rp-carousel-featured-panel', {
	render: CarouselFeaturedPanel,
	icon: 'carousel-view',
} );
