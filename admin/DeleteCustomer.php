<!-- Produce the Delete Customer form -->
<?php

/*
CREATE table if not exists customers 
(
	cid int auto_increment primary key,
	email varchar(30) not null,
	first_name varchar(30),
	last_name varchar(30),
	password varchar(30),
	addr varchar(30),
	city varchar(30),
	state varchar(30),
	zip int(5),
	cc_num int(16),
	u_type int(2)     
*/

$users = new users();

$airports = $users->get_airports();
$planes = $users->get_planes();
?>

<select data-placeholder="Choose a Country" class="chosen" multiple style="width:350px;" tabindex="4">
		   
</select>

<form action="../admin/DeleteCustomertoDB.php" method="post">
	<select data-placeholder="Choose a Country" class="chosen" multiple style="width:350px;" tabindex="4">
			   
	</select>
<input type="submit" />
</form>