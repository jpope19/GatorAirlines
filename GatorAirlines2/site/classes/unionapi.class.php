<?

// Username: unionapi@fluxun.com
// Password: Flux!!
// API Key: kyfq08fgepodrznuf7iezu23cg95tg

class unionapi {
  
  var $api_name;
  var $token;
  var $to_push = array();
  
  function __construct($api_name, $token = "kyfq08fgepodrznuf7iezu23cg95tg") {
    $this->api_name = $api_name;
    $this->token = $token;    
	}
	
	function set($var_name, $data) {
	  $this->to_push[$var_name] =  $data;
	}

	function store_token_under($data) {
	  $this->to_push['ua_vstore_id'] =  $data;
	}

	function store_use($data) {
	  $this->to_push['ua_vstore_id_get'] =  $data;
	}

  public static function qcall($api_name = "", $to_push = array(), $token = "kyfq08fgepodrznuf7iezu23cg95tg") {
    $context = stream_context_create(array( 
    'http' => array( 
      'method'  => 'POST', 
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 
      'content' => http_build_query($to_push), 
      'timeout' => 5, 
      ), 
    )); 
    $ret = @file_get_contents('http://unionapi.com/api.php?token=' . $token . '&api_name=' . $api_name, false, $context); 
    if (is_null(json_decode($ret))) {
      $temp = array();
      $temp['data'] = $ret;
      return json_decode(json_encode($temp));
    } else {
      return json_decode($ret);  
    }    
	}	
  
	function call($array = false) {
	  if ($array !== false) {
	    $this->to_push = $array;
	  }
	  
    $context = stream_context_create(array( 
    'http' => array( 
      'method'  => 'POST', 
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 
      'content' => http_build_query($this->to_push), 
      'timeout' => 5, 
    ), 
  )); 
  $ret = @file_get_contents('http://unionapi.com/api.php?token=' . $this->token . '&api_name=' . $this->api_name, false, $context); 
  if (is_null(json_decode($ret))) {
    $temp = array();
    $temp['data'] = $ret;
    return json_decode(json_encode($temp));
    } else {
    return json_decode($ret);  
    }    
	}	
}

?>