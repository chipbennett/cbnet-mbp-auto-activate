=== cbnet MBP Auto-Activate ===
Contributors: chipbennett
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QP3N9HUSYJPK6
Tags: cbnet, maxblogpress, auto-activate, activation
Requires at least: 2.9
Tested up to: 3.5
Stable tag: 1.1.4

Automatically activate MaxBlogPress plugins, without registering and without subscribing to the MaxBlogPress email list.

== Description ==

MaxBlogPress plugins require a two-step registration/activation process, as well as a forced opt-in to an email-list subscription, in order to use them. This plugin circumvents those requirements, enabling unrestricted use of the plugins.

**Note:** this plugin *does not install any other plugins*. If you wish to use any MaxBlogPress plugins supported by cbnet MBP Auto-Activate, you must install them separately.

**Note 2:** This Plugin is not an endorsement for MaxBlogPress Plugins, but rather a proof-of-concept to demonstrate why it is futile to force users to jump through Plugin-registration and email-list-subscription hoops just to use Plugin functionality. It appears that some or all of MaxBlogPress Plugins are now released under a non-GPL-compatible license that restricts code modification. Use them at your own risk.

This plugin currently supports the following MaxBlogPress plugins:

* Different Posts Per Page
* DealDotCom Widget
* Unblockable Popup
* Ping Optimizer
* Stripe Ad
* Psychic Search
* Favicon
* SEO Post Link
* Banner Ads
* Duplicate Post Checker
* Multi Author Comment Notification
* Optin Form Adder

This plugin now also supports the following MaxBlogPress Revived plugins:

* Front Page By Category
* AdSense Deluxe Revived
* Flash Fader Revived
* Links Manage Widget
* Banner Ads
* Ajax Post Listing
* Random Image
* Access By Category
* Captcha For Comment
* Affiliate Image Tracker
* Image Organizer
* Easy Custom Fields
* Post Ordering
* Post Image
* Post List By Category
* Exerpt Listing


== Installation ==

Manual installation:

1. Upload the `cbnet-mbp-auto-activate` folder to the `/wp-content/plugins/` directory

Installation using "Add New Plugin"

1. From your Admin UI (Dashboard), use the menu to select Plugins -> Add New
2. Search for 'cbnet MBP Auto-Activate'
3. Click the 'Install' button to open the plugin's repository listing
4. Click the 'Install' button

Activiation and Use

1. Activate the plugin through the 'Plugins' menu in WordPress
2. From your Admin UI (Dashboard), use the menu to select Options -> cbnet MBP Auto-Activate
3. The plugin requires no configuration. Auto-activation of MBP plugins takes place automatically.

== Frequently Asked Questions ==

= Does cbnet MBP Auto-Activate Download/Install the MaxBlogPress Plugins? =

No. This plugin only sets the appropriate database options to circumvent the registration/email subscription functionality of MaxBlogPress plugins.

if you want to use any of the supported MaxBlogPress plugins, you must install them separately.

= I have one or more MaxBlogPress plugins installed already. How do I auto-activate them? =

Simply activate cbnet MBP Auto-Activate. All MaxBlogPress plugins will be automatically activated.

If you need/want to verify:

* From your Admin UI (Dashboard), use the menu to select Options -> cbnet MaxBlogPress Auto-Activate
* Verify that your plugin has been activated.

= I installed a MaxBlogPress plugin after installing MBP Auto-Activate. How do I auto-activate it? =

You don't need to do anything! If cbnet MBP Auto-Activate is installed/activated, all MaxBlogPress plugins will be automatically activated.

If you need/want to verify:

* From your Admin UI (Dashboard), use the menu to select Options -> cbnet MaxBlogPress Auto-Activate
* Verify that your plugin has been activated.

== Screenshots ==

Screenshots coming soon.

== Changelog ==

= 1.1.4 =
* Bugfix release
* Cleaned up a few PHP notices
* Restored status page CSS
* Cleaned up for WordPress 3.5
= 1.1.3 =
* Bugfix release. 
* Fixed bug that prevented proper activation of Max Banner Ads plugin.
= 1.1.2 =
* Readme.txt update. 
* Updated Donate Link in readme.txt.
= 1.1.1 =
* Bugfix release. 
* Fixed bug that prevented proper building of MBP plugins array.
= 1.1 =
* Feature-update.
* Added support for 16 additional MaxBlogPress plugins.
= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.1.4 =
Bugfix release. Cleaned up for WordPress 3.5, cleaned up PHP notices, restored status page CSS
= 1.1.3 =
Bugfix release. Fixed bug that prevented proper activation of Max Banner Ads plugin.
= 1.1.2 =
Readme.txt update. Updated Donate Link in readme.txt.
= 1.1.1 =
Bugfix release. Fixed bug that prevented proper building of MBP plugins array.
= 1.1 =
Feature-update release. Added support for 16 additional MaxBlogPress plugins.
= 1.0 =
Initial Release.