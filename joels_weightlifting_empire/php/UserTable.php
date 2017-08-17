 <?php
		// Connect to database
		$connection = mysql_connect("students.cs.umt.edu","jh223415","he0ohNgu4Xoojeech1ae");
		if(!$connection) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("jh223415",$connection);
		// Prepare and execute query
		$AddCustomer = "SELECT * FROM jh223415.USER";
		$TheData = mysql_query($AddCustomer);

$i = 0;
$data = array();
$response = array();

while ($row = mysql_fetch_array($TheData)) {
    $response['User_Id'] = $row[0];
    $response['F_Name'] = $row[3];
    $response['L_Name'] = $row[4];
    $response['Email_Address'] = $row[5];
    $response['Contact_Number'] = $row[8];

    $i += 1;
    array_push($data, $response);
}
//$json_string = json_encode($data['posts']);
//$file = 'bootstrap_fill.json';
//file_put_contents($file, $json_string);
echo json_encode($data);
//header("Location:http://buttedigital.com/joel/accounts.html");
die();

?>


