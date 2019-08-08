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
    $escapedInsertCustomer[$key] = mysqli_real_escape_string($mysqli, $val);
}

$sql = "INSERT INTO " . $table_customer . " (`firstname`, `lastname`, `is_parent`, `is_student_adult`, `is_student_minor`, `is_relative`, `is_sibling`, `is_instructor`, `is_vol_adult`, `is_vol_minor`, `h_env_electronic`, `h_env_compsci`, `h_env_mecheng`, `password`, `referral`, `referral_other`) VALUES ('" . $escapedInsertCustomer["firstname"] . "', '" . $escapedInsertCustomer["lastname"] . "', '" . $is_parent . "', '" . $is_student_adult . "', '" . $is_student_minor . "', $is_relative, '" . $is_sibling . "', '" . $is_instructor . "', '" . $is_vol_adult . "', '" . $is_vol_minor . "', '" . $h_env_electronic . "', '" . $h_env_compsci . "', '" . $h_env_mecheng . "', '" . $escapedInsertCustomer["password"] . "', '" . $escapedInsertCustomer["referral"] . "', '" . $escapedInsertCustomer["referral_other"] . "');";


// debugger

if (!$result1 = $mysqli->query($sql)) {
    echo "Error1: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}


// $mysqli->query($sql);

$sql2 = "select max(id) from " . $table_customer . "";

// $result2 = $mysqli->query($sql2);
if (!$result2 = $mysqli->query($sql2)) {
    echo "Error2: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql2 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

while ($getTopID = $result2->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}
$sql3 = "INSERT INTO " . $table_customer_contact . " (`addr1`, `addr2`, `city`, `state`, `zipcode`, `phone1`, `phone2`, `email`, `customer_id`, `employer_name`, `position_title`, `department`, `area_of_expertise`, `work_address`, `work_city`, `work_state`, `work_zip`, `work_phone`, `work_email`, `work_notes`, `willing_to_volunteer`) VALUES ('" . $escapedInsertCustomer["addr1"] . "', '" . $escapedInsertCustomer["addr2"] . "', '" . $escapedInsertCustomer["city"] . "', '" . $escapedInsertCustomer["state"] . "', '" . $escapedInsertCustomer["zipcode"] . "', '" . $escapedInsertCustomer["phone1"] . "', '" . $escapedInsertCustomer["phone2"] . "', '" . $escapedInsertCustomer["email"] . "', " . $insertedID . ", '" . $escapedInsertCustomer["employer_name"] . "', '" . $escapedInsertCustomer["position_title"] . "', '" . $escapedInsertCustomer["department"] . "', '" . $escapedInsertCustomer["area_of_expertise"] . "', '" . $escapedInsertCustomer["work_address"] . "', '" . $escapedInsertCustomer["work_city"] . "', '" . $escapedInsertCustomer["work_state"] . "', '" . $escapedInsertCustomer["work_zip"] . "', '" . $escapedInsertCustomer["work_phone"] . "', '" . $escapedInsertCustomer["work_email"] . "', '" . $escapedInsertCustomer["work_notes"] . "', '" . $escapedInsertCustomer["willing_to_volunteer"] . "');";

// $result3 = $mysqli->query($sql3);
if (!$result3 = $mysqli->query($sql3)) {
    echo "Error3: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql3 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;

header("Location: ../index.php?custinserted=$insertedID"); /* Redirect browser */
  exit();

?>