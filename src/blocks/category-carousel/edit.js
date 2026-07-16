import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
	const blockProps = useBlockProps();

	const mockCards = [
		{ name: 'Training', count: 10 },
		{ name: 'Nutrition', count: 10 },
		{ name: 'Injury Prevention', count: 9 },
		{ name: 'Running Form', count: 10 },
		{ name: 'Running Science', count: 10 },
		{ name: 'Gear', count: 10 },
	];

	return (
		<div { ...blockProps } className="rp-carousel rp-carousel-editor">
			<h3 className="rp-carousel-heading">Explore Topics</h3>
			<div className="rp-carousel-wrapper">
				<div className="rp-carousel-track">
					{ mockCards.map( ( card ) => (
						<div
							key={ card.name }
							className="rp-carousel-card"
						>
							<div className="rp-carousel-card-placeholder">
								<span>📷</span>
							</div>
							<div className="rp-carousel-card-content">
								<span className="rp-carousel-card-category">
									{ card.name }
								</span>
								<span className="rp-carousel-card-title">
									Latest post title goes here
								</span>
								<span className="rp-carousel-card-count">
									{ card.count } articles
								</span>
							</div>
						</div>
					) ) }
				</div>
			</div>
		</div>
	);
}
