<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "INSERT into " . $table_student . " (`fname`, `lname`, `dob`, `gradelevel`, `gradeleveldate`, `school`, `gender`, `cell_phone`, `email`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`, `linkedcustomer`) 
SELECT 
    `fname`, `lname`, `dob`, `gradelevel`, `gradeleveldate`, `school`, `gender`, `cell_phone`, `email`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`, `linkedcustomer`
FROM " . $table_student . " WHERE id='" . $cleanedID . "';";

// echo $sql;

// $sql = "CREATE TEMPORARY TABLE tmp SELECT * FROM studentDev WHERE id = 95;UPDATE tmp SET id=96 WHERE id = 95;INSERT INTO studentDev SELECT * FROM tmp WHERE id = 96;";

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//debugger
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }

$sql2 = "select max(id) from " . $table_student . "";

$result = $mysqli->query($sql2);
// if (!$result = $mysqli->query($sql2)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

while ($getTopID = $result->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}
header("Location: editstudent.php?id=$insertedID&duplicated=1");
  exit();
?>	