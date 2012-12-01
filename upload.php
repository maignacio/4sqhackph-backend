<?php
    require('constants.php');   
    require('4sq_functions.php');
    require('redis_utils.php');

    $venue_id = $_REQUEST['venue_id'];

    $venue_details['body'] = $_REQUEST['body'];
    $venue_details['start_time'] = $_REQUEST['start_time'];
    $venue_details['end_time'] = $_REQUEST['end_time'];
    $venue_details['username'] = $_REQUEST['username'];
    
    $additional_venue_details = get_venue($venue_id); 

    $venue_details['name'] = $additional_venue_details['name'];
    $venue_details['long'] = $additional_venue_details['long'];
    $venue_details['lat'] = $additional_venue_details['lat'];

    $redis = connect_to_redis();

    set_venue_details($redis, $venue_id, $venue_details);
?>
