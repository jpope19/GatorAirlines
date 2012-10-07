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
        $file = fopen("../data/cities.txt", 'r');

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
		$file = fopen("../data/customers.txt", 'r');

        while(!feof($file)){
            $line = utf8_encode(trim(fgets($file)));
            echo $line . "<br>";
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
        
        fclose($file);
        
        return "finished";
    }
    
    function add_airplane($record){
        $this->db->AutoExecute("airplanes", $record, "INSERT");
    }
    
    function get_airports(){
        $sql = "SELECT * FROM airports";
        return $this->db->GetArray($sql);
    }
    
    function get_planes(){
        $sql = "SELECT * FROM airplanes";
        return $this->db->GetArray($sql);
    }
	
	function get_options($table, $val, $text, $where = "", $order = "")
	{// Used by most php's in admin to create dropdown 
		if($where != "") $where = "WHERE $where";
		if($order != "") $order = "ORDER BY $order";
		$sql = "SELECT * FROM airports";
		$this->db->query($sql);
		while($row = mysql_fetch_array($this->db->result, MYSQL_ASSOC))
		{
			$out .= "<option value=\"" . $row[$val] . "\">" . $row[$text] . "</option>"; 
		}
		return $out; 
	}

    
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
    
    
}

     //$user = new users();
	 
	 //$user->create_db();
	 
	 //$user->fill_database();

?>