<?php

// Connect to database
$connection = mysql_connect("students.cs.umt.edu","jh223415","he0ohNgu4Xoojeech1ae");
if(!$connection) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("jh223415");
// Prepare and execute query
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$insert = "INSERT INTO TEST1".
    "(User_Id, Title, Start_Date_Time, End_Date_Time)".
    "VALUES('dm9224698','$title','$start','$end')";
$run = mysql_query($insert, $connection);
if(!$run) {
    die("Could not enter data: " . mysql_error());
}

echo "Entered data successfully\n";
mysql_close($connection);

exit();

?>