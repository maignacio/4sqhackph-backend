<?php
define('RADIUS', 1000);
require_once("FoursquareAPI.class.php");

function get_venues($long, $lat, $name="")
{
    $foursquare = new FoursquareAPI(CLIENT_ID, CLIENT_SECRET);
    // Prepare parameters
	$params = array("ll"=>"$long, $lat", "query"=>"$name", "radius"=>RADIUS);
	
	// Perform a request to a public resource
	$response = $foursquare->GetPublic("venues/search",$params);
	$array_response = json_decode($response, true);
    
    //$venues = $array_response->venues;
    //var_dump($array_response);
    
    $venues = $array_response['response']['venues'];
    return $venues;
}

function get_venue($id)
{
    $foursquare = new FoursquareAPI(CLIENT_ID, CLIENT_SECRET);
    $response = $foursquare->GetPublic("venues/" . urlencode($id));

    $arr_response = json_decode($response, true);
    $venues = $arr_response['response'];
    //var_dump($venues);
     
    //echo "<br><br>";
    foreach ($venues as $venue)
    {
        $name = $venue['name'];
        $long = $venue['location']['lng'];
        $lat = $venue['location']['lat'];
        //echo "$name <br> $long <br> $lat";

        return array("name"=>$name, "long"=>$long, "lat"=>$lat);
    }
    //var_dump($venues);
}
?>
