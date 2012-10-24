<?php
//this might take a while to run
session_start();
include("classes/users.class.php");

$users = new users();

$blah = $users->clear_db();
$blah = $users->create_db();
$blah = $users->fill_database();

?>

<?=$blah?>
