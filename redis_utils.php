<?php
	
	include('constants.php'); 

	function connect_to_redis(){
		$redis = new Redis(); 
		$redis->connect(REDIS_SERVER, REDIS_PORT); 
		return $redis;
	}

	function close_redis_connection($redis){
		$redis->close();
	}

	function get_all_venue_details($redis, $venue_id){
		$details = $redis->hGetAll($venue_id);
		return $details;
	}

	function get_venue_detail($redis, $venue_id, $field_name){ 
		$detail = $redis->hGet($venue_id, $field_name);
		return $detail;
	}


?>