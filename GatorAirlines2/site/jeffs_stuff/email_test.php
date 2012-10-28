<?

// great tutorial @ http://blog.techwheels.net/send-email-from-localhost-wamp-server-using-sendmail/


include("../classes/email.class.php");

$addresses = array();
$addresses[] = "jpope19@ufl.edu";
$addresses[] = "jpope@mitchell-networks.com";

// email(array of addresses, message, subject);

$email = new email($addresses, "this is a test", "test subject");

$email->send_email();

?>