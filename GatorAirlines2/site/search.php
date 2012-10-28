<?php

include("classes/search.class.php");
include("classes/airport.class.php");
include("classes/users.class.php");
var_dump($_POST);
$user = new users();
//convert passed in day/month/year into epoch times

//we use substr since now we have mm/dd/yyyy in one string.
$_POST['e_depart_time'] = mktime(0,0,0,intval(substr($_POST['depart'],0,2)),intval(substr($_POST['depart'],3,5)),intval(substr($_POST['depart'],6,9)));
$_POST['e_return_time'] = mktime(0,0,0,intval(substr($_POST['return'],0,2)),intval(substr($_POST['return'],3,5)),intval(substr($_POST['return'],6,9) ));
//convert airport iata names to IDs
$_POST['org'] = Airport::get_id_by_name($_POST['org'], $user);
$_POST['dest'] = Airport::get_id_by_name($_POST['dest'], $user);

//find routes
$routes = new Search($_POST, $user);

//output routes
var_dump($routes->depart_routes);

var_dump($routes->return_routes);
?>