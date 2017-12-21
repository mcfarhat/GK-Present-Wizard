=== Plugin Name ===

Plugin Name: GK Present Wizard
Contributors: mcfarhat
Donate link:
Tags: wordpress, woocommerce, wizard, presents, gifts
Requires at least: 4.3
Tested up to: 4.9
Stable tag: trunk
License: GPLv2 or later
Version: 1.1.0
License URI: https://www.gnu.org/licenses/gpl-2.0.html

=== Short Summary ===

The GK Present Wizard is a wordpress plugin that allows running a game wizard on one or more screens of your wordpress + woocommerce installation, whereby user choices and information will be used to find and suggest relevant and fun gifts.

== Description ==

The plugin allows you to turn one or more of your wordpress installation's front end pages into an interface with the present wizard. This is accomplished via utilizing the newly available template "Game Template" as the source template for your page of choice.

Upon accessing the relevant page from the front end, the user will initially need to connect his facebook account. This functionality is essentially handled utilizing the <a href="https://wordpress.org/plugins/facebookall/">Facebookall</a> plugin. Once the Facebook connection is properly initiated, the user will become logged in, and will be presented with a set of category to chose from.

The next flow for the user, who is now logged it, would be chosing the category. The user's choice along with data received from the facebook account will be considered to go through the list of available gifts, which are built based on the existing woocommerce products setup into the system, and then a suitable gift will be presented to the visitor. A relevant image of the user's profile pic along with the gift will be dynamically generated, and made ready to be shared onto facebook and/or other social media.

Each product to be properly included into the selection will need to contain at least 2 pieces of meta data: gender and age, which would allow characterization of the products accordingly. We also added support for country detection so as if available, the country will determine whether the gift is available for the user.

Alternatively, if the user does not like the gift, he can always click the search again button, in which case he will be presented with an alternative option or a gift.

If you would like some custom work done, or have an idea for a plugin you're ready to fund, check our site at www.greateck.com or contact us at info@greateck.com

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/GK-Present-Wizard` directory, or install the plugin through the WordPress plugins screen directly.
2. Make sure you have both woocommerce and facebookall plugins installed and active.
3. Activate the plugin through the 'Plugins' screen in WordPress
4. Customize your woocommerce products by adding meta_data relevant to the 'gender' and 'age', as this data will be utilize in generating the end result.
5. That's it! Your front end screen will turn into the relevant interface.
6. You can then customize the look and feel of your screen as you please via simple CSS customizations

== Changelog ==

= 1.1.0 =
* Critical changes to the plugin including refactoring of the code *
* Introducing new template class to be used for selected pages *
* Maintaining the main wordpress + woocommerce installation as a fully functional one*
* Custom formatting and styling added to the plugin for better UX *
* Adding a referral system for referring user detection *
* Facebook meta tags support added for better sharing support of gifts and generated images on facebook *
* Adding country detection support for the gift, if applicable *

= 1.0.0 =
* Initial Version of the plugin *
