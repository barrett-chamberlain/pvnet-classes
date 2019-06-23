<?php
//escape form inputs to prevent injection
$dbid_escaped = mysqli_real_escape_string($mysqli,$_POST["dbid"]);
$firstname_escaped = mysqli_real_escape_string($mysqli,$_POST["firstname"]);
$lastname_escaped = mysqli_real_escape_string($mysqli,$_POST["lastname"]);
$dob_escaped = mysqli_real_escape_string($mysqli,$_POST["dob"]);
$gradelevel_escaped = mysqli_real_escape_string($mysqli,$_POST["gradelevel"]);
$gradeleveldate_escaped = mysqli_real_escape_string($mysqli,$_POST["gradeleveldate"]);
$school_escaped = mysqli_real_escape_string($mysqli,$_POST["school"]);
$gender_escaped = mysqli_real_escape_string($mysqli,$_POST["gender"]);
$cell_phone_escaped = mysqli_real_escape_string($mysqli,$_POST["cell_phone"]);
$email_escaped = mysqli_real_escape_string($mysqli,$_POST["email"]);
$linkedcustomer_escaped = mysqli_real_escape_string($mysqli,$_POST["linkedcustomer"]);
?>