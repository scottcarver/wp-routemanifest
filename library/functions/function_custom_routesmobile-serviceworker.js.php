<?php
// Return a JSON Header
header('Content-Type: application/javascript');

$homepage = New stdClass();
$promos = get_field('mobile_promos', 'option');
$wins = get_field('mobile_winners', 'option');
$homepage->carousels['promos'] = array();
$homepage->carousels['wins'] = array();

foreach($promos as $promo){
    $newpromo = (object)[
        'id' => $promo,
        'type' => get_post_type($promo),
    ];
    array_push($homepage->carousels['promos'], $newpromo);
}

foreach($wins as $win){
    $newwin = (object)[
        'id' => $win,
        'type' => get_post_type($win),
    ];
    array_push($homepage->carousels['wins'], $newwin);
}

echo(JSON_ENCODE($homepage));

?>