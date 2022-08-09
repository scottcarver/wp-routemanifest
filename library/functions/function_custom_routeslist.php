<?php
  /*  Mobile App Website Feeds Using the functionality provided by CustomRoutes, create:
  1) Index of app feeds /app/index.json
  2) Full Data feed for key posttypes /app/{posttype}-full.json
  2) Card Data feed for key posttypes /app/{posttype}-full.json
  */

  // Instantiate Route Object
  $manifest_routes = new CustomRoutes();

  // Create an Index route at /app.json
  // A raw feed of all scrapable content
  $manifest_routes->addRoute(
      "^app/index.json",
      function(){}, // nullify the callback
      plugin_dir_path(__FILE__) . 'function_custom_routesmobile-index.json.php',
  );

  // Create a Manifest route at /manifest.json
  // A special feed for PWAs
  $manifest_routes->addRoute(
      "^app/manifest.json",
      function(){}, // nullify the callback
      plugin_dir_path(__FILE__) . 'function_custom_routesmobile-manifest.json.php',
  );
    

    // Create a Manifest route at /lastmeal.json
  $manifest_routes->addRoute(
    "^app/lastmeal.json",
    function(){}, // nullify the callback
    plugin_dir_path(__FILE__) . 'function_custom_routesmobile-lastmeal.json.php',
);


  // Create a Redirects route at /app/redirects.json
  $manifest_routes->addRoute(
    "^app/redirects.json",
    function(){}, // nullify the callback
    plugin_dir_path(__FILE__) . '/function_custom_routesmobile-redirects.json.php',
  );

  // Create a Redirects route at /_redirects
  $manifest_routes->addRoute(
    "^_redirects",
    function(){}, // nullify the callback
    plugin_dir_path(__FILE__) . '/function_custom_routesmobile-redirects.php',
  );
  
   // Create a Redirects route at /_redirects
   $manifest_routes->addRoute(
    "^netlify.toml",
    function(){}, // nullify the callback
    plugin_dir_path(__FILE__) . '/function_custom_routeslist-netlifytoml.php',
  );

  // Service Worker
  $manifest_routes->addRoute(
    "^serviceworker.js",
    function(){}, // nullify the callback
    plugin_dir_path(__FILE__) . '/function_custom_routesmobile-serviceworker.js.php',
  );

  // Create Changelog route at /changes-since-unixtime.json ("now" is a magic number)
  // http://localhost/gutenberg-test/changes-since-1647911995.json
  $manifest_routes->addRoute(
    "^app/changes-since-([^/]*)/?.json",
    'api_callback_changelog',
    plugin_dir_path(__FILE__) .  '/function_custom_routesmobile-changelog.json.php',
    array('param1' => 1)
  );

  // Make URL Data Available to Template
  function api_callback_changelog($param1){
    set_query_var('starttime', $param1);
    // set_query_var('endtime', $param2);
    // echo(
    //   'start and end ' . $param1 . " " . $param2 
    // );
  }

  // Flush Routes (perhaps not needed)
  $manifest_routes->forceFlush();
  
?>
