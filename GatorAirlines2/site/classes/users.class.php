<?php
include_once("db.class.php");
include_once("display.class.php");
$output = new display;

class users extends db {
    
    var $user_id;
    
    function __construct($u_id = 1){
        parent::__construct();
        $this->user_id = $u_id;
    }
    
    function fill_database(){
		// Fill with cities
        $file = fopen("data/cities.txt", 'r');

        while(!feof($file)){
            $line = utf8_encode(trim(fgets($file)));
            echo $line . "<br>";
            $info = explode(" ." , $line);
            $record['name'] = trim($info[0]);
            $record['city'] = trim($info[1]);
            $record['state'] = trim($info[2]);
            $record['iata'] = trim($info[3]);
            $this->db->AutoExecute("airports", $record, "INSERT");
        }
        
        fclose($file);
		
		// Fill with customers
        $file = fopen("data/customers.txt", 'r');
        set_time_limit(6000);
        while(!feof($file)){
            $line = utf8_encode(trim(fgets($file)));
            $info = explode("," , $line);
            $record2['email'] = trim($info[0]);
            $record2['first_name'] = trim($info[1]);
            $record2['last_name'] = trim($info[2]);
            $record2['password'] = trim($info[3]);
			$record2['addr'] = trim($info[4]);
            $record2['city'] = trim($info[5]);
            $record2['state'] = trim($info[6]);
            $record2['zip'] = trim($info[7]);
			$record2['cc_num'] = trim($info[8]);
            $record2['u_type'] = 0;
            $this->add_customers($record2);
        }
        echo "Created some flights";
        
        
        fclose($file);
        
        $file = fopen("data/flights.txt", 'r');

        while(!feof($file)){
            $line = utf8_encode(trim(fgets($file)));
            $info = explode(" " , $line);
            $record3['plane_id'] = trim($info[0]);
            $record3['org_id'] = trim($info[1]);
            $record3['dest_id'] = trim($info[2]);
            $record3['first_class_cost'] = 150;
            $record3['coach_class_cost'] = 89;
            $record3['e_depart_time'] = time() + (rand(0,14)*(60*60*24));               // add beteen 0 and 2 weeks from todays date
            $record3['e_arrival_time'] = $record3['e_depart_time'] + (rand(45,300)*60); // add between 45-300 minutes to depart time
            $this->db->AutoExecute("flights", $record3, "INSERT");
        }
        
        fclose($file);
        
        return "finished";
    }
    
	//------------------------------------------------ Add functions ------------------------------------------------
    function add_customers($record){
		$db_conflicts = $this->db_conflicts_customers($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$record['salt'] = $this->generateSalt();
			$record['password'] = $this->generateHash($record['password'], $record['salt']);
			$this->db->AutoExecute("customers", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add customers function
	
	function add_airports($record){
		$db_conflicts = $this->db_conflicts_airports($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$this->db->AutoExecute("airports", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add airport function
	
	function add_airplane($record){
		$db_conflicts = $this->db_conflicts_airplanes($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$this->db->AutoExecute("airplanes", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add airplane function
    
    function add_flight($record){
		$db_conflicts = $this->db_conflicts_flights($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$this->db->AutoExecute("flights", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add flight function
	
	function add_tickets($record){
		$db_conflicts = $this->db_conflicts_tickets($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$this->db->AutoExecute("tickets", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add ticket function
	
	function add_vip($record){
		$db_conflicts = $this->db_conflicts_vip($record); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$this->db->AutoExecute("vip", $record, "INSERT");
			$insert = true;
		}
		else
		{
			$insert = false;
		}
		return $insert;
    }// end add vip function
	
	//------------------------------------------------ Get Functions ------------------------------------------------
	function get_user($email, $password){
		$cid = $this->get_cid($email);
		$salt = $this->get_salt($cid[0]['cid']);
		$password = $this->generateHash($password, $salt[0]['salt']); // hash the password to compare it to the "real" hashed password
		$where = "email = \"" . $email . "\" AND password = \"" . $password . "\"";
        $sql = "SELECT * from customers WHERE $where";
        return $this->db->GetArray($sql);
    }
	
	function get_user2($email){
		$where = "email ='$email'";
        $sql = "SELECT * FROM customers WHERE $where";
        return $this->db->GetArray($sql);
    }
	
	//get reservations for a particular user fron Tickets and Flights table
	function get_reservation($cid){	  
		$where = "T.flight_id = F.flight_id and cid =$cid";
		$sql = "select * FROM tickets as T,flights as F WHERE $where";
        return $this->db->GetArray($sql);
	}
	
    function get_customers($order = ""){
		if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM customers $order";
        return $this->db->GetArray($sql);
    }
	
    function get_airports($order = ""){
		if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM airports $order";
        return $this->db->GetArray($sql);
    }
    
    function get_planes($order = ""){
		if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM airplanes $order";
        return $this->db->GetArray($sql);
    }
	
	function get_specific_flight($f_id)
	{
		$sql = "SELECT * FROM flights WHERE flight_id = $f_id";
		return $this->db->GetArray($sql);
	}
	
	
	
	//Function used in flight_times.php
	function get_flight_info() {
		$sql = "SELECT * FROM flights";
		return $this->db->GetArray($sql);
	}
	
	//Function used in flight_times.php to get airport information
	function get_airport_info($dest_id) {
		$sql = "SELECT * 
				FROM airports
				WHERE airport_id = $dest_id";
		return $this->db->GetArray($sql);
	}
	
	//Function used in flight_times.php to get flight info for a certain id
	function get_flight_by_id($orgid, $destid) {
		$sql = "SELECT *
				FROM flights
				WHERE org_id = $orgid AND dest_id = $destid";
		return $this->db->GetArray($sql);
	}
	
	function get_price($flight_id){
		$sql = "SELECT coach_class_cost FROM flights WHERE flight_id = $flight_id";
		return $this->db->GetArray($sql);
	}
	function get_flights($date = "", $order = ""){
        $next_day = $date + 48*60*60;
        if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM flights $order";
        if($date != "") $sql = "{$sql} WHERE e_depart_time BETWEEN {$date} AND {$next_day}";
        return $this->db->GetArray($sql);
    }
	
	function get_tickets($order = ""){
		if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM tickets $order";
        return $this->db->GetArray($sql);
    }
	
	function get_vip($order = ""){
		if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT * FROM vip $order";
        return $this->db->GetArray($sql);
    }
	
	function get_emails_from_flight($flight_id, $order = ""){
        $sql = "SELECT email, SUM(ticket_id)
			FROM customers, tickets
			WHERE flight_id = $flight_id AND tickets.cid = customers.cid
            GROUP BY ticket_id";
			// Group by so that only one email is returned for each flight, even if a customer
			// has multiple tickets
        return $this->db->GetArray($sql);
    }
	
	function get_cid($email)
	{
		$sql = "SELECT cid 
			FROM customers
			WHERE email = '$email'";
		return $this->db->GetArray($sql);
	}
	
		function get_flights_id($date = "", $order = ""){
        $next_day = $date + 48*60*60;
        if ($order != "") $order = "ORDER BY $order ASC";
        $sql = "SELECT flight_id FROM flights $order";
        if($date != "") $sql = "{$sql} WHERE e_depart_time BETWEEN {$date} AND {$next_day}";
        return $this->db->GetArray($sql);
    }
	
	//Returns all of the seat numbers that have been booked for a particular flight.
	function get_seat($flight_id){
		$sql = "SELECT seat_id FROM tickets WHERE $flight_id = flight_id";
		return $this->db->GetArray($sql);
	}
	

	//Not Complete
	function get_ticket_number($ticket_id){
		$sql = "SELECT";
		return $this->db->getArray($sql);
	}
	
	function get_flight_from_ticket($ticket_id){
		$sql = "SELECT flight_id, MIN(cid) 
			FROM tickets 
			WHERE ticket_id = $ticket_id
			GROUP BY cid";
		return $this->db->GetArray($sql);
	}
	
	function get_salt($cid)
	{
		$sql = "SELECT salt 
			FROM customers
			WHERE cid = $cid";
		return $this->db->GetArray($sql);
	}
	
	//------------------------------------------------ Modify functions ------------------------------------------------
	function modify_customers($set, $key){
		$db_conflicts = $this->db_conflicts_customers($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			if (isset($set['password']))
			{// need to hash
				$salt = $this->get_salt($key);
				$set['password'] = $this->generateHash($set['password'], $salt[0]['salt']);
			}
			$key = "cid = $key";
			$this->db->AutoExecute("customers", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify;   
    }// end modify customers
	
	function modify_airports($set, $key){
		$db_conflicts = $this->db_conflicts_airports($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$key = "airport_id = $key";
			$this->db->AutoExecute("airports", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify;  
    }// end modify airports
	
	function modify_airplanes($set, $key){
		$db_conflicts = $this->db_conflicts_airplanes($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$key = "plane_id = $key";
			$this->db->AutoExecute("airplanes", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify; 
    }// end modify airplanes
    
	function modify_flights($set, $key){
		$db_conflicts = $this->db_conflicts_flights($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$key = "flight_id = $key";
			$this->db->AutoExecute("flights", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify; 
    }// end modify flights
	
	function modify_tickets($set, $key){
		$db_conflicts = $this->db_conflicts_tickets($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$key = "ticket_id = $key";
			$this->db->AutoExecute("tickets", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify; 
    }// end modify tickets
	
	function modify_vip($set, $key){
		$db_conflicts = $this->db_conflicts_vip($set, $key); // check for conflicts with the DB
		
		if ($db_conflicts == false)
		{
			$key = "vip_id = $key";
			$this->db->AutoExecute("vip", $set, "UPDATE", $key);
			$modify = true;
		}
		else
		{
			$modify = false;
		}
		return $modify; 
    }// end modify vip
	
	//------------------------------------------------ Delete functions ------------------------------------------------
	function delete_customers($obj){
		$sql = "DELETE FROM customers WHERE cid=$obj";
		$this->db->Execute($sql);
    }
	
	function delete_airports($obj){
		$sql = "DELETE FROM airports WHERE airport_id=$obj";
		$this->db->Execute($sql);
    }
	
	function delete_airplanes($obj){
		$sql = "DELETE FROM airplanes WHERE plane_id=$obj";
		$this->db->Execute($sql);
    }
	
	function delete_flights($obj){
		$sql = "DELETE FROM flights WHERE flight_id=$obj";
		$this->db->Execute($sql);
    }
	
	function delete_tickets($obj){
		$sql = "DELETE FROM tickets WHERE ticket_id=$obj";
		$this->db->Execute($sql);
    }
	
	function delete_vip($obj){
		$sql = "DELETE FROM vip WHERE vip_id=$obj";
		$this->db->Execute($sql);
    }
	
	//--------------------------------- Check to see if a key is in it's database ------------------------------------------------
	function cid_exists($key){
		$sql = "SELECT COUNT(cid)
			FROM customers
			WHERE cid = '$key'
			GROUP BY cid";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function email_exists($key){
		$sql = "SELECT COUNT(email)
			FROM customers
			WHERE email = '$key'
			GROUP BY email";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function airport_id_exists($key){
		$sql = "SELECT COUNT(airport_id)
			FROM airports
			WHERE airport_id = $key
			GROUP BY airport_id";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function plane_id_exists($key){
		$sql = "SELECT COUNT(plane_id)
			FROM airplanes
			WHERE plane_id = $key
			GROUP BY plane_id";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function type_exists($key){
		$sql = "SELECT COUNT(type)
			FROM airplanes
			WHERE type = '$key'
			GROUP BY type";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function iata_exists($key){
		$sql = "SELECT COUNT(iata)
			FROM airports
			WHERE iata = '$key'
			GROUP BY iata";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function flight_id_exists($key){
		$sql = "SELECT COUNT(flight_id)
			FROM flights
			WHERE flight_id = $key
			GROUP BY flight_id";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function ticket_id_exists($key){
		$sql = "SELECT COUNT(ticket_id)
			FROM tickets
			WHERE ticket_id = $key
			GROUP BY ticket_id";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function seat_id_exists($key, $flight){
		$sql = "SELECT COUNT(ticket_id)
			FROM tickets
			WHERE seat_id = $key AND flight_id = $flight
			GROUP BY ticket_id";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function vip_id_exists($key){
		$sql = "SELECT COUNT(vip_id)
			FROM VIP
			WHERE vip_id = $key
			GROUP BY vip_id";
		$this->db->GetArray($sql);
		if (isset($this[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	function cid_exists_in_vip($key){
		$sql = "SELECT COUNT(cid)
			FROM vip
			WHERE cid = '$key'
			GROUP BY cid";
		$count = $this->db->GetArray($sql);
		if (isset($count[0]))
		{
			$response = true;
		}
		else
		{
			$response = false;
		}
		return $response;
	}
	
	//------------------------------------------------ Check for DB conflicts ------------------------------------------------
	function db_conflicts_customers($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		// Check for conflicts with DB
		if (isset($record['email']) && $this->email_exists($record['email']) == true)
		{// This is an insert and so, if the email exists, reject it.
			$message .= 'The email entered already exists. Please choose a different email.\n';
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts customers
	
	function db_conflicts_airports($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		// Check for conflicts with DB
		if (isset($record['iata']) && $this->iata_exists($record['iata']) == true)
		{// There is an existing iata, do not insert
			$message .= 'The IATA entered already exists. Please choose a different IATA.\n';
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts airports
	
	function db_conflicts_airplanes($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		// Check for conflicts with DB
		/*
		if (isset($record['type']) && $this->type_exists($record['type']) == true)
		{// There is an existing type, do not insert
			$message .= 'The airplane type entered already exists. Please choose a different airplane type.\n';
			$error = true;
		}
		I'm not sure if multiple planes should be allowed to have the same type. The code is here if necessarry*/
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts airplanes
	
	function db_conflicts_flights($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		$count = 1;
		// Check for conflicts with DB
		if (isset($record['plane_id']) && $this->plane_id_exists($record['plane_id']) == false)
		{// The plane does not exist, so it cannot be referenced
			$message .= $count . '. The provided plane ID does not exist. Please enter an existing plane ID.\n';
			$count++;
			$error = true;
		}
		if (isset($record['org_id']) && $this->airport_id_exists($record['org_id']) == false)
		{// The airport does not exist, so it cannot be referenced
			$message .= $count . '. The provided origin ID does not exist. Please enter an existing airport ID.\n';
			$count++;
			$error = true;
		}
		if (isset($record['dest_id']) && $this->airport_id_exists($record['dest_id']) == false)
		{// The airport does not exist, so it cannot be referenced
			$message .= $count . '. The provided destination ID does not exist. Please enter an existing airport ID.\n';
			$count++;
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts flights
	
	function db_conflicts_tickets($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		$count = 1;
		// Check for conflicts with DB
		
		if (isset($record['cid']) && $this->cid_exists($record['cid']) == false)
		{// The customer does not exist, so it cannot be referenced
			$message .= $count . '. The provided customer ID does not exist. Please enter an existing customer ID.\n';
			$count++;
			$error = true;
		}
		if (isset($record['flight_id']) && $this->flight_id_exists($record['flight_id']) == false)
		{// The flight does not exist, so it cannot be referenced
			$message .= $count . '. The provided flight ID does not exist. Please enter an existing flight ID.\n';
			$count++;
			$error = true;
		}
		else if (isset($record['flight_id']) && isset($record['seat_id']) && $this->seat_id_exists($record['seat_id'], $record['flight_id']) == true)
		{// The seat referenced already exist in the table with the same flight id, so it will cause a conflict.
			// Note that this is an else if because if the flight id is not valid, then it's not worth checking the seat id
			$message .= $count . '. The provided seat ID is already taken. Please choose a different seat ID.\n';
			$count++;
			$error = true;
		}
		else if (isset($record['seat_id']) && !isset($record['flight_id']))
		{// This will only happen during a modify. Still need to check if seat is taken.
			$array = $this->get_flight_from_ticket($key);
			if (isset($array) && $this->seat_id_exists($record['seat_id'], $array[0]['flight_id']) == true )
			{// This would mean there is a conflict
				$message .= $count . '. The provided seat ID is already taken. Please choose a different seat ID.\n';
				$count++;
				$error = true;
			}
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts tickets
	
	function db_conflicts_vip($record, $key = "")
	{
		$error = false;
		$message = 'There were errors with your input:\n';
		$count = 1;
		// Check for conflicts with DB
		if (isset($record['cid']) && $this->cid_exists($record['cid']) == false)
		{// The cid does not exist, so it cannot be referenced 
			$message .= $count . '. The customer ID does not exist. Please choose and existing customer ID.\n';
			$count++;
			$error = true;
		}
		if (isset($record['cid']) && $this->cid_exists_in_vip($record['cid']) == true)
		{// The cid does not exist, so it cannot be referenced 
			$message .= $count . '.The customer is already a VIP. Please choose a non-VIP customer.\n';
			$count++;
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}
		return $error;
	}// end db conflicts vip
	
	//------------------------------------------------ Password Hashing ------------------------------------------------
	function generateSalt($saltLength = 16) 
	{// Generate salt (default 16 character length) from the provided character list
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?_-/"; // Characters for the salt
        $index = 0;
        $salt = "";
        while ($index < $saltLength) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $index++;
        }
        return $salt;
	}// end generateSalt
	
	function generateHash($password, $salt = "") 
	{// Generate hash provided the salt and plain text password
        if ($salt == "")
		{// Salt needs to be generated
			$salt = $this->generateSalt();
		}// end if
		
		$password .= $salt;
		$hash = hash('sha256', $password);
		
        return $hash;
	}// end generateHash
	
	//------------------------------------------------ Create the database ------------------------------------------------
	function drop_db($table)
	{
		$sql = "DROP TABLE if exists $table";
		$this->db->Execute($sql);
	}
	
    function create_db(){
		$tables = array();
		$tables[] = "customers";
		$tables[] = "airports";
		$tables[] = "airplanes";
		$tables[] = "flights";
		$tables[] = "tickets";
		$tables[] = "vip";
		
		foreach($tables as $table){
			$this->drop_db($table);
		}
		
        $sql = "CREATE table if not exists customers (
            cid int auto_increment primary key,
            email varchar(100) not null,
            first_name varchar(100),
            last_name varchar(100),
            password varchar(256),
            addr varchar(100),
			city varchar(100),
			state varchar(30),
			zip int(5),
            cc_num varchar(16),
            u_type int(2),
			salt varchar(16)
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists airports (
            airport_id int auto_increment primary key,
            city varchar(200),
            state varchar(2),
            iata varchar(3),
            name varchar(200)  
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists airplanes (
            plane_id int auto_increment primary key,
            type varchar(40),
            chart_addr varchar(50),
            num_first_class int(3),
            num_coach_class int(3)  
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists flights (
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
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists tickets (
            ticket_id int auto_increment primary key,
            cid int,
            flight_id int,
            seat_id int,
            price int(4)  
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists vip (
            vip_id int auto_increment primary key,
            cid int,
            travel_distance int,
            points_left int  
        )";
        $this->db->Execute($sql);
    }
    
    function clear_db() {
    	$tables = array( 'vip', 'tickets', 'flights', 'airplanes', 'airports', 'customers');
        foreach ($tables as $table) {
            $this->clear_table($table);
        }
    	
    	
    }
    
    function clear_table($table) {
    	$sql = "DROP TABLE IF EXISTS `$table`";
    	$this->db->Execute($sql);
    }
    
    /******UPDATE CUSTOMER'S INFO.************/
	function cust_update($first_name,$last_name,$email,$password,$addr,$state,$zip,$cc_num) {
	        $cid = $this->get_cid($_SESSION['email']);
		    $salt = $this->get_salt($cid[0]['cid']);
            $cid=$cid[0]['cid'];		
			$password = $this->generateHash($password,$salt[0]['salt']); //generate hash.
			
    $this->db->Replace('customers',array('cid'=>$cid,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,
		             'password'=>$password,'addr'=>$addr, 'state'=>$state,'zip'=>$zip,'cc_num'=>$cc_num),'cid',$autoquote = true);
    }
    
	
	
	
	
}

?>

