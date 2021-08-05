<?php
// Create an Index of all App Feeds
$dataurls = array();
$dataurls['base'] = get_site_url();

/*
$dataurls['types'] = get_appsupportedtypes();
$dataurls['taxonomies'] = get_appsupportedtaxonomies();
$dataurls['page'] = array();
$dataurls['metadata'] = array();
$dataurls['card'] = array();
$dataurls['taxonomy'] = array();
$dataurls['attachments'] = '';


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