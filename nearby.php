<?php
   require('constants.php');
   require('4sq_functions.php');
   
   $long = $_REQUEST['long'];
   $lat = $_REQUEST['lat'];
   $name = $_REQUEST['name'];
    
   if (!isset($name))
   {
      $name = "";
   }

   $return_array = array();

   $venues = get_venues($long, $lat, $name);

   foreach ($venues as $venue)
   {
       //$details = get_venue($venue['location']);
       $return_array[] = array($venue['id'] ,$venue['name'] ,$venue['location']['lng'], $venue['location']['lat']);
   }

   echo json_encode($return_array);
?>
