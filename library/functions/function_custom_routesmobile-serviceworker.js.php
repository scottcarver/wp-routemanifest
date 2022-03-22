<?php header('Content-Type: application/javascript');?>

// This should reflect the dist id, considering the cache is mostly about the support files
var cacheKey = 'lastupdate-iso45';


// Load Cache
self.addEventListener('install', (event) => {

    // Skip
    self.skipWaiting();
        
    event.waitUntil(
        caches.open(cacheKey).then((cache) => {
            return cache.addAll([
                'http://localhost/gutenberg-test/',
                'http://localhost/gutenberg-test/wp-content/themes/lamprey/dist/global/main.min.css',
                'http://localhost/gutenberg-test/wp-content/themes/lamprey/dist/global/editor.min.css',
            ]);
        })
    );
    }
);

// On Activation, Delete Old Caches
self.addEventListener('activate', (event) => {

    // Announce New Cache
    console.log(cacheKey + ' was activated');

    // Delete Old, and log it
  
    event.waitUntil(
      caches.keys().then((keyList) => {
        if(keyList.length == 0){
            console.log('No caches to delete');
            return;
        }
        return Promise.all(keyList.map((key) => {
          if (cacheKey.indexOf(key) === -1) {
            console.log('deleting old cache:' , key);
            return caches.delete(key);
          }
        }));
      })
    );


   
    checkontheCache();
   
});


// Load from Cache First, Fallback to the Network
self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then(function(response) {
        return response || fetch(event.request);
        })
    );
});

function checkontheCache(){
    alert('checkonthe cache!');
     // What's in the current cache?
     caches.open(cacheKey).then(function (cache) {
		cache.keys().then(function (keys) {
            console.log('keys after activation');
            console.log(keys);
		});
	});
}
