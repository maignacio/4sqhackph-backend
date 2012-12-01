<?php
	$redis = new Redis(); 
	$redis->connect('127.0.0.1', 6379);
	$redis->set('key1', 'value');
	$value = $redis->get('key1');
	echo($value);
	$redis->sAdd('set', 'value1', 'value2' );
	$members = $redis->sMembers('set');
	echo "<br /> $members[0]";
?>