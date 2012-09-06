<?
define("LOG_EVENT", "0");
define("LOG_WARN", "1");
define("LOG_ERROR", "2");
	
class db {
	
	var $db;
	var $user_id;

	function out($string) {
		return htmlspecialchars($string);
	}
	
	function ts() {
	  return (int)microtime(True);
	}
		
	function __construct() {
		include("adodb5/adodb.inc.php"); // includes the adodb library
		include_once("adodb5/adodb-exceptions.inc.php");	// show DB errors -- REMOVE FOR PRODUCTION	

		$this->db = NewADOConnection("mysql"); // A new connection
	    $this->db->Connect('localhost', 'jpope', 'baseball19', 'GatorAirlines');
        $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
        }
	}	  
	
	function filter_input($input = "") {
	  $input = mysql_real_escape_string($input);
	  $input = str_replace("%", "", $input);
	  return $input;	
	}
	
	function filter_input_text($input = "") {
	  $input = mysql_real_escape_string($input);
	  return $input;	
	}

    function log($message = "") {
        $record = array();
        $record['ts'] = $this->ts();
        if (isset($_SESSION['user_id'])) {
            $record['user_id'] = $_SESSION['user_id'];        
        } else {
            $record['user_id'] = 0;                    
        }
        $record['message'] = $message;
        $this->db->AutoExecute("log", $record, "INSERT");
    }    
    
}
	  
?>