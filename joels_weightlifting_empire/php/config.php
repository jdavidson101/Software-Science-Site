<?php
	
	$dbhost = 'students.cs.umt.edu';
	$dbuser = 'jh223415';
	$dbpass = 'he0ohNgu4Xoojeech1ae';
	$dbname = 'jh223415';
	//echo ("I'm alive");
	
	// Facebook ID stuff
	$aID = '869267139810190';
	$aSecret = 'd138ff181d19abc32bf5a5143ee042c8';

/*
 * This following section is reserved for functions.
 */
 
 
 
// Test data before it is submitted to the SQL code and stuff.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/* OK, now we are using json encoding I guess. Time to make this work... */
// First build an array. There is stuff we need regardless (the access code) and stuff that we may need (error codes)
   class Jray {
      public $token = "";
      public $errors  = "";
	  public $newuser = "Nope";
   }


?>



