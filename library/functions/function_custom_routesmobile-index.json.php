<?php
// Turn this on when Editing
$isDebug = false;
// Create an Index of all App Feeds
$dataurls = array(
    'base' => get_site_url()
);
// $dataurls['base'] = get_site_url();
$dataurls['types'] = array(
    'post', 
    'page'
);
$dataurls['slugs'] = array('post-url', 'page-url');
$dataurls['app'] = array(
    '/app/index.json',
    '/app/manifest.json', 
    '/_redirects',
    '/serviceworker.js',
);
$dataurls['urls'] = array();
$dataurls['last'] = 'last'; //get_option('last_synch');


// Query Args
$args = array(
    'post_type' => $dataurls['types'],
    'posts_per_page' => -1
);
// Do Query
$query = new WP_Query( $args );

// echo('<pre>');
// var_dump($query->posts);
// echo('</pre>');

// Insert both full and card data
foreach($query->posts as $post){
    $id = $post->ID;
    $cleanpath = str_replace($dataurls['base'], '', get_permalink($id));
    // $fullpath = $urlbase . 'metadata/'. $type.'.json';
    // $cardpath = $urlbase . 'card/' .$type.'.json';
    array_push($dataurls['urls'], $cleanpath);
   //  array_push($dataurls['metadata'], $fullpath);
}

// Merge the app routes
$dataurls['urls'] = array_merge($dataurls['urls'], $dataurls['app']);
// $dataurls['urls'] = $dataurls['app'];



if(!$isDebug){
    unset($dataurls['last'], $dataurls['app'], $dataurls['types'], $dataurls['slugs']);
}



/*
$dataurls['taxonomies'] = get_appsupportedtaxonomies();
$dataurls['page'] = array();
$dataurls['metadata'] = array();


// Url Base for this site
$urlbase = 'app/';
$changelogbase = '/changelog/';

// All Cards
array_push($dataurls['card'], $urlbase . 'card/all.json');

// Insert both full and card data
foreach($dataurls['types'] as $type){
    $fullpath = $urlbase . 'metadata/'. $type.'.json';
    $cardpath = $urlbase . 'card/' .$type.'.json';
    array_push($dataurls['card'], $cardpath);
    array_push($dataurls['metadata'], $fullpath);
}

// Insert both full and card data
foreach($dataurls['taxonomies'] as $taxonomy){
    $taxonomypath = $urlbase . 'taxonomy/' . $taxonomy.'.json';
    array_push($dataurls['taxonomy'], $taxonomypath);
}

$homepath = $urlbase . 'page/home.json';
$swpath = $urlbase . 'service-worker.js';
$changelogpath = $changelogbase . 'then-now.json';


// Attachments url
$dataurls['attachments'] = $urlbase . 'attachments.json';

array_push($dataurls['page'], $homepath); // $swpath, , $changelogpath , $cardpath
*/
// Return a JSON Header
header('Content-Type: application/json');
// Return JSON for /app/index.json
echo json_encode($dataurls);