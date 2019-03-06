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



$sql2 = "update " . $table_customer_contact . " set addr1 = '" . $addr1_escaped . "', addr2 = '" . $addr2_escaped . "', city = '" . $city_escaped . "', state = '" . $state_escaped . "', zipcode = " . $zipcode_escaped . ", phone1 = " . $phone1_escaped . ", phone2 = " . $phone2_escaped . ", email = '" . $email_escaped . "' where customer_id = " . $dbid_escaped . "";

// echo $sql2;
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

$mysqli->query($sql2);



header("Location: editcustomer.php?id=$dbid_escaped&edited=1"); /* Redirect browser */
  exit();

?>