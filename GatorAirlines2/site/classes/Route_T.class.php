<?php
class Route_T {
    var $avail_tickets;
    var $layover_time;
    var $num_flights;
    var $cost;
    
    function __construct($opts) {
        $this->num_flights = 0;
        $this->flights = array();
        $this->opts = $opts;
        $this->visited = array();

    }
    
    public function add_flight($flight) {
        $this->flights[] = $flight;
        $this->num_flights += 1;
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
            $copy->add_flight($flight);
        }
        return $copy;
    }
    
    public function get_Joy() {
        return -1*($this->cost + $this->get_trip_time()/60000 * $this->num_flights);
    }
    
    public function to_string() {
		date_default_timezone_set('America/New_York');
        $res = "Total cost: \$$this->cost</br>";
        $res = "$res Total flights: $this->num_flights</br>";
        $fuck_php = round($this->get_trip_time()/60,0);
		$time = date('Y-m-d H:i:s', $this->flights[0]['e_depart_time']);
		$res = "$res Departs at: $time </br>";
		$time = date('Y-m-d H:i:s', $this->flights[$this->num_flights-1]['e_arrival_time']);
        $res = "$res Arrives at: $time </br>";
		$res = "$res Total time (minutes): $fuck_php</br>";
        $res = "$res Flights: </br>";
        $count = 1;
        foreach($this->flights as $flight) {
            $a = Airport::get_name_by_id($flight['org_id'],new users());
            $b = Airport::get_name_by_id($flight['dest_id'],new users());
            $res = $res . $count . " : " . $a . " to " .  $b . "</br>";
            //$res .= "     departs at: " .  date('D M j, Y - g:i', $flight['e_depart_time']) . "<br>";
            //$res .= "     arrives at: " .  date('D M j, Y - g:i', $flight['e_arrival_time']) . "<br>";
			 $res .= "     departs at: " .  $flight['e_depart_time'] . "<br>";
			  $res .= "     arrives at: " .  $flight['e_arrival_time'] . "<br>";
            $count++;
        }
        
        $res .= "<br>";
        
        return $res;
    }
}
?>