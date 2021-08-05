<?php
// Return a JSON Header
header('Content-Type: application/json');

// Get Params from URL
// $posttype = get_query_var('starttime');
// $feedtype = get_query_var('endtime');
$now = time();

$changelog = (object)[
    'timenow' => $now,
    'starttime' => get_query_var('starttime'), // can be either "then|latest" (start of time, or last sync)
    'endtime' => get_query_var('endtime'), // can be "now|1623214111" (a specific timestamp)
    'formatted'=> date("Y-m-d", $now),
    'permalinks' => array(),
    // 'everything' => array(),
];

$allowedTypes = array(
    // 'post',
    'page',
    'attachment',
    'alert',
    'event',
    'jackpot',
    'lottery-connection',
    // 'meeting',
    'press',
    'program',
    'promotion',
    'retailer',
    'scratch-it',
    // 'second-chance',
    // 'spotlight',
    'video-lottery',
    'winner',
);

// Get Surrogate Content from 'retailer'
$args = array(
    'post_type' => $allowedTypes,
    'posts_per_page' => -1,
);

$the_query = new WP_Query( $args );

// Output Surrogate Content
if ( $the_query->have_posts()) { 
    while ( $the_query->have_posts()){
        $the_query->the_post();
        array_push($changelog->permalinks, get_the_permalink());
       
        /*
        $entry = (object)[
            'permalink' => get_the_permalink(),
            'payload' => inlinedcontent(get_the_permalink()),
        ];

        array_push($changelog->everything, $entry);
        */
    } 
}
// Restore original Post Data
wp_reset_postdata();
 
function inlinedcontent($original){
    $payload = file_get_contents($original);
    return $payload;
}


echo(JSON_ENCODE($changelog));
 
?>