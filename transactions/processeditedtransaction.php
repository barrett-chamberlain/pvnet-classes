<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//escape form inputs
// include('../_includes/escape_post_vars_classes.php');

echo $cleanedID_caps_post;


var_dump(_POST);

if($_POST["PaidOrNot"] == 'on') {
	$PaidOrNot = 1;
} else {
	$PaidOrNot = 0;
}
foreach($_POST AS $key => $val) {
    $escapedEditedTransaction[$key] = mysqli_real_escape_string($mysqli, $val);
}
// print_r($escapedEditedTransaction);
// exit;

//update table with escaped form values
$sql = "update " . $table_transactions . " set StudentID = '" . $escapedEditedTransaction["StudentID"] . "', ClassID = '" . $escapedEditedTransaction["ClassID"] . "', TimeSignedUp = '" . $escapedEditedTransaction["TimeSignedUp"] . "', PaidOrNot = " . $PaidOrNot . ", BusinessDepartmentComments = '" . $escapedEditedTransaction["BusinessDepartmentComments"] . "', AmountDue = " . $escapedEditedTransaction["AmountDue"] . ", AmountPaid = " . $escapedEditedTransaction["AmountPaid"] . " where ID = '" . $cleanedID_caps_post . "'";


// $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

header("Location: edittransaction.php?ID=" . $cleanedID_caps_post . "&edited=1"); /* Redirect browser */
  exit();

?>