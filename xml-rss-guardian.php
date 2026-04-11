<?php
/**
 * Plugin Name: XML/RSS Guardian
 * Description: Safeguard your content by disabling XML/RSS feeds.
 * Version: 1.1.1
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: John Jezon Ajias
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: xml-rss-guardian
 * Domain Path: /languages
 *
 * @package XMLRSSGuardian
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XMLRSSGuardian' ) ) {
	/**
	 * Disable all site and comment feeds.
	 */
	final class XMLRSSGuardian {
		/**
		 * Boot hooks.
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'disable_feed_links' ) );
			add_action( 'template_redirect', array( $this, 'maybe_disable_feed_request' ), 1 );
		}

		/**
		 * Disable feed links in document head.
		 */
		public function disable_feed_links(): void {
			remove_action( 'wp_head', 'feed_links_extra', 3 );
			remove_action( 'wp_head', 'feed_links', 2 );
		}

		/**
		 * Block feed requests.
		 */
		public function maybe_disable_feed_request(): void {
			if ( ! is_feed() ) {
				return;
			}

			$message = (string) apply_filters(
				'xml_rss_guardian_disabled_message',
				esc_html__( 'RSS feed is disabled.', 'xml-rss-guardian' )
			);

			$title = (string) apply_filters(
				'xml_rss_guardian_disabled_title',
				esc_html__( 'Feed Disabled', 'xml-rss-guardian' )
			);

			$response_code = (int) apply_filters( 'xml_rss_guardian_response_code', 403 );
			if ( $response_code < 100 || $response_code > 599 ) {
				$response_code = 403;
			}

			wp_die(
				wp_kses_post( $message ),
				wp_kses_post( $title ),
				array( 'response' => $response_code )
			);
		}
	}

	new XMLRSSGuardian();
}
