<?php
session_start();
include("../classes/users.class.php");


/* flights db table
           
            flight_id int auto_increment primary key,
            plane_id int,
            org_id int,
            dest_id int,
            first_class_cost int(4),
            coach_class_cost int(4),
            e_depart_time varchar(30),
            e_arrival_time varchar(30),
            depart_time varchar(30),
            arrival_time varchar(30),
            distance int(5)

*/

$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
/*
$users = new users();
$result = $users->get_user("admin@admin.com","rootuser");
foreach($result as $out)
{
	echo $out['u_type'];
}// end loop

echo $result[0]['u_type'];
*/

?>