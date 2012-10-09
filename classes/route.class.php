<? php
class Route {
  private var $flights = new Array();
  private var $avail_tickets;
  private var $layover_time;
  private var $num_flights;
  
  function __construct() {
    this->num_flights = 0;
  }
  
  public function add_flight($flight) {
    this->$flights[num_flights] = $flight;
    this->num_flights++;
    this->$layover_time += ($flight['e_depart_time']) - this->$flights[num_flights-2]['e_arrival_time'];
  }
  
  public function get_trip_time() {
    if(this->num_flights == 0) return 0;
    return this->$flights[num_flights-1]['e_arrival_time'] - this->$flights[0]['e_depart_time']
  }
  
  public function get_layover_time() {
    return this->layover_time;
  }
  
  public function get_flights() {
    return this->$flights;
  }
  
  public function get_dest() {
    return this->$flights[num_flights-1]['dest_id'];
  }
  
  public function copy() {
    Route $copy = new Route();
    foreach($flights as $flight) {
      $copy.add($flight);
    }
    return $copy;
  }
}
?>