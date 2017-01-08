<?php

/*
Plugin Name: Kino Translations
Plugin URI: 
Description: Custom translations for KinoGeneva
Version: 1.0.0
Author: Collectif WP
Author URI: http://collectifwp.ch/
*/

/*
 * LE NOUVEAU CODE QUI MARCHE :

 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'. 
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
 
function load_custom_plugin_translation_file( $mofile, $domain ) { 
	
	// folder location
	$folder = WP_PLUGIN_DIR . '/kinogeneva-translations/languages/';
	
	// filename ending
	$file = '-' . get_locale() . '.mo';
	
	$plugins = array(
		'buddypress',
		'bxcft',
		'wp-user-groups',
		'kleo_framework',
		'invite-anyone',
		'bp-groups-taxo',
		'bp-docs'
	);
	
	foreach ($plugins as &$plugin) {
	    
	    if ( $plugin === $domain ) {
	    
	    	    $mofile = $folder.$domain.$file;
	    
	    	}
	    
	}

  return $mofile;

}
add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );


// chargement du fichier de personnalisation des localisations
function load_custom_kinogeneva_translation_file() {
	$mofile = WP_PLUGIN_DIR . '/kinogeneva-translations/languages/kinogeneva-' . get_locale() . '.mo';
	load_textdomain( 'kinogeneva', $mofile );
}
 add_action( 'init', 'load_custom_kinogeneva_translation_file' );



/**
 * L'ANCIEN CODE QUI NE MARCHE PLUS depuis WP 4.6 ....
 */ 

// remove_action( 'bp_core_loaded', 'bp_core_load_buddypress_textdomain' );
// = completely disables the buddypress translation

// add_action( 'plugins_loaded', 'kino_load_textdomain', 1 ); // must be earlier than 10!

function kino_load_textdomain() {
						
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
