{
    "short_name": "<?php bloginfo( 'name' ); ?>",
    "name": "<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>",
    "icons": [
      {
        "src": "/images/icons-192.png",
        "type": "image/png",
        "sizes": "192x192"
      },
      {
        "src": "/images/icons-512.png",
        "type": "image/png",
        "sizes": "512x512"
      }
    ],
    "start_url": "/?source=pwa",
    "background_color": "#3367D6",
    "display": "standalone",
    "scope": "/",
    "theme_color": "#0000FF",
    "shortcuts": [
      {
        "name": "How's weather today?",
        "short_name": "Today",
        "description": "View weather information for today",
        "url": "/today?source=pwa",
        "icons": [{ "src": "/images/today.png", "sizes": "192x192" }]
      },
      {
        "name": "How's weather tomorrow?",
        "short_name": "Tomorrow",
        "description": "View weather information for tomorrow",
        "url": "/tomorrow?source=pwa",
        "icons": [{ "src": "/images/tomorrow.png", "sizes": "192x192" }]
      }
    ],
    "description": "Weather forecast information",
    "screenshots": [
      {
        "src": "/images/screenshot1.png",
        "type": "image/png",
        "sizes": "540x720"
      },
      {
        "src": "/images/screenshot2.jpg",
        "type": "image/jpg",
        "sizes": "540x720"
      }
    ]
  }