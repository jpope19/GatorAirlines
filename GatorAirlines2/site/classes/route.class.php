<?php
class Route {
    var $avail_tickets;
    var $layover_time;
    var $num_flights;
    var $cost;
    var $seats;
    
    function __construct($opts) {
        $this->num_flights = 0;
        $this->flights = array();
        $this->opts = $opts;
        $this->visited = array();
        $this->seats = 100;
    }
    
    public function add_flight($flight, $num_seats) {
        $this->flights[] = $flight;
        $this->num_flights += 1;
        $this->visited[$flight['org_id']] = true;
        $this->visited[$flight['dest_id']] = true;
        if($num_seats < $this->seats) {
            $this->seats = $num_seats;
        }
        if($this->num_flights >= 2) {
            $this->layover_time += ($flight['e_depart_time']) - $this->flights[$this->num_flights-2]['e_arrival_time'];
        }
        if($this->opts['class'] == 'first_class') {
            $this->cost += $flight['first_class_cost'];
        } else {
            $this->cost += $flight['coach_class_cost'];
        }
    }
    
    public function get_trip_time() {
        if($this->num_flights == 0) return 0;
        else {
            return $this->flights[$this->num_flights-1]['e_arrival_time'] - $this->flights[0]['e_depart_time'];
        }
    }
    
    public function get_layover_time() {
        return $this->layover_time;
    }
    
    public function get_flights() {
        return $this->flights;
    }
    
    public function get_dest() {
        return $this->flights[$this->num_flights-1]['dest_id'];
    }
    
    public function get_arrival_time() {
        return $this->flights[$this->num_flights-1]['e_arrival_time'];
    }
    
    public function copy() {
        $copy = new Route($this->opts);
        foreach($this->flights as $flight) {
            $copy->add_flight($flight, $this->seats);
        }
        return $copy;
    }
    
    public function get_Joy() {
        return -1*($this->cost + $this->get_trip_time()/60000 * $this->num_flights);
    }
    
    public function to_string($way) {
		date_default_timezone_set('America/New_York');
		$time = date('M j, Y - g:ia', $this->flights[0]['e_depart_time']);
		$res = "<td><center>$time</center></td>";    // depart time
		
		$time = date('M j, Y - g:ia', $this->flights[$this->num_flights-1]['e_arrival_time']);
        $res .= "<td><center>$time</center></td>";   // arrival time
        
        $res .= "<td><center>\$$this->cost</center></td>";   // cost
        $layovers = $this->num_flights - 1;
        $res .= "<td><center>$layovers</center></td>";  // layovers
        
        $res .= "<td><center>$this->seats</center></td>";  // seats
        
        $id = "";
        foreach($this->flights as $flight){
            $id .= $flight['flight_id'] . "_";
        }
        
        $res .= "<td><center><input type='radio' name='$way' value='$id'></center></td>";  // id of flights space delimited 
        return $res;
    }
    
    public function get_layovers(){
        foreach($this->flights as $flight){
            $a = Airport::get_name_by_id($flight['org_id'], new users());
            $b = Airport::get_name_by_id($flight['dest_id'], new users());
            $depart = $flight['e_depart_time'];
            $arrive = $flight['e_arrival_time'];
        }
    }
}
?>