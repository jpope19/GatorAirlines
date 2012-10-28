<?php
include("route.class.php");

class Search {
    
    var $opts;
    var $depart_routes;
    var $return_routes;
    var $user;
    var $default_opts;
    
    # params is an array containing
    # e_depart_time: date to depart in epoch time
    # e_return_time: date to return in epoch time(ignored if one way)
    # passengers: how many passengers
    # org: what airport (id) do you wish to arrive at
    # dest: what airport (id) do you wish to depart from
    # one_way: is it one way
    # class: what class of ticket
    public function __construct($params, $user) {
        $this->default_opts = array('class' => 'economy','passengers' => 1);
        $this->user = $user;
        $this->opts = array_merge($this->default_opts, $params);
        $this->set_routes();
    }
    
    
    private function set_routes() {
        $flights = $this->user->get_flights($this->opts['e_depart_time']);
        $this->depart_routes = $this->find_routes($this->opts['org'], $this->opts['dest'], $flights);
        $flights = $this->user->get_flights($this->opts['e_return_time']);
        $this->return_routes = $this->find_routes($this->opts['dest'], $this->opts['org'], $flights);
    }
    
    private function find_routes($org, $dest, &$flights) {
        $result = Array();
        $queue = new SplQueue();
        foreach($flights as $flight) {
            if($flight['org_id'] == $this->opts['org']) {
                $route = new Route();
                $route->add_flight($flight);
                $queue->enqueue($route);
            }
        }
        
        //BFS to find all routes that take < 10 hours
        while($queue->count() >0)
        {
            $cur_route = $queue->dequeue();
            foreach($flights as $flight) {
                if($flight['org_id'] == $cur_route->get_dest() && $flight['e_depart_time'] > 30*60 + $cur_route->get_arrival_time()) {
                    $new_route = $cur_route->copy();
                    $new_route->add_flight($flight);
                    if($new_route->get_trip_time() < 6*60*60) {
                        if($new_route->get_dest() == $this->opts['dest']) {
                            $result[] = $new_route;
                        } else {
                            $queue->enqueue($new_route);
                        }
                    }
                }
            }
        }
        return $result;
    }
    
    
}
?>