<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
if($_POST["PaidOrNot"] == 'on') {
    $PaidOrNot = 1;
} else {
    $PaidOrNot = 0;
}

// echo $cleanedID;

$cleanedCustomerID = mysqli_real_escape_string($mysqli,$_GET['customerid']);

// echo $cleanedCustomerID;

//escape form inputs
// include('../_includes/escape_post_vars_student.php');

foreach($_POST AS $key => $val) {
    $escapedInsertTransaction[$key] = mysqli_real_escape_string($mysqli, $val);
}
$cleanedCustomerID = mysqli_real_escape_string($mysqli,$_POST['cleanedCustomerID']);
$cleanedStudentID = mysqli_real_escape_string($mysqli,$_POST['cleanedStudentID']);
$cleanedClassID = mysqli_real_escape_string($mysqli,$_POST['cleanedClassID']);


$sql = "INSERT INTO " . $table_transactions . " (`StudentID`, `ClassID`, `PaidOrNot`, `BusinessDepartmentComments`, `AmountDue`, `AmountPaid`) VALUES ('" . $cleanedStudentID . "', '" . $cleanedClassID . "', '" . $PaidOrNot . "', '" . $escapedInsertTransaction["BusinessDepartmentComments"] . "', '" . $escapedInsertTransaction["AmountDue"] . "', '" . $escapedInsertTransaction["AmountPaid"] . "');";

// echo $sql;exit;
// debugger

if (!$result1 = $mysqli->query($sql)) {
    echo "Error1: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}


// $mysqli->query($sql);

$sql2 = "select max(ID) from " . $table_transactions . "";

// $result2 = $mysqli->query($sql2);
if (!$result2 = $mysqli->query($sql2)) {
    echo "Error2: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql2 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

while ($getTopID = $result2->fetch_assoc()) {
 $insertedID = $getTopID["max(ID)"];
}
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;
// echo $insertedID;exit;
header("Location: edittransaction.php?ID=$insertedID&inserted=1"); /* Redirect browser */
  exit();

?>