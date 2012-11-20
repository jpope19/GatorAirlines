<?
session_start();
include("../classes/users.class.php");

$user = new users();
$record = array();
if(isset($_SESSION['cid'])){
    if(isset($_POST['leave'])){

        // id's separated by spaces
        $departing_ids = $_POST['leave']; 
        $returning_ids = $_POST['return'];

    }
}else{
    
    // send them somewhere to log in    
    
}    ?>