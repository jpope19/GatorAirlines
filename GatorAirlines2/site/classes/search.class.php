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
        $this->default_opts = array('class' => 'coach','passengers' => 1, 'max_results' => 10);
        $this->user = $user;
        $this->opts = array_merge($this->default_opts, $params);
        $this->route_opts = $this->opts;
        $this->set_routes();
    }
    
    
    private function set_routes() {
        $flights = $this->user->get_flights($this->opts['e_depart_time']);
        $this->depart_routes = $this->find_routes($this->opts['org'], $this->opts['dest'], $flights);
        $this->return_routes = null;
        if($this->opts['flight'] == 'Round-Trip') {
            $flights = $this->user->get_flights($this->opts['e_return_time']);
            $this->return_routes = $this->find_routes($this->opts['dest'], $this->opts['org'], $flights);
        }
    }
    
    private function find_routes($org, $dest, &$flights) {
        $result = Array();
        $queue = new SplPriorityQueue();
        foreach($flights as $flight) {
            if($flight['org_id'] == $org) {
                $route = new Route($this->route_opts);
                $route->add_flight($flight);
                $queue->insert($route, $route->get_joy());
            }
        }
        
        //BFS to find all routes that take < 10 hours
        $count = 0;
        while($queue->count() >0 && $count < $this->opts['max_results'])
        {
            $cur_route = $queue->extract();
            if($cur_route->get_dest() == $dest) {
                $result[] = $cur_route;
                $count++;
                continue;
            }
            foreach($flights as $flight) {
                if($flight['org_id'] == $cur_route->get_dest() && $flight['e_depart_time'] > 30*60 + $cur_route->get_arrival_time()) {
                    $new_route = $cur_route->copy();
                    $new_route->add_flight($flight);
                    if($new_route->get_trip_time() < 24*60*60) {
                        $queue->insert($new_route,$new_route->get_joy());
                    }
                }
            }
        }
        return $result;
    }
}
?>
