<?php

// Connect to database
$connection = mysql_connect("students.cs.umt.edu","jh223415","he0ohNgu4Xoojeech1ae") or die("Failed to connect to MySQL: " . mysql_error());;
mysql_select_db("jh223415");
// Prepare and execute query
$query = mysql_query("SELECT * FROM jh223415.TEST1");

// Returning array
$events = array();
$e = array();
$i = 0;
// Fetch results
while ($row = mysql_fetch_array($query)){

    $e['id'] = $row[0];
    $e['title'] = $row[2];
    $e['start'] = $row[3];
    $e['end'] = $row[4];
    $e['allDay'] = false;

    $i += 1;
    // Merge the event array into the return array
    array_push($events, $e);

}

// Output json for our calendar
echo json_encode($events);

exit();

?>
