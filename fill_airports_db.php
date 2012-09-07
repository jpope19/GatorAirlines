<?
session_start();
include("classes/users.class.php");

$users = new users();

$blah = $users->fill_database();

?>

<?=$blah?>