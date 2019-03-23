<?php
$dbid_escaped = mysqli_real_escape_string($mysqli,$_POST["dbid"]);
$firstname_escaped = mysqli_real_escape_string($mysqli,$_POST["firstname"]);
$lastname_escaped = mysqli_real_escape_string($mysqli,$_POST["lastname"]);
$addr1_escaped = mysqli_real_escape_string($mysqli,$_POST["addr1"]);
$addr2_escaped = mysqli_real_escape_string($mysqli,$_POST["addr2"]);
$city_escaped = mysqli_real_escape_string($mysqli,$_POST["city"]);
$state_escaped = mysqli_real_escape_string($mysqli,$_POST["state"]);
$zipcode_escaped = mysqli_real_escape_string($mysqli,$_POST["zipcode"]);
$phone1_escaped = mysqli_real_escape_string($mysqli,$_POST["phone1"]);
$phone2_escaped = mysqli_real_escape_string($mysqli,$_POST["phone2"]);
$email_escaped = mysqli_real_escape_string($mysqli,$_POST["email"]);
$employer_name_escaped = mysqli_real_escape_string($mysqli,$_POST["employer_name"]);
$position_title_escaped = mysqli_real_escape_string($mysqli,$_POST["position_title"]);
$department_escaped = mysqli_real_escape_string($mysqli,$_POST["department"]);
$area_of_expertise_escaped = mysqli_real_escape_string($mysqli,$_POST["area_of_expertise"]);
$work_address_escaped = mysqli_real_escape_string($mysqli,$_POST["work_address"]);
$work_city_escaped = mysqli_real_escape_string($mysqli,$_POST["work_city"]);
$work_state_escaped = mysqli_real_escape_string($mysqli,$_POST["work_state"]);
$work_zip_escaped = mysqli_real_escape_string($mysqli,$_POST["work_zip"]);
$work_phone_escaped = mysqli_real_escape_string($mysqli,$_POST["work_phone"]);
$work_email_escaped = mysqli_real_escape_string($mysqli,$_POST["work_email"]);
$work_notes_escaped = mysqli_real_escape_string($mysqli,$_POST["work_notes"]);
$willing_to_volunteer_escaped = mysqli_real_escape_string($mysqli,$_POST["willing_to_volunteer"]);
?>