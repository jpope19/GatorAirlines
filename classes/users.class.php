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
        $this->db->AutoExecute("customers", $record, "INSERT");
    }
	
	function add_airports($record){
        $this->db->AutoExecute("airports", $record, "INSERT");
    }
	
	function add_airplane($record){
        $this->db->AutoExecute("airplanes", $record, "INSERT");
    }
    
    function add_flight($record){
        $this->db->AutoExecute("flights", $record, "INSERT");
    }
    
	function add_flights($record){
        $this->db->AutoExecute("flights", $record, "INSERT");
    }
	
	function add_tickets($record){
        $this->db->AutoExecute("tickets", $record, "INSERT");
    }
	
	function add_vip($record){
        $this->db->AutoExecute("vip", $record, "INSERT");
    }
	
	// Get Functions
	function get_user($email, $password){
		$where = "email = \"" . $email . "\" AND password = \"" . $password . "\"";
        $sql = "SELECT first_name, last_name, u_type FROM customers WHERE $where";
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
        $sql = "SELECT email
		FROM customers, tickets
		WHERE flight_id = $flight_id AND tickets.cid = customers.cid
		ORDER BY email ASC";
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