<?php

//duplicate class information into new row and redirect to edit page with newly inserted ID

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "INSERT into " . $table_transactions . " (`StudentID`, `ClassID`, `TimeSignedUp`, `PaidOrNot`, `BusinessDepartmentComments`, `AmountDue`, `AmountPaid`) 
SELECT 
    `StudentID`, `ClassID`, `TimeSignedUp`, `PaidOrNot`, `BusinessDepartmentComments`, `AmountDue`, `AmountPaid` 
FROM " . $table_transactions . " WHERE id='" . $cleanedID_caps . "';";


//debugger
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

//get newly-created ID from inserting duplicate 
$sql2 = "select max(ID) from " . $table_transactions . "";

$result = $mysqli->query($sql2);
// if (!$result = $mysqli->query($sql2)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

while ($getTopID = $result->fetch_assoc()) {
 $insertedID = $getTopID["max(ID)"];
}
header("Location: edittransaction.php?ID=$insertedID&duplicated=1");
  exit();
?>