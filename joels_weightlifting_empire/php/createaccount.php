<?php
session_start();
include 'config.php';

$email = $_POST[test_input("email")];
$pass = $_POST[test_input("pass")];
$fName = $_POST[test_input("fName")];
$lName = $_POST[test_input("lName")];
$bdayinit = $_POST[test_input("bday")];


$dates = strtotime($bdayinit);
//$date = DateTime::createFromFormat('Y-m-d', $dates);
$date = date('Y-m-d', $dates);
//echo $date;
//$bday = $date->format('Y-m-d');

$address = $_POST[test_input("address")];
$phone = $_POST[test_input("phone")];

$userLevel = "User"; //Constant Value

// I am tired and am making this up.
$userID = $fName . $bday;

$sql = "INSERT INTO USER (User_ID, Password, Access_Level, F_Name, L_Name, Email_Address, B_Date, Address, Contact_Number) VALUES (:uid, :p,:al,:fn,:ln,:ea,:bd,:a,:cn)";


// Use this dilhicky to send a request to the database.
try {
	

	// Send stuff via PDO because it protects against mySQL injection
	
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$query = $dbh->prepare( $sql );
	$query->execute( array( ':uid'=>$userID, ':p'=>$pass, ':al'=>$userLevel, ':fn' => $fName, ':ln' => $lName, ':ea'=>$email, ':bd' =>$date, ':a' =>$address, ':cn' => $phone) );
	$dbh = null;
	
	echo '{"items":'. json_encode('Yay') .'}';
	
	
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}

?>