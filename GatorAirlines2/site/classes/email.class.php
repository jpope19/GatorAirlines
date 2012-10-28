<?
include_once("unionapi.class.php");

class email {
    
    var $addresses = array();
    var $message;
    var $subject;
    
    function __construct($addr, $message, $subject){
        $this->addresses = $addr;
        $this->message = $message;
        $this->subject = $subject;
    }
    
    function send_email(){
        
        $headers  = 'From: GatorAirlines@gmail.com' . "\r\n" .
                    'Reply-To: GatorAirlines@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    
        foreach($this->addresses as $address){
            if(mail($address, $this->subject, $this->message, $headers)){
                echo "Email sent to " . $address . ".<br>";
            }else{
                echo "Email sending to " . $address . " failed.<br>";
            }
        }
    }
    
}

?>