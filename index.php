<?
session_start();
include("classes/users.class.php");
include("templates/header.php");
include("js/script.js");

$users = new users();

$airports = $users->get_airports();
$users->create_db();

?>


<form name="flight" id="flight">
    <select name="to_airport">
<?
    foreach($airports as $airport){
?>
        <option><?=$airport['iata']?> : <?=$airport['name']?> - <?=$airport['city']?>, <?=$airport['state']?></option>

<?        
    }                
?>

    </select>
    <select name="from_airport">
<?
    foreach($airports as $airport){
?>
        <option><?=$airport['iata']?> : <?=$airport['name']?> - <?=$airport['city']?>, <?=$airport['state']?></option>

<?        
    }                
?>
    </select>
</form>
