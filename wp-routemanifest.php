<?php

/**
 * @package wproutemanifest
 * @version 0.0.1
 */
/*
Plugin Name: WP Route Manifest
Plugin URI: https://wp-withagency.netlify.app/
Description: This plugin enables new routes to display on the site for offline/mobile/static purposes
Version: 0.0.1
Author URI: https://wp-withagency.netlify.app/
Text Domain: wproutemanifest
*/

// Routes Class
  // Support for adding Custom Routes
  // Check that the class exists before trying to use it
  if (!class_exists('CustomRoutes')) {
    require_once('library/functions/function_custom_routesclass.php');
  }

// Mobile Routes
require_once('library/functions/function_custom_routeslist.php');

// Settings Page
// Instead of using ACF, eventually use this settings page
// require_once('library/functions/function_custom_routesettings.php');
// require_once('library/functions/function_custom_routesettings-adminpanel.php');



add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

      /*
        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));
 */
        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('WP Manifest Settings'),
            'menu_title'  => __('Manifest'),
            'parent_slug' =>  'options-general.php' // $parent['menu_slug'],
        ));
    }
}


function acf_load_posttype_choices( $field ) {
    
  // reset choices
  $choices = get_post_types(
    array(
      "public" => true
    )
  );
 
  // loop through array and add to field 'choices'
  if( is_array($choices) ) {
      
      foreach( $choices as $choice ) {
          
          $field['choices'][ $choice ] = $choice;
          
      }
      
  }
  

  // return the field
  return $field;
  
}

add_filter('acf/load_field/name=allowedtypes', 'acf_load_posttype_choices');





