<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_customer.php');

//escape form inputs
// include('../_includes/escape_post_vars_student.php');

foreach($_POST AS $key => $val) {
    $escapedInsertStudent[$key] = mysqli_real_escape_string($mysqli, $val);
}

$sql = "INSERT INTO " . $table_student . " (`fname`, `lname`, `dob`, `gradelevel`, `gradeleveldate`, `school`, `gender`, `cell_phone`, `email`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`, `linkedcustomer`) VALUES ('" . $escapedInsertStudent["firstname"] . "', '" . $escapedInsertStudent["lastname"] . "', '" . $escapedInsertStudent["dob"] . "', '" . $escapedInsertStudent["gradelevel"] . "', '" . $escapedInsertStudent["gradeleveldate"] . "', '" . $escapedInsertStudent["school"] . "', '" . $escapedInsertStudent["gender"] . "', '" . $escapedInsertStudent["cell_phone"] . "', '" . $escapedInsertStudent["email"] . "', '" . $is_parent . "', '" . $is_student_adult . "', '" . $is_student_minor . "', $is_relative, '" . $is_sibling . "', '" . $is_instructor . "', '" . $is_vol_adult . "', '" . $is_vol_minor . "', '" . $cleanedPostID . "');";

// debugger

if (!$result1 = $mysqli->query($sql)) {
    echo "Error1: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}


// $mysqli->query($sql);

$sql2 = "select max(id) from " . $table_student . "";

// $result2 = $mysqli->query($sql2);
if (!$result2 = $mysqli->query($sql2)) {
    echo "Error2: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql2 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

while ($getTopID = $result2->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;

header("Location: ../index.php?studentinserted=$insertedID"); /* Redirect browser */
  exit();

?>