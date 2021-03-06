<?php
    header('Content-Type: text/plain');
    global $wpdb;
    // this adds the prefix which is set by the user upon instillation of wordpress
    $table_name = $wpdb->prefix."redirection_items";
    // this will get the data from your table
    $retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );
    // Format into an Object
    $base = get_site_url();
    $server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    $sitename = str_replace($server, "", $base);
    $return_object =  (object) [
        'base' => $base,
        'server' => $server,
        'sitename' => $sitename,
        'redirects' => array(),
    ];
    // Reformat redirects
    foreach ($retrieve_data as $retrieved_data){
        $match = $retrieved_data->match_url;
        $action = $retrieved_data->action_data;
        $shortmatch = str_replace($sitename.'/', "", $match);
        $shortaction = str_replace($sitename.'/', "", $action);
        $tofrom = [$shortmatch , $shortaction];
        array_push($return_object->redirects,  $tofrom);
    } 

    echo('# Netlify Redirects' . "\n");
    foreach ($return_object->redirects as $redirectpair){
        echo($redirectpair[0] . "    " . $redirectpair[1]) . "\n";
    }
 
?>