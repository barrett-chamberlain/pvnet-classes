<?php
//escape form inputs to prevent injection
$dbid_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["dbid"]

);
$firstname_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["firstname"]

);
$lastname_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["lastname"]

);
$dob_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["dob"]

);
$gradelevel_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["gradelevel"]

);
$gradeleveldate_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["gradeleveldate"]

);
$school_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["school"]

);
$gender_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["gender"]

);
$cell_phone_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["cell_phone"]

);
$email_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["email"]

);
$linkedcustomer_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditStudent["linkedcustomer"]

);
?>