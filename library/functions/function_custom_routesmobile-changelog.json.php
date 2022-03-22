<?php
// Return a JSON Header
header('Content-Type: application/json');
// echo('boop');
// Get Params from URL
// $posttype = get_query_var('starttime');
// $feedtype = get_query_var('endtime');

$now = time();
$starttime = get_query_var('starttime');
$endtime = get_query_var('endtime');

$changelog = (object)[
    'time_now' => $now,
    'time_start' => intval($starttime), // can be either "then|latest" (start of time, or last sync)
    'time_end' => intval($endtime), // can be "now|1623214111" (a specific timestamp)
    'formatted_now'=> date("Y-m-d", $now),
    'formatted_starttime'=> date("Y-m-d", $starttime),
    // 'formatted_endtime'=> date("Y-m-d", $endtime),
    'permalinks' => array(),
    // 'everything' => array(),
];

$allowedTypes = array(
    'post',
    'page',
    'attachment',
);

// $beforedate = date( 'c' , $endtime );
// var_dump($beforedate);

// Get Surrogate Content from 'retailer'
$args = array(
    'post_type' => $allowedTypes,
    'posts_per_page' => -1,
    'date_query' => array(
        'column' => 'post_modified',
        array(
            'after' => date( 'c' , intval($starttime)),
            //'before' => date( 'c' , intval($endtime)),
            //'inclusive' => true,
        ),
    ),
);

$the_query = new WP_Query( $args );

/*
echo('<pre>');
var_dump($the_query);
echo('</pre>');
*/

// Output Surrogate Content
if ( $the_query->have_posts()) { 
    while ( $the_query->have_posts()){
        $the_query->the_post();
        array_push($changelog->permalinks, get_the_permalink());
       
        
        // $entry = (object)[
        //     'permalink' => get_the_permalink(),
        //     'payload' => inlinedcontent(get_the_permalink()),
        // ];

        // array_push($changelog->everything, $entry);
        
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