<?php
//escape form inputs to prevent injection
$dbid_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["dbid"]

);


$firstname_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["firstname"]

);


$lastname_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["lastname"]

);


$addr1_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["addr1"]

);


$addr2_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["addr2"]

);


$city_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["city"]

);


$state_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["state"]

);


$zipcode_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["zipcode"]

);


$phone1_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["phone1"]

);


$phone2_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["phone2"]

);


$email_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["email"]

);


$employer_name_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["employer_name"]

);


$position_title_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["position_title"]

);


$department_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["department"]

);


$area_of_expertise_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["area_of_expertise"]

);


$work_address_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_address"]

);


$work_city_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_city"]

);


$work_state_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_state"]

);


$work_zip_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_zip"]

);


$work_phone_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_phone"]

);


$work_email_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_email"]

);


$work_notes_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["work_notes"]

);


$willing_to_volunteer_escaped = mysqli_real_escape_string($mysqli,

	$escapedEditCustomer["willing_to_volunteer"]

);


?>