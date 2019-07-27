<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_student.php');

//escape form inputs
// include('../_includes/escape_post_vars_student.php');

foreach($_POST AS $key => $val) {
    $escapedEditStudent[$key] = mysqli_real_escape_string($mysqli, $val);
}

$sql = "update " . $table_student . " set fname = '" . $escapedEditStudent["firstname"] . "', lname = '" . $escapedEditStudent["lastname"] . "', dob = '" . $escapedEditStudent["dob"] . "', gradelevel = '" . $escapedEditStudent["gradelevel"] . "', gradeleveldate = '" . $escapedEditStudent["gradeleveldate"] . "', school = '" . $escapedEditStudent["school"] . "', gender = '" . $escapedEditStudent["gender"] . "', cell_phone = '" . $escapedEditStudent["cell_phone"] . "', linkedcustomer = '" . $escapedEditStudent["linkedcustomer"] . "', email = '" . $escapedEditStudent["email"] . "', is_parent = " . $is_parent . ", is_student_adult = " . $is_student_adult . ", is_student_minor = " . $is_student_minor . ", is_relative = " . $is_relative . ", is_sibling = " . $is_sibling . ", is_instructor = " . $is_instructor . ", is_vol_adult = " . $is_vol_adult . ", is_vol_minor = " . $is_vol_minor . " where id = " . $escapedEditStudent["dbid"] . "";

// echo $sql;
// exit();

//debugger

if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}
	
// echo 'activate: ' . $activate;

// $mysqli->query($sql);

header("Location: editstudent.php?id=" . $escapedEditStudent["dbid"] . "&edited=1"); /* Redirect browser */
  exit();

?>