<?php

session_start();
include("classes/users.class.php");

$users = new users();


$blah = $users->create_db();
$blah = $users->fill_database();

?>

<?=$blah?>