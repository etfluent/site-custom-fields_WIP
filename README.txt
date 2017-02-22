=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://etfluent.com
Tags: content, custom-content, custom-input, html, database
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin will create custom fields which can be used globally accross your site.

== Description ==

This plugin will create custom fields which can be used globally accross your site.


== Installation ==

1. Upload plugin directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Usage ==

1. Open template file which you want to display content of custom field
2. Insert <?php echo get_option('field_*num*_data'); ?> where you want the content, replacing *num* with the field number associated with the content to be displayed.
