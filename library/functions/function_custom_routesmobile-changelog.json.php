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
    'base' => get_site_url(),
    'time_now' => $now,
    'time_now_formatted'=> date("Y-m-d h:i:s", $now),
    'time_start' => intval($starttime), // can be either "then|latest" (start of time, or last sync)
    // 'time_end' => intval($endtime), // can be "now|1623214111" (a specific timestamp)
    'time_start_formatted'=> date("Y-m-d h:i:s", $starttime),
    // 'formatted_endtime'=> date("Y-m-d", $endtime),
 
    'urls' => array(),
    // 'permalinks'=> array(),
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
        $cleanlink = get_the_permalink();
        $base = get_site_url();
        $shortmatch = str_replace($base, "", $cleanlink);
       //  var_dump($the_query);
    //    echo(get_the_permalink() . "\n");
        array_push($changelog->urls, $shortmatch);
       
        
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