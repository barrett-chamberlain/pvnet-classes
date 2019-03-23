<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_customer.php');

//escape form inputs
include('../_includes/escape_post_vars_customer.php');

$sql = "INSERT INTO " . $table_customer . " (`firstname`, `lastname`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`) VALUES ('" . $firstname_escaped . "', '" . $lastname_escaped . "', '" . $is_parent . "', '" . $is_student_adult . "', '" . $is_student_minor . "', $is_relative, '" . $is_sibling . "', '" . $is_instructor . "', '" . $is_vol_adult . "', '" . $is_vol_minor . "');";


// debugger

if (!$result1 = $mysqli->query($sql)) {
    echo "Error1: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}


// $mysqli->query($sql);

$sql2 = "select max(id) from " . $table_customer . "";

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
$sql3 = "INSERT INTO " . $table_customer_contact . " (`addr1`, `addr2`, `city`, `state`, `zipcode`, `phone1`, `phone2`, `email`, `customer_id`, `employer_name`, `position_title`, `department`, `area_of_expertise`, `work_address`, `work_city`, `work_state`, `work_zip`, `work_phone`, `work_email`, `work_notes`, `willing_to_volunteer`) VALUES ('" . $addr1_escaped . "', '" . $addr2_escaped . "', '" . $city_escaped . "', '" . $state_escaped . "', '" . $zipcode_escaped . "', '" . $phone1_escaped . "', '" . $phone2_escaped . "', '" . $email_escaped . "', " . $insertedID . ", '" . $employer_name_escaped . "', '" . $position_title_escaped . "', '" . $department_escaped . "', '" . $area_of_expertise_escaped . "', '" . $work_address_escaped . "', '" . $work_city_escaped . "', '" . $work_state_escaped . "', '" . $work_zip_escaped . "', '" . $work_phone_escaped . "', '" . $work_email_escaped . "', '" . $work_notes_escaped . "', '" . $willing_to_volunteer_escaped . "');";

// $result3 = $mysqli->query($sql3);
if (!$result3 = $mysqli->query($sql3)) {
    echo "Error3: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql3 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;

header("Location: ../index.php?custinserted=$insertedID"); /* Redirect browser */
  exit();

?>