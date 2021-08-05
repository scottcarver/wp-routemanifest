<?php
  /*  Mobile App Website Feeds Using the functionality provided by CustomRoutes, create:
  1) Index of app feeds /app/index.json
  2) Full Data feed for key posttypes /app/{posttype}-full.json
  2) Card Data feed for key posttypes /app/{posttype}-full.json
  */

  // Instantiate Route Object
  $manifest_routes = new CustomRoutes();

  // Create an route at /app/index.json/
  $manifest_routes->addRoute(
      "^app/index.json",
      function(){}, // nullify the callback
      plugin_dir_path(__FILE__) . 'function_custom_routesmobile-index.json.php',
  );


  /*
  // Create an route at /app/index.json/
  $manifest_routes->addRoute(
      "^app/manifest.json",
      function(){}, // nullify the callback
      get_template_directory() . '/library/functions/function_custom_routesmobile-manifest.json.php',
  );
    
  // Create Changelog
  $manifest_routes->addRoute(
    "^changelog/([^/]*)-([^/]*)/?.json",
    'api_callback_changelog',
    get_template_directory() . '/library/functions/function_custom_routesmobile-changelog.json.php',
    array('param1' => 1, 'param2' => 2,)
  );

  // Make URL Data Available to Template
  function api_callback_changelog($param1, $param2){
    set_query_var('starttime', $param1);
    set_query_var('endtime', $param2);
  }
  */

  // Flush Routes (perhaps not needed)
  $manifest_routes->forceFlush();
  
?>
