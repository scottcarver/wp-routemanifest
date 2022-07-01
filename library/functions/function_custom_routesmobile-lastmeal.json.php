<?php
header('Content-Type: application/javascript');
/*echo('boop');  */
$manifest_object = array(
  'LAST CHANGE UNIXTIME' . get_bloginfo( 'name' )
);

// Encode PHP object as JSON
echo json_encode($manifest_object);