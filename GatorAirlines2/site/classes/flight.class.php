<?php
class Flight {
    public static function get_open_seats_on_flight($flight_id, $user) {
        $sold_seats = $user->get_tickets_for_flight($flight_id);
        $total_seats = $user->get_seats_on_flight($flight_id);
        return $total_seats - count($sold_seats);
    }
}
?>