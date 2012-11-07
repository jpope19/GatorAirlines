<?php

include("classes/search.class.php");
include("classes/airport.class.php");
include("classes/users.class.php");
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

echo "<b>Departure Trips</b><br/>";

//output routes
$to_routes = $routes->depart_routes;
$a = Airport::get_name_by_id($_POST['org'], $user);
$b = Airport::get_name_by_id($_POST['dest'], $user);
echo "<font size=+2>Routes from $a to $b </font></br><br>";
$option_num = 1;
foreach($to_routes as $option) {

    echo "<b>Option " . $option_num  . " </b>";
	echo "<button class = button1>Click</button> <br/>";
    $val = $option->to_string();
    echo "$val";
    $option_num++;
	echo '<br/>';
}

if($_POST['flight'] == 'Round-Trip') {
    echo"<br/><br/><b>Return Trips</b><br/>";
    $to_routes = $routes->return_routes;
    $a = Airport::get_name_by_id($_POST['org'], $user);
    $b = Airport::get_name_by_id($_POST['dest'], $user);
    echo "<font size=+2>Routes from $b to $a </font></br><br>";
    $option_num = 1;
    foreach($to_routes as $option) {
        echo "<b>Option " . $option_num . "</b><br/>";
        $val = $option->to_string();
        echo "$val";
        $option_num++;
		echo '<br/>';
    }
}
?>