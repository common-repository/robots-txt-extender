=== Robots.txt Extender ===
Contributors: bettoadami
Tags: robotstxt, robots.txt, robots, crawler, spiders, virtual, search, google, seo, plugin, network, wpmu, multisite
Requires at least: 5.0
Tested up to: 5.0
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Dynamic robots.txt for Multisite! Change parameters, or don't, for each site of your network without losing the defaults from WordPress Includes.

== Description ==
A Multisite Network plugin that removes the automatic sitemap link (deprecated practice) and adds custom parameters/lines at the end of the default Robots.txt whenever called. It will enable small adjustments for each site on the network - like pointing again to specific sitemaps if needed - without sacrificing the default conventions coded to WordPress' core. To make the adjustments, look for a text area at the end of General Settings Page.

== Installation ==
1. Upload the folder *robotstxtextender* to the */wp-content/plugins/* directory.
2. Network Enable the plugin.
3. Now you have a new text area on the Global Settings page.
4. Maybe you will have to edit the *.htaccess* file for this plugin to work. Just add the line *RewriteRule robots\.txt$ index.php?robots=1* to it.

== Frequently Asked Questions ==
= I am getting a 404 message, or maybe the custom values are not being delivered. =
Add the line *RewriteRule robots\.txt$ index.php?robots=1* to the *.htaccess* file.

== Changelog ==
= 1.0.0 =
* Initial release.