<?php
	function connect_to_redis(){
		$redis = new Redis(); 
		$redis->connect(REDIS_SERVER, REDIS_PORT); 
		return $redis;
	}

	function close_redis_connection($redis){
		$redis->close();
	}

	function get_all_venue_details($redis, $venue_id){
		$key = 'app:'.$venue_id;
		$details = $redis->hGetAll($key);
		//$json_details = json_encode($details);
		return $details;
	}

	function get_venue_detail($redis, $venue_id, $field_name){ 
		$key = 'app:'.$venue_id;
		$detail[$field_name] = $redis->hGet($key, $field_name);
		$json_detail = json_encode($detail);
		return $json_detail;
	}

	function set_venue_details($redis, $venue_id, $details){ 
		# $details is an associative array
		# $result is bool
		$key = 'app:'.$venue_id;
		$result = $redis->hMSet($key, $details);
		return $result; 
	}
?>