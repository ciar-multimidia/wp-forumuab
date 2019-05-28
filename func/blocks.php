<?php
// ========================================//
// HABILITANDO BLOCOS ESPECIFICOS
// ========================================//
add_filter( 'allowed_block_types', 'ciar_allowed_block_types' );
function ciar_allowed_block_types( $allowed_blocks ) {
 	// lista de blocos: https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
	return array(
		'core/spacer',
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/shortcode',
		'core/list',
		'core/cover',
		'core/media-text',
		'core/html',
		'core/table',
		// 'core/button',
		'core/gallery',
		'core/quote',
		'core/separator',
		'core/shortcode',
		'core/columns',
		// 'core-embed/twitter',
		'core-embed/youtube',
		'core-embed/facebook',
		'core-embed/instagram',
		// 'core-embed/spotify',
		// 'core-embed/vimeo',
		// 'core-embed/tumblr',
	);
}
