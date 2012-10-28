<?php

class RoutePQ extends SplPriorityQueue {
    public function compare($a, $b) {
        return $a->get_joy - $b->get_joy;
    }
}

?>