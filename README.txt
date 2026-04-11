=== XML/RSS Guardian ===
Contributors: johnjezonajias
Tags: xml, rss, feed, disable, security
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 6.8
Stable tag: 1.1.1
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Safeguard your content by disabling XML and RSS feeds across your WordPress site.

== Description ==

XML/RSS Guardian disables all public WordPress feed endpoints (post feeds and comment feeds) and removes feed links from your page head output.

This is useful for websites that want stricter control over content syndication or simply do not use RSS feeds.

Developers can customize the disabled message, title, and HTTP response code via filters:

* `xml_rss_guardian_disabled_message`
* `xml_rss_guardian_disabled_title`
* `xml_rss_guardian_response_code`

== Installation ==

1. Upload the `xml-rss-guardian` folder to `/wp-content/plugins/`, or install through the WordPress Plugins screen.
2. Activate the plugin through the "Plugins" screen in WordPress.
3. Feed URLs will now return a disabled response.

== Frequently Asked Questions ==

= How do I re-enable feeds? =

Deactivate XML/RSS Guardian and WordPress feed URLs will work again.

= Does this affect SEO? =

For most sites, this does not significantly affect search indexing because search engines primarily crawl HTML pages.

= Can I customize the feed disabled message? =

Yes. Developers can use the plugin filters to change the message, title, and response code.

== Changelog ==

= 1.1.1 =
* Replaced endpoint-specific feed hooks with a central `is_feed()` request blocker.
* Added filters so developers can customize disabled message, title, and response code.
* Removed outdated author website reference in plugin metadata.

= 1.1.0 =
* Updated plugin metadata for modern WordPress compatibility.
* Added stricter, WordPress-standardized hook usage and i18n-ready strings.
* Extended feed blocking coverage to include OPML feed endpoints.
* Refreshed readme content and release metadata.

= 1.0.1 =
* Initial public release.
