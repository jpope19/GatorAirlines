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
            $this->db->AutoExecute("customers", $record2, "INSERT");
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
            $record3['first_class_cost'] = trim($info[3]);
            $record3['coach_class_cost'] = trim($info[4]);
            $record3['e_depart_time'] = trim($info[5]);
            $record3['e_arrival_time'] = trim($info[6]);
            $record3['depart_time'] = trim($info[5]);
            $record3['arrival_time'] = trim($info[6]);
            $record3['distance'] = trim($info[7]);
            $this->db->AutoExecute("flights", $record3, "INSERT");
        }
        
        fclose($file);
        
        return "finished";
    }
    
	// Add functions
    function add_customers($record){
		$error = false;
		$message = "There were errors with your input:";
		// Check for conflicts with DB
		if (email_exists($record['email']) == true)
		{// There is an existing key, do not insert
			$message = "The email entered already exists. Please choose a different email.\n";
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("customers", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
	
	function add_airports($record){
		$error = false;
		$message = "There were errors with your input:";
		// Check for conflicts with DB
		if (iata_exists($record['email']) == true)
		{// There is an existing iata, do not insert
			$message = "The IATA entered already exists. Please choose a different IATA.\n";
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("airports", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
	
	function add_airplane($record){
		$error = false;
		$message = "There were errors with your input:";
		// Check for conflicts with DB
		if (type_exists($record['type']) == true)
		{// There is an existing type, do not insert
			$message = "The airplane type entered already exists. Please choose a different airplane type.\n";
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("airplanes", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
    
    function add_flight($record){
		$error = false;
		$message = "There were errors with your input: ";
		$count = 1;
		// Check for conflicts with DB
		if (plane_exists($record['plane_id']) == false)
		{// The plane does not exist, so it cannot be referenced
			$message = "'$count'. The provided plane ID does not exist. Please enter an existing plane ID.\n";
			$count++;
			$error = true;
		}
		if (flight_id_exists($record['org_id']) == false)
		{// The airport does not exist, so it cannot be referenced
			$message = "'$count'. The provided origin ID does not exist. Please enter an existing airport ID.\n";
			$count++;
			$error = true;
		}
		if (seat_id_exists($record['seat_id'], $record['flight_id']))
		{// The airport does not exist, so it cannot be referenced
			$message = "'$count'. The provided destination ID does not exist. Please enter an existing airport ID.\n";
			$count++;
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("flights", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
	
	function add_tickets($record){
		$error = false;
		$message = "There were errors with your input: ";
		$count = 1;
		// Check for conflicts with DB
		
		if (cid_exists($record['cid']) == false)
		{// The customer does not exist, so it cannot be referenced
			$message = "'$count'. The provided customer ID does not exist. Please enter an customer plane ID.\n";
			$count++;
			$error = true;
		}
		if (flight_id_exists($record['flight_id']) == false)
		{// The flight does not exist, so it cannot be referenced
			$message = "'$count'. The provided flight ID does not exist. Please enter an flight airport ID.\n";
			$count++;
			$error = true;
		}
		else if (airport_id_exists($record['seat_id'], $record['flight_id']) == true)
		{// The seat referenced already exist in the table with the same flight id, so it will cause a conflict.
			// Note that this is an else if because if the flight id is not valid, then it's not worth checking the seat id
			$message = "'$count'. The provided seat ID is already taken. Please choose a different seat ID.\n";
			$count++;
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("tickets", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
	
	function add_vip($record){
		$error = false;
		$message = "There were errors with your input:";
		// Check for conflicts with DB
		if (cid_exists($record['cid']) == false)
		{// The cid does not exist, so it cannot be referenced 
			$message = "The customer ID does not exist. Please choose and existing customer ID.\n";
			$error = true;
		}
		
		// Insert into DB if no errors were found or print error message
		if ($error == true)
		{// There was an error during insertion, do not insert to table
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
			$insert = false;
		}
		else
		{// No conflicts, we can insert into the table
			$this->db->AutoExecute("vip", $record, "INSERT");
			$insert = true;
		}
		return $insert;
    }
	
	// Get Functions
	function get_user($email, $password){
		$where = "email = \"" . $email . "\" AND password = \"" . $password . "\"";
        $sql = "SELECT first_name,cid, last_name, u_type FROM customers WHERE $where";
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
	
	//Returns all of the seat numbers that have been booked for a particular flight.
	function get_seat($flight_id){
		$sql = "SELECT seat_id FROM tickets WHERE {$flight_id} = flight_id";
		return $this->db->GetArray($sql);
	}
	
	// Modify functions
	function modify_customers($set, $key){
        $key = "cid = $key";
		$this->db->AutoExecute("customers", $set, "UPDATE", $key);
    }
	
	function modify_airports($set, $key){
		$key = "airport_id = $key";
		$this->db->AutoExecute("airports", $set, "UPDATE", $key);
    }
	
	function modify_airplanes($set, $key){
		$key = "plane_id = $key";
		$this->db->AutoExecute("airplanes", $set, "UPDATE", $key);
    }
    
	function modify_flights($set, $key){
		$key = "flight_id = $key";
		$this->db->AutoExecute("flights", $set, "UPDATE", $key);
    }
	
	function modify_tickets($set, $key){
		$key = "ticket_id = $key";
		$this->db->AutoExecute("tickets", $set, "UPDATE", $key);
    }
	
	function modify_vip($set, $key){
		$key = "vip_id = $key";
		$this->db->AutoExecute("vip", $set, "UPDATE", $key);
    }
	
	// Delete functions
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
	
	// Check to see if a key is in it's database
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
			WHERE type = $key
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
			FROM airplanes
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
	
	function seat_id_exists($key, $flight){
		$sql = "SELECT COUNT(ticket_id)
			FROM tickets
			WHERE ticket_id = $key AND flight_id = $flight
			GROUP BY ticket_id";
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
	
	// Create the database
    function create_db(){
        $sql = "CREATE table if not exists customers (
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
        )";
        $this->db->Execute($sql);
        
        $sql = "CREATE table if not exists airports (
            airport_id int auto_increment primary key,
            city varchar(40),
            state varchar(2),
            iata varchar(3),
            name varchar(65)  
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
    	$sql = "TRUNCATE TABLE `$table`";
    	$this->db->Execute($sql);
    }
    
    
}
?>