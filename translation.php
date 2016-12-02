<?php

/*
Plugin Name: Kino Translations
Plugin URI: 
Description: Custom translations for KinoGeneva
Version: 1.0.0
Author: Collectif WP
Author URI: http://collectifwp.ch/
*/

/* Custom translation strings
 */

/*
 * New technique
 */

add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );

/*

 * LE NOUVEAU CODE QUI MARCHE :

 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'. 
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
 
function load_custom_plugin_translation_file( $mofile, $domain ) { 

	if ( 'buddypress' === $domain ) {
	  
	    $mofile = WP_PLUGIN_DIR . '/kinogeneva-translations/languages/buddypress-' . get_locale() . '.mo';
	    
	} else if ('bxcft' === $domain) {
	
			$mofile = WP_PLUGIN_DIR . '/kinogeneva-translations/languages/bxcft-' . get_locale() . '.mo';
			
	}

  return $mofile;

}



/**
 * L'ANCIEN CODE QUI NE MARCHE PLUS depuis WP 4.6 ....
 */ 

// remove_action( 'bp_core_loaded', 'bp_core_load_buddypress_textdomain' );
// = completely disables the buddypress translation

// add_action( 'plugins_loaded', 'kino_load_textdomain', 1 ); // must be earlier than 10!

function kino_load_textdomain() {
			
//			load_plugin_textdomain( 
//				'buddypress',
//				false, 
//				'kinogeneva-translations/languages/' // relative to WP_PLUGIN_DIR
//			);
			
			load_plugin_textdomain( 
				'wp-user-groups',
				false, 
				'kinogeneva-translations/languages/'
			);
			
			// BP group announcements
			load_plugin_textdomain( 
				'bpga',
				false, 
				'kinogeneva-translations/languages/'
			);
			
			// BP group calendar
			load_plugin_textdomain( 
				'groupcalendar',
				false, 
				'kinogeneva-translations/languages/'
			);
			
			// BuddyPress Group Email Subscription
			load_plugin_textdomain( 
				'bp-ass',
				false, 
				'kinogeneva-translations/languages/'
			);
			
			// BuddyPress Group Taxo
			load_plugin_textdomain( 
				'bp-groups-taxo',
				false, 
				'kinogeneva-translations/languages/'
			);
			
			// ( 'Announcements', 'bpga' );
			// __('Calendar', 'groupcalendar');
}


/*
* End of file
*/