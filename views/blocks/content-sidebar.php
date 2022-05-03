<?php
/**
 * Content Sidebar Block Template.
 *
 * This is a placeholder view - primarily for the admin. This file should be
 * copied to your custom theme, with markup and styles added there.
 *
 * @url https://www.advancedcustomfields.com/resources/acf_register_block_type/#examples
 *
 * @var   array $block The block settings and attributes.
 * @var   string $content The block inner HTML (empty).
 * @var   bool $is_preview True during AJAX preview.
 * @var   (int|string) $post_id The post ID this block is saved to.
 */

$block_id = 'block-content-sidebar-' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

$className = 'block-content-sidebar';

if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$template = array(
	array(
		'core/heading',
		array(
			'level'   => 2,
			'content' => 'Example Heading',
		)
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Example content.',
		)
	)
);

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className ); ?>">
    <div class="wrap">
        <div class="block-content-sidebar__content">
            <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>"/>
        </div>
        <div class="block-content-sidebar__sidebar">
            <?php if ( is_admin() ) : ?>
                Sidebar
            <?php endif; ?>
        </div>
    </div>
</div>
