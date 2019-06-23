<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_student.php');

//escape form inputs
include('../_includes/escape_post_vars_student.php');

$sql = "update " . $table_student . " set fname = '" . $firstname_escaped . "', lname = '" . $lastname_escaped . "', dob = '" . $dob_escaped . "', gradelevel = '" . $gradelevel_escaped . "', gradeleveldate = '" . $gradeleveldate_escaped . "', school = '" . $school_escaped . "', gender = '" . $gender_escaped . "', cell_phone = '" . $cell_phone_escaped . "', linkedcustomer = '" . $linkedcustomer_escaped . "', email = '" . $email_escaped . "', is_parent = " . $is_parent . ", is_student_adult = " . $is_student_adult . ", is_student_minor = " . $is_student_minor . ", is_relative = " . $is_relative . ", is_sibling = " . $is_sibling . ", is_instructor = " . $is_instructor . ", is_vol_adult = " . $is_vol_adult . ", is_vol_minor = " . $is_vol_minor . " where id = " . $dbid_escaped . "";

// echo $sql;
// exit();

//debugger

if (!$result = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}
	
// echo 'activate: ' . $activate;

// $mysqli->query($sql);

header("Location: editstudent.php?id=$dbid_escaped&edited=1"); /* Redirect browser */
  exit();

?>