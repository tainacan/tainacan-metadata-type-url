=== Tainacan URL Metadata Type ===
Author: tainacan
Contributors: wetah, vnmedeiros, leogermani, tainacan
Tags: museums, libraries, archives, collections, repository, tainacan, url, embed
Requires at least: 5.9
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 0.2.0
Requires Plugins: tainacan
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

<DEPRECATION WARNING>
This plugin is not required anymore if you are using Tainacan 0.21.0, as the URL metadata type has become an official metadata type inside the plugin. If you have already updated to version 0.21.0 of Tainacan, all your metadata are already migrated to the new type and you can safely disable this plugin.
An extra metadata type plugin for Tainacan, which allows creating metadata that displays an embed URL, such as YouTube, Instagram or Flickr.
 
== Description ==
 
[Tainacan](https://tainacan.org/) is an open-source, powerful and flexible digital repository platform for WordPress. 

This plugin expands the [Tainacan plugin](https://wordpress.org/plugins/tainacan/) functionality by adding support to an extra metadata type, useful for displaying URL links as an embed content, either via [WordPress auto embed](https://wordpress.org/support/article/embeds/#okay-so-what-sites-can-i-embed-from) feature or by forcing the usage of an iframe. It is a solution for those interested on having more than one Document of type URL or expecting the attachments list to accept URL as well.

== Installation ==
 
Upload the files to the plugins directory and activate it. You can also install and activate directly from the admin panel.
 
This plugin will only work with [Tainacan plugin](https://wordpress.org/plugins/tainacan/) active, with a version greater than 0.16;


== Find out more ==
 
* Visit our official website: [https://tainacan.org/](https://tainacan.org/)
* Check our documentation Wiki: [https://wiki.tainacan.org/](https://wiki.tainacan.org/)
* Source code on GitHub: [https://github.com/tainacan/tainacan-metadata-type-url](https://github.com/tainacan/tainacan-metadata-type-url)

== Changelog ==

= 0.2.0 =
* Trim URL before checking as valid
* Adds wp-element-button class to buttons
* Adds Tainacan update and deprecation warning

= 0.1.1 =
* Adds responsive wrapper from Tainacan plugin

= 0.0.9 =
* Improves style of multivalue separator and links as buttons

= 0.0.8 =
* Allows setting custom placeholder

= 0.0.7 =
* Fixes link markdown issue on single-valued metadata

= 0.0.6 =
* Allows markdown links to display labels like this: [label](url)
* Adds option to display link with a button style
* Validates url input on the server side instead of frontend

= 0.0.5 =
* Bug fixes on the preview update

= 0.0.4 =
* Disables preview when metadata is inside of item submission block

= 0.0.3 =
* Better namespacing and fixes multivalued previews

= 0.0.2 =
* First release of the Tainacan URL Metadata Type

== Screenshots ==
 
1. Create the metadata on your collection and set its options;
2. Create a new item on the collection, and add URL metadata values to it;
3. If the link does not auto embeds, you can force to display inside an iframe;
4. Visualize the  metadata published on your theme;
