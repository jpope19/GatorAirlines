<?
session_start();
include("../classes/users.class.php");
include("../js/add_flight.js");

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

$users = new users();

$airports = $users->get_airports();
$planes = $users->get_planes();
?>

<form id="add_flight_form" action="#" method=POST>
    <table>
    <tr>
        <td> Plane </td>
        <td>
            <select name="plane_id">
                <? foreach($planes as $plane){ ?>
                    <option value="<?=$plane['plane_id']?>">
                        <?=$plane['type']?>
                    </option>
                <? } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> Origin </td>
        <td>
            <select name="org_id">
                <? foreach($airports as $airport){ ?>
                    <option value="<?=$airport['airport_id']?>">
                        <?=$airport['name']?>
                    </option>
                <? } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> Destination </td>
        <td>
            <select name="dest_id">
                <? foreach($airports as $airport){ ?>
                    <option value="<?=$airport['airport_id']?>">
                        <?=$airport['name']?>
                    </option>
                <? } ?>
            </select><br>
        </td>
    </tr>
    <tr> 
        <td> First Class Price </td>
        <td>
            $<input type=text name="first_class_cost">
        </td>
    </tr>
    <tr>
        <td> Coach Price </td>
        <td>
            $<input type=text name="coach_class_cost">
        </td>
    </tr>
    <tr>
        <td> Distance </td>
        <td>
            <input type=text maxlength=5 name="distance">
        </td>
    </tr>
    <tr> 
        <td></td>
        <td>
            <input type=submit>
        </td>
    </tr>
    </table>
</form>