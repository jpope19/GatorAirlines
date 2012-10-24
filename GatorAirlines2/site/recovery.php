<?php

include("mail/sendMail.php"); //include mailing function (in mail folder).

if(isset($_POST['submit'])){

$to = $_POST['email']; //where to send email.

$query = "select password from customers where email = '".$_POST['email']."'"; //get the password for that email.

		$result = mysql_query($query,$con);	
		
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		
	$password = null;
	$safe = 0;  //to check if we at least have one tuple in the query.
	
	while($row = mysql_fetch_assoc($result) )
	     {
		 
		   $password = $row['password'];
		    $safe++;
		 
		 }

   
    if($safe>0){
	
	mail_attachment(null,$to, null, 'Account Recovery', $message);
	
	}
}



?>

      <form action="recovery.php" method = "post">
	  
	  <a href= ""></a>
	  
	  
	  </form>