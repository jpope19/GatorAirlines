<?
session_start();
include("../classes/users.class.php");

$users = new users();

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

$record = array();

$record['plane_id'] = intval($_POST['plane_id']);
$record['org_id'] = intval($_POST['org_id']);
$record['dest_id'] = intval($_POST['dest_id']);
$record['first_class_cost'] = intval($_POST['first_class_cost']);
$record['coach_class_cost'] = intval($_POST['coach_class_cost']);
$record['distance'] = intval($_POST['distance']);

$users->add_flight($record);

?>

flight added