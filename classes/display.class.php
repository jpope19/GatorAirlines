<?php
class display {
    
    function out($val, $nl = true) {
      echo $this->out_ne($val, $nl);
    }
 
   function out_ne($val, $nl = true) {
      $val = htmlspecialchars($val);
      if ($nl) {
          $val = str_replace("\n", "<br>", $val);
      }
      return $val;
    }
    
    function trun($val, $len){
        if(strlen($val) > $len){
            $val = substr($val, 0, $len-1);
            $last_pos = strripos($val, " ");
            if ($last_pos === False) {
                return "";  
            } else {
                return $this->out(substr($val, 0, $last_pos) . "...");             
            }
        } else {
            return $this->out($val);
        }
    }
    function shorten($val, $len){
        if(strlen($val) > $len){
            $val = substr($val, 0, $len-1);
            $last_pos = strripos($val, " ");
            if ($last_pos === False) {
                return "";  
            } else {
                return $this->out(substr($val, 0, $last_pos));             
            }
        } else {
            return $this->out($val);
        }
    }
 }
?>