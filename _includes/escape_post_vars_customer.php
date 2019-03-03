<?php
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
$dbid_escaped = mysqli_real_escape_string($mysqli,$_POST["dbid"]);
?>