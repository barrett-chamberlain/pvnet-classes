<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_customer.php');

//escape form inputs
include('../_includes/escape_post_vars_student.php');

$sql = "INSERT INTO " . $table_student . " (`fname`, `lname`, `dob`, `gradelevel`, `gradeleveldate`, `school`, `gender`, `cell_phone`, `email`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`, `linkedcustomer`) VALUES ('" . $firstname_escaped . "', '" . $lastname_escaped . "', '" . $dob_escaped . "', '" . $gradelevel_escaped . "', '" . $gradeleveldate_escaped . "', '" . $school_escaped . "', '" . $gender_escaped . "', '" . $cell_phone_escaped . "', '" . $email_escaped . "', '" . $is_parent . "', '" . $is_student_adult . "', '" . $is_student_minor . "', $is_relative, '" . $is_sibling . "', '" . $is_instructor . "', '" . $is_vol_adult . "', '" . $is_vol_minor . "', '" . $cleanedPostID . "');";

// debugger

if (!$result1 = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}


// $mysqli->query($sql);

$sql2 = "select max(id) from " . $table_student . "";

// $result2 = $mysqli->query($sql2);
if (!$result2 = $mysqli->query($sql2)) {
    include('../_includes/send_error.php');
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