<?
session_start();
include("../js/add_plane.js");
/*
            plane_id int auto_increment primary key,
            type varchar(40),
            chart_addr varchar(50),
            num_first_class int(3),
            num_coach_class int(3)  

*/
?>

<form class="add_plane_form" action="#" method=POST>
    <table>
        <tr>
            <td> Type </td>
            <td> <input type=text maxlength=50 style="width: 200px" name="type"> </td>
        </tr>
        <tr>
            <td> First Class Seats </td>
            <td> <input type=text maxlength=3 style="width: 80px" name="num_first_class"> </td>
        </tr>
        <tr>
            <td> Coach Class Seats </td>
            <td> <input type=text maxlength=3 style="width: 80px" name="num_coach_class"> </td>
        </tr>
        <tr>
            <td></td>
            <td><input type=submit></td>
        </tr>
</form>
    