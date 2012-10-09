<?php
// start session
if (!isset($_SESSION))
{
	session_start();
}
	// First unset session id. Then destroy session
	$sessionID = session_id();
	session_unset($sessionID);
	session_destroy();
?>