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

interface Registerable {
	public function register(): void;
}
