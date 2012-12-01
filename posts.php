<?php
    require('constants.php');   
    require('4sq_functions.php');
    require('redis_utils.php');

    $long = $_REQUEST['long'];
    $lat = $_REQUEST['lat'];
    $name = $_REQUEST['name']; 

    $redis = connect_to_redis();

    $venues = get_venues($long, $lat, $name);

    $return_array = array();
    foreach ($venues as $venue)
    {
        $id = $venue['id'];
        //echo "$id <br>";
        $venue_details = get_all_venue_details($redis, $id);

        if (0 != sizeof($venue_details))
        {
            $venue_details['user_pic'] = get_user_pic($redis, $venue_details['user']);
            $return_array[] = $venue_details;
	    }
    }
    
    //var_dump($return_array);
    echo json_encode($return_array);
    close_redis_connection($redis);
?>
