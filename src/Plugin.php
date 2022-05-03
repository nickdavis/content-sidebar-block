<?php declare( strict_types=1 );

/**
 * Content Sidebar Block.
 *
 * @package   NickDavis\ContentSidebarBlock
 * @author    Nick Davis
 * @license   MIT
 * @link      https://nickdavis.net
 * @copyright 2022 Nick Davis
 */

namespace NickDavis\ContentSidebarBlock;

use BrightNucleus\Views;
use BrightNucleus\View\Location\FilesystemLocation;

final class Plugin {
	public function run(): void {
		foreach ( $this->services as $class ) {
			/** @var Registerable $service */
			$service = new $class;
			$service->register();
		}

		$this->register_views();
	}

	public function register_views(): void {
		$folders = [
			get_stylesheet_directory() . '/partials',
			get_template_directory() . '/partials',
			ND_CONTENT_SIDEBAR_BLOCK_DIR . 'views',
		];

		foreach ( $folders as $folder ) {
			Views::addLocation( new FilesystemLocation( $folder ) );
		}
	}

	protected array $services = [
		// Infrastructure
		ContentSidebarBlock::class,
	];
}
