<?php
	require('constants.php');   
    require('4sq_functions.php');
    require('redis_utils.php');	

    $venue_id = $_REQUEST['venue_id'];
    $type = $_REQUEST['type'];
    
    $redis = connect_to_redis(); 
    if( $type == 'upvote') { 
    	upvote($redis, $venue_id);
    }
    elseif ( $type == 'downvote' ){
    	downvote($redis, $venue_id); 
    }

    close_redis_connection($redis);

?>