<?php
//this might take a while to run
session_start();
include("classes/users.class.php");

$time = microtime(true);
$users = new users();

$blah = $users->clear_db();
$blah = $users->create_db();
$blah = $users->fill_database();
$time = microtime(true)- $time;

echo "total time to run is: $time seconds";
echo '</br>';
?>

<?=$blah?>
