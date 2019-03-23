<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_customer.php');

//escape form inputs
include('../_includes/escape_post_vars_customer.php');

$sql = "update " . $table_customer . " set firstname = '" . $firstname_escaped . "', lastname = '" . $lastname_escaped . "', is_parent = " . $is_parent . ", is_student_adult = " . $is_student_adult . ", is_student_minor = " . $is_student_minor . ", is_relative = " . $is_relative . ", is_sibling = " . $is_sibling . ", is_instructor = " . $is_instructor . ", is_vol_adult = " . $is_vol_adult . ", is_vol_minor = " . $is_vol_minor . " where id = " . $dbid_escaped . "";

// echo $sql;
// exit();

//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

// echo 'activate: ' . $activate;

$mysqli->query($sql);



$sql2 = "update " . $table_customer_contact . " set addr1 = '" . $addr1_escaped . "', addr2 = '" . $addr2_escaped . "', city = '" . $city_escaped . "', state = '" . $state_escaped . "', zipcode = " . $zipcode_escaped . ", phone1 = " . $phone1_escaped . ", phone2 = " . $phone2_escaped . ", email = '" . $email_escaped . "', employer_name = '" . $employer_name_escaped . "', position_title = '" . $position_title_escaped . "', department = '" . $department_escaped . "', area_of_expertise = '" . $area_of_expertise_escaped . "', work_address = '" . $work_address_escaped . "', work_city = '" . $work_city_escaped . "', work_state = '" . $work_state_escaped . "', work_zip = '" . $work_zip_escaped . "', work_phone = '" . $work_phone_escaped . "', work_email = '" . $work_email_escaped . "', work_notes = '" . $work_notes_escaped . "', willing_to_volunteer = '" . $willing_to_volunteer_escaped . "'  where customer_id = " . $dbid_escaped . "";

// echo $sql2;
// exit();

//debugger

if (!$result2 = $mysqli->query($sql2)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query2: " . $sql2 . "\n";
    echo "Errno2: " . $mysqli->errno . "<br />";
    echo "Error2: " . $mysqli->error . "<br />";
    exit;
}

// echo 'activate: ' . $activate;

$mysqli->query($sql2);



header("Location: editcustomer.php?id=$dbid_escaped&edited=1"); /* Redirect browser */
  exit();

?>