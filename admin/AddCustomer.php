<!-- Produce the Add Customer form -->
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
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
Email: <input type="text" name="email" /> </br>
First Name: <input type="text" name="first_name" /> </br>
Last Name: <input type="text" name="last_name" /> </br>
Password: <input type="password" name="password" /> </br>
Billing Address: <input type="text" name="addr" /> </br>
City: <input type="text" name="city" /> </br>
State: <input type="text" name="state" /> </br>
Zip Code: <input type="text" name="zip" /> </br>
Credit Card Number: <input type="text" name="cc_num" /> </br>
<input type="submit" />
</form>