<?php

// Connect to database
$connection = mysql_connect("students.cs.umt.edu","jh223415","he0ohNgu4Xoojeech1ae");
if(!$connection) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("jh223415");
// Prepare and execute query
$id = $_POST['id'];
$remove = "DELETE FROM TEST1 WHERE TEST_ID = '$id'";
$run = mysql_query($remove, $connection);
if(!$run) {
    die("Could not enter data: " . mysql_error());
}

echo "Removed data successfully\n";
mysql_close($connection);

exit();

?>