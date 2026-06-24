import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<div style={ { padding: '24px', border: '1px dashed rgba(0,0,0,0.15)', borderRadius: '4px' } }>
				<div style={ { display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '12px 0', borderBottom: '1px solid #eee' } }>
					<span style={ { fontWeight: 600 } }>About</span>
					<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="#999" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
				</div>
				<div style={ { display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '12px 0', borderBottom: '1px solid #eee' } }>
					<span style={ { fontWeight: 600 } }>Our Experiences</span>
					<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="#999" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
				</div>
				<div style={ { display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '12px 0', borderBottom: '1px solid #eee' } }>
					<span style={ { fontWeight: 600 } }>Our Impact</span>
					<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="#999" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
				</div>
				<div style={ { display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '12px 0' } }>
					<span style={ { fontWeight: 600 } }>Sites</span>
					<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="#999" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
				</div>
			</div>
		</div>
	);
}
