<?
    if (!isset($_SESSION))
{
	session_start();
    
	}
	
	include('classes/users.class.php');
	if (isset($_GET['id']))
	{
     $users = new users();
$users->delete_tickets($_GET['id']);
//$reservations= $result;
header("Location:myaccount.php");

	
	}
	
	
	




?>