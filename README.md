# XML/RSS Guardian

[![License](https://img.shields.io/badge/license-GPL%20v2%20or%20later-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

**XML/RSS Guardian** is a lightweight WordPress plugin that disables XML/RSS feeds and removes feed links from your site's `<head>` output.

## What it does

- Disables feed requests for posts and comments.
- Returns a blocked HTTP response for feed requests (default: `403`).
- Removes feed discovery links from `wp_head`.
- Provides filters for developers to customize message/title/response code.

## Developer filters

- `xml_rss_guardian_disabled_message`
- `xml_rss_guardian_disabled_title`
- `xml_rss_guardian_response_code`

## Installation

1. Download the plugin ZIP file.
2. Log in to your WordPress admin dashboard.
3. Navigate to **Plugins → Add New → Upload Plugin**.
4. Upload the ZIP and activate **XML/RSS Guardian**.

## Compatibility

- Requires WordPress **6.0+**
- Requires PHP **7.4+**

## License

GPL v2 or later. See [LICENSE](LICENSE) for details.
