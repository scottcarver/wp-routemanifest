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
require_once('library/functions/function_custom_routesettings.php');
