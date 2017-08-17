<?php
session_start();

	// Check to make sure logged in in the first place
	if ($_SESSION['login'] == true) {
		
		
 		$_SESSION['login'] = false; // Signed out
 		$_SESSION['admin'] = false; // Signed out if admin as well
 		echo("Logged out!"); // Java now knows that you are logged out
	}
	
	else {
		// Frontside accepts nothing for errors
		//echo("Not logged in!"); // Error
	}
	
	

?>