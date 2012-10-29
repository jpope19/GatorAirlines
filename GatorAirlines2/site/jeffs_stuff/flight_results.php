<?php

include("../classes/search.class.php");
include("../classes/airport.class.php");
include("../classes/users.class.php");
include("results.js");

$i = 0;
$cur;
$layovers;
$takeoff;
$landing;
$flying_distance;

$user = new users();
$airport = new airport();
//convert passed in day/month/year into epoch times

//we use substr since now we have mm/dd/yyyy in one string.
$_POST['e_depart_time'] = mktime(0,0,0,intval(substr($_POST['depart'],0,1)),intval(substr($_POST['depart'],3,4)),intval(substr($_POST['depart'],6,9)));
$_POST['e_return_time'] = mktime(0,0,0,intval(substr($_POST['return'],0,1)),intval(substr($_POST['return'],3,4)),intval(substr($_POST['return'],6,9)));

//convert airport iata names to IDs
$_POST['org'] = $airport->get_id_by_name($_POST['org'], $user);
$_POST['dest'] = $airport->get_id_by_name($_POST['dest'], $user);

//find routes
$routes = new Search($_POST, $user);

//output routes
//var_dump($routes->depart_routes);

//var_dump($routes->return_routes);

foreach($routes->depart_routes as $departure){
    $flying_distance = 0;
    echo "<b>departure " . $i . "</b><br>";
    //var_dump($departure);
    
    $layovers = sizeof($departure->flights);
    
    $takeoff = date('D M j, Y - g:ia', $departure->flights[0]['e_depart_time']);
    $landing = date('D M j, Y - g:ia', $departure->flights[$layovers - 1]['e_arrival_time']);
    
?>    
  
    Departs: <?=$takeoff?> <br>
    Arrives: <?=$landing?> <br>
    Layovers: <?=$layovers - 1?> <br>
    
    <div class="layovers_div" id="layover_div_<?=$i?>" style="display: none">
<?  foreach($departure->flights as $flight){  
        $flying_distance += $flight['distance'];?>        
    <br>    
    Org: <?=$airport->get_name_by_id($flight['org_id'], $user)?> <?=date('D M j, Y - g:ia', $flight['e_depart_time'])?> <br>
    Dest: <?=$airport->get_name_by_id($flight['dest_id'], $user)?> <?=date('D M j, Y - g:ia', $flight['e_arrival_time'])?> <br>
    Distance: <?=$flight['distance']?> <br><br>
        
<?  }   ?>

    </div>

    Total Distance: <?=$flying_distance?> <br>
    <a href="#" class="layovers_link" id="layover_link_<?=$i?>" ref="<?=$i?>">See Layovers</a><br><br>
   
<?  $i += 1; ?>

<?
} ?>