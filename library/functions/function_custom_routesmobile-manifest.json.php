<?php
header('Content-Type: application/javascript');
/*echo('boop');  */
$manifest_object = (object) [
  "short_name" => "Point",
  "name" => get_bloginfo( 'name' ),
  "description" => get_bloginfo('description'),
  "start_url" => "/",
  "background_color" => "#FFFFFF",
  "display" => "standalone",
  "scope" => "/",
  "theme_color" => "#0000FF",
  "icons" => [
    (object)[
      "src" => "/dist/image/favicon/icons-192.png",
      "type" => "image/png",
      "sizes" => "192x192"
    ],
    (object)[
      "src" => "/dist/image/favicon/icons-512.png",
      "type" => "image/png",
      "sizes" => "512x512"
    ]
  ],
  "shortcuts" => [
    (object)[
      "name" => "How We're Funded",
      "short_name" => "Today",
      "description" => "View weather information for today",
      "url" => "/welcome/",
      "icons" => [(object)[ "src" => "/dist/image/favicon/icons-512.png", "sizes"=> "512x512"]]
    ],
    (object)[
      "name" => "There is no Shelbyville",
      "short_name" => "Tomorrow",
      "description" => "View weather information for tomorrow",
      "url" => "/tomorrow/",
      "icons" => [(object)[ "src" => "/dist/image/favicon/icons-512.png", "sizes" => "512x512" ]]
    ]
  ],
  "screenshots" => [
    (object)[
      "src" => "/dist/images/screenshot-superbockarena.jpg",
      "type" => "image/png",
      "sizes" => "720x399"
    ],
    (object)[
      "src" => "/dist/images/screenshot-downtownportland.jpg",
      "type" => "image/jpg",
      "sizes" => "720x399"
    ]
  ],
];

// Encode PHP object as JSON
echo json_encode($manifest_object);