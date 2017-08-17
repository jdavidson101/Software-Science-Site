<?php
session_start();
include 'config.php';

$email = $_POST[test_input("email")];
$pass = $_POST[test_input("pass")];
//echo($email . " " . $pass); //debug

$sql = "SELECT Email_Address, Password, Access_Level FROM USER WHERE Email_Address = :email AND Password = :pass";


// Use this dilhicky to send a request to the database.
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam('email', $email);
	$stmt->bindParam('pass', $pass);
	$stmt->execute();
	$rows = $stmt->rowCount();
	//$stmt = $dbh->query($sql);
	//$events = $stmt->fetchColumn();
	$dbh = null;
	
	// If any matches were found, send any value to the database
	// Otherwise, don't send anything

	
	//If $events is not empty, the user has sucessfully logged in
	if ($rows == 0)
	{
		
		$anyMatches = ["no"]; //Arbitrary value to send, satisfy arbitrary javascript
	}
	else {
		$anyMatches = [""]; //Working
	
		$_SESSION['login'] = true;
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//print_r($row);
		if ($row['Access_Level'] == "Admin") {
			//echo("AYH:IADJKLFDSJKL:DSFJKLSDFJKLFSDKJLFSDJKLFSDSFDFSD:SDF"); //Debugging
			$_SESSION['admin'] = true;
		}
		//session_abort();
	}
	
	


	echo '{"items":'. json_encode($anyMatches) .'}';
	
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}

?>