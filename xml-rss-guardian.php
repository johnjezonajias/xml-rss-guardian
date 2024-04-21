<?php
/**
 * Plugin Name: XML/RSS Guardian
 * Description: Safeguard your content by easily disabling XML/RSS feeds with XML/RSS Guardian.
 * Version: 1.0.1
 * Requires at least: 5.7
 * Requires PHP: 7.4
 * Author: John Jezon Ajias
 * Author URI: https://webdevjohnajias.one/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: xml-rss-guardian
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'XMLRSSGuardian' ) ) {
    class XMLRSSGuardian {
    
        public function __construct() {
            // Initialize plugin functionality
            $this->disable_feed();
        }
    
        public function disable_feed() {
            remove_action( 'wp_head', 'feed_links_extra', 3 );
            remove_action( 'wp_head', 'feed_links', 2 );
    
            add_action('do_feed', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_rdf', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_rss', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_rss2', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_atom', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_rss2_comments', array( $this, 'disable_feed_message' ), 1);
            add_action('do_feed_atom_comments', array( $this, 'disable_feed_message' ), 1);
        }
    
        public function disable_feed_message() {
            wp_die( 'RSS feed is disabled.', 'Feed Disabled', array( 'response' => 403 ) );
        }
    }
    
    // Instantiate the plugin class
    new XMLRSSGuardian();
}
