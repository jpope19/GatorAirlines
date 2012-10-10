<?php
include("../classes/search.class.php");
include("../classes/airport.class.php");
include("../classes/users.class.php");
var_dump($_POST);
$user = new users();
//convert passed in day/month/year into epoch times
$_POST['e_depart_time'] = mktime(0,0,0,$_POST['depart_month'],$_POST['depart_day'],$_POST['depart_year']);
$_POST['e_return_time'] = mktime(0,0,0,$_POST['return_month'],$_POST['return_day'],$_POST['return_year']);
//convert airport iata names to IDs
$_POST['org'] = Airport::get_id_by_name($_POST['org'], $user);
$_POST['dest'] = Airport::get_id_by_name($_POST['dest'], $user);

//find routes
$routes = new Search($_POST, $user);

//output routes
var_dump($routes->depart_routes);

var_dump($routes->return_routes);
?>