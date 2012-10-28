<?php
class Route {
    var $avail_tickets;
    var $layover_time;
    var $num_flights;
    var $cost;
    
    function __construct($opts) {
        $this->num_flights = 0;
        $this->flights = array();
        $this->opts = $opts;
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
        return -1 * ($this->cost + $this->get_trip_time()) * $this->num_flights);
    }
}
?>