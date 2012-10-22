<?php
class Route {
    var $avail_tickets;
    var $layover_time;
    var $num_flights;
    
    function __construct() {
        $this->num_flights = 0;
        $ths->flights = array();
    }
    
    public function add_flight($flight) {
        $this->flights[] = $flight;
        $this->num_flights += 1;
        if($this->num_flights >= 2) {
            $this->layover_time += ($flight['e_depart_time']) - $this->flights[$this->num_flights-2]['e_arrival_time'];
        }
    }
    
    public function get_trip_time() {
        if($this->num_flights == 0) return 0;
        else {
            //echo $this->flights[$this->num_flights-1]['e_arrival_time'] - $this->flights[0]['e_depart_time'];
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
        $copy = new Route();
        foreach($this->flights as $flight) {
            $copy->add_flight($flight);
        }
        return $copy;
    }
}
?>