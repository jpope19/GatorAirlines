<?
include_once("db.class.php");
include_once("display.class.php");
$output = new display;

class users extends db {
    
    var $user_id, $department_id;
    
    function __construct($u_id, $d_id){
        parent::__construct();
        $this->user_id = $u_id;
        $this->department_id = $d_id;
    }
    
    function fill_database(){
        $file = fopen("states.txt", 'r');

        while(!feof($file)){
            $line = utf8_encode(trim(fgets($file)));
            echo $line;
            $record['name'] = $line;
            $this->db->AutoExecute("states", $record, "INSERT");
        }
        
        fclose($file);
        
        return "finished";
    }
}

?>