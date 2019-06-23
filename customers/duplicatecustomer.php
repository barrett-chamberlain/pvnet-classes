<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "INSERT into " . $table_customer . " (`firstname`, `lastname`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`) 
SELECT 
    `firstname`, `lastname`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor` FROM " . $table_customer . " WHERE id='" . $cleanedID . "';";

//debugger
// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why: \n";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "\n";
//     echo "Error: " . $mysqli->error . "\n";
//     exit;
// }

// $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}

$sql2 = "select max(id) from " . $table_customer . "";

$result2 = $mysqli->query($sql2);

while ($getTopID = $result2->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}

$sql3 = "INSERT into " . $table_customer_contact . " (`addr1`, `addr2`, `city`, `state`, `zipcode`, `phone1`, `phone2`, `email`, `customer_id`, `employer_name`, `position_title`, `department`, `area_of_expertise`, `work_address`, `work_city`, `work_state`, `work_zip`, `work_phone`, `work_email`, `work_notes`, `willing_to_volunteer`) 
SELECT 
    `addr1`, `addr2`, `city`, `state`, `zipcode`, `phone1`, `phone2`, `email`, $insertedID, `employer_name`, `position_title`, `department`, `area_of_expertise`, `work_address`, `work_city`, `work_state`, `work_zip`, `work_phone`, `work_email`, `work_notes`, `willing_to_volunteer` FROM " . $table_customer_contact . " WHERE customer_id='" . $cleanedID . "';";

// $mysqli->query($sql3);
if (!$result1 = $mysqli->query($sql3)) {
    include('../_includes/send_error.php');
    exit;
}

// if (!$result3 = $mysqli->query($sql3)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query3: " . $sql3 . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }
// echo 'sql: ' . $sql . '<br /><br />';

// echo 'sql2: ' . $sql2 . '<br /><br />';

// echo 'sql3: ' . $sql3 . '<br /><br />';

// exit();

// $sql = "CREATE TEMPORARY TABLE tmp SELECT * FROM classesDev WHERE id = 95;UPDATE tmp SET id=96 WHERE id = 95;INSERT INTO classesDev SELECT * FROM tmp WHERE id = 96;";

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }


// if (!$result = $mysqli->query($sql2)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

header("Location: editcustomer.php?id=$insertedID&duplicated=1");
  exit();
?>