=== Sela ===

Contributors: automattic
Tags: light, pink, white, two-columns, right-sidebar, responsive-layout, custom-background, custom-header, custom-menu, featured-images,  full-width-template, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready

Requires at least: 4.0
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Sela is not your typical business theme. Vibrant, bold, and clean, with lots of space for large images, it's a great canvas to tell your comapny's story.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= How to setup the front page like the demo site? =

The demo site URL: http://selademo.wordpress.com/?demo

When you first activate Sela, your homepage will display posts in a traditional blog format. If you’d like to use the Front Page Template instead, follow these steps:

1. Create or edit a page, and then assign it the Front Page Template from the Page Attributes module.
2. Go to Settings > Reading and set "Front page displays" to "A static page".
3. Select the page you just assigned the Front Page template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.

The Front Page Template is divided into three sections:

* A featured area with a full-width featured image and an overlay containing the page content.
* Three front-page widget areas, displayed side-by-side in columns.
* The Testimonial area, displaying two testimonials. To add a testimonial, go to Testimonials > Add New in your dashboard. You can change the order in which your testimonials are displayed by using the Order field of the Attributes module on the testimonial edit screen.

= How do I add a site logo? =
Sela supports Jetpack's Site Logo feature (http://jetpack.me/support/site-logo/). To add your own image, go to Customize > Site Title. The logo will appear in the header, above the Site Title.

= I don't see the Testimonials menu in my admin, where can I find it? =

To make the Testimonials menu appear in your admin, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [custom post types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) work for the Sela theme.

Once Jetpack is active, the Testimonials menu will appear in your admin, in addition to standard blog posts. No special Jetpack module is needed and a WordPress.com connection is not required for the Testimonials feature to function. Testimonials will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

= Where is the page that lists all testimonials? =

All testimonials are displayed in a testimonial archive page.

Let's say you have a WordPress site at: http://mygroovydomain.com

The URL of the testimonial archive page will be: http://mygroovydomain.com/testimonial/

You'll need pretty permalinks (any structure) for this URL to work though. If you're stuck with default permalinks - your links have a query string at the end, like ?p=123 - then your testimonial archive can be accessed by adding this immediately after your URL:

`/?post_type=jetpack-testimonial`

= How to customize the testimonial archive page? =

Once you have published a testimonial, under the Testimonials menu in your admin, you will see a link that takes you to the Customizer where you can edit the page title, add an intro text and a featured image. Just make sure you have pretty permalinks (any structure) for this to work.

= Grid Page =

The Grid Page template is designed to show child pages in a grid format. To get started, first create or edit a page, and assign it to the Grid Page template from the Page Attributes box. The content of this page and featured image – if one is set – will be displayed above the grid.

To add items to the grid, create additional pages and set their parent page in the Page Attributes box to the grid page you just created
Be sure to set a featured image for each child page if you want an image to show up inside the grid. Repeat these steps for every item you want to display in the grid.

= How to add the social links? =

With Sela, you have the option to display links to your social media profiles in the footer, just above the website credits. Icons for Twitter, Facebook, LinkedIn and most other popular networks are included, and Sela will automatically display an icon for each service if it's available.

- Set up the menu -

To automatically apply icons to your links, simply create a new Custom Menu from Appearance > Menus. You can name it however you like. Next, add each of your social links to this menu. Each menu item should be added as a custom link.

Once your menu is created and your social links are added, assign it to the Social Menu location under Menu Settings.

- Available icons -

Linking to any of the following sites will automatically display its icon in your menu:

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Foursquare
* Flickr
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (urls with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitter
* Vimeo
* WordPress
* YouTube

== Quick Specs (all measurements in pixels) ==

	1. The main column width is 620 except in the full-width layout where it’s 778.
	2. A widget in the sidebar is 250.
	3. A widget in the Footer Widget Area or Front Page Widget Area is 320.
	4. The featured image on the front page and on pages works best with images at least 1180 wide.
	5. Featured Images for posts should be at least 820 wide by 312.

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Screenshot image by Unsplash (http://pixabay.com/en/notebook-workplace-desk-iphone-336634/), licensed under CC0 Public Domain (http://creativecommons.org/publicdomain/zero/1.0/deed.en)

== Changelog ==

= 1.0.5 - June 15 2015 =
* Scroll overflowed content of front-page template.
* Implement Infinite Scroll for testimonials.
* Fix PHP error in template-tags file.

= 1.0.4 - Apr 30 2015 =
* Added styling for Jetpack's testimonials shortcode

= 1.0.3 - Apr 08 2015 =
* Fixed language filenames

= 1.0.1 - Feb 18 2015 =
* Fixed mixed text domains.
* Switched to admin_enqueue_scripts to enqueue custom fonts on header customization screen.

= 1.0 - Jan 13 2015 =
* Initial release.
