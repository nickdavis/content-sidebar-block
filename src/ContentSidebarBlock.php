<?php declare( strict_types=1 );

/**
 * Content Sidebar Block.
 *
 * @package   NickDavis\ContentSidebarBlock
 * @author    Nick Davis
 * @license   MIT
 * @link      https://nickdavis.net/
 * @copyright 2022 Nick Davis
 */

namespace NickDavis\ContentSidebarBlock;

use BrightNucleus\Views;
use NickDavis\ACFBlockHelper\Infrastructure\ACFBlock;
use NickDavis\ACFBlockHelper\Infrastructure\Blocks;

final class ContentSidebarBlock extends ACFBlock {

	protected function get_slug(): string {
		return Blocks::get_prefix() . '_content_sidebar';
	}

	protected function get_title(): string {
		return 'Content / Sidebar';
	}

	public function render( array $block ): void {
		$args = [ 'args' => $this->get_args(), 'block' => $block ];
		$path = '/blocks/' . str_replace( [ Blocks::get_prefix() . '_', '_' ], [ '', '-' ], $this->get_slug() );

		echo Views::render( $path, $args );
	}

	public function register_block(): void {
		acf_register_block_type( array(
			'title'           => $this->get_title(),
			'name'            => $this->get_slug(),
			'category'        => Blocks::get_category_slug(),
			'icon'            => Blocks::get_icon(),
			'render_callback' => [ $this, 'render' ],
			'enqueue_assets'  => [ $this, 'enqueue_assets' ],
			'mode'            => 'preview',
			'supports'        => [
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
				'mode'            => false, // Disable switch to 'edit' mode.
			]
		) );
	}

	public function register_fields(): void {
	}

	public function enqueue_assets(): void {
		$css_path    = 'css/content-sidebar-block.css';
		$css_uri     = ND_CONTENT_SIDEBAR_BLOCK_URL . $css_path;
		$css_version = filemtime( ND_CONTENT_SIDEBAR_BLOCK_DIR . $css_path );

		wp_enqueue_style( $this->get_slug(), $css_uri, [], $css_version );
	}

}
