<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_customer.php');

//escape form inputs
// include('../_includes/escape_post_vars_customer.php');

foreach($_POST AS $key => $val) {
    $escapedEditCustomer[$key] = mysqli_real_escape_string($mysqli, $val);
}

$sql = "update " . $table_customer . " set firstname = '" . $escapedEditCustomer["firstname"] . "', lastname = '" . $escapedEditCustomer["lastname"] . "', is_parent = " . $is_parent . ", is_student_adult = " . $is_student_adult . ", is_student_minor = " . $is_student_minor . ", is_relative = " . $is_relative . ", is_sibling = " . $is_sibling . ", is_instructor = " . $is_instructor . ", is_vol_adult = " . $is_vol_adult . ", is_vol_minor = " . $is_vol_minor . " where id = " . $escapedEditCustomer["dbid"] . "";

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



$sql2 = "update " . $table_customer_contact . " set addr1 = '" . $escapedEditCustomer["addr1"] . "', addr2 = '" . $escapedEditCustomer["addr2"] . "', city = '" . $escapedEditCustomer["city"] . "', state = '" . $escapedEditCustomer["state"] . "', zipcode = " . $escapedEditCustomer["zipcode"] . ", phone1 = " . $escapedEditCustomer["phone1"] . ", phone2 = " . $escapedEditCustomer["phone2"] . ", email = '" . $escapedEditCustomer["email"] . "', employer_name = '" . $escapedEditCustomer["employer_name"] . "', position_title = '" . $escapedEditCustomer["position_title"] . "', department = '" . $escapedEditCustomer["department"] . "', area_of_expertise = '" . $escapedEditCustomer["area_of_expertise"] . "', work_address = '" . $escapedEditCustomer["work_address"] . "', work_city = '" . $escapedEditCustomer["work_city"] . "', work_state = '" . $escapedEditCustomer["work_state"] . "', work_zip = '" . $escapedEditCustomer["work_zip"] . "', work_phone = '" . $escapedEditCustomer["work_phone"] . "', work_email = '" . $escapedEditCustomer["work_email"] . "', work_notes = '" . $escapedEditCustomer["work_notes"] . "', willing_to_volunteer = '" . $escapedEditCustomer["willing_to_volunteer"] . "'  where customer_id = " . $escapedEditCustomer["dbid"] . "";

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



header("Location: editcustomer.php?id= " . $escapedEditCustomer["dbid"] . "&edited=1"); /* Redirect browser */
  exit();

?>