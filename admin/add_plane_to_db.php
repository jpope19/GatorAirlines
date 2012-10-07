<?
session_start();
include("../classes/users.class.php");

$users = new users();

if(isset($_POST['type']) && $_POST['type'] != "" && isset($_POST['num_first_class']) && $_POST['num_first_class'] != "" && isset($_POST['num_coach_class']) && $_POST['num_coach_class'] != ""){
    
    $record['type'] = $_POST['type'];
    $record['num_first_class'] = intval($_POST['num_first_class']);
    $record['num_coach_class'] = intval($_POST['num_coach_class']);
    
    $users->add_airplane($record);
    
    echo "airplane successfully added";
    
}else{
    echo "invalid entry";
}



?>