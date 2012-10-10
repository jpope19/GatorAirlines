<?php
class Airport {

    public static function get_id_by_name($name, $user) {
        $airports = $user->get_airports();
        foreach($airports as $airport) {
            if($airport['iata'] == $name) {
                return $airport['airport_id'];
            }
        }
    }
    
    public static function get_name_by_id($id, $user) {
        $airports = $user->get_airports();
        foreach($airports as $airport) {
            if($airport['airport_id'] == $id) {
                return $airport['iata'];
            }
        }
    }
}
?>