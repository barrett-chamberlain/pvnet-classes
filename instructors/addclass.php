<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//escape form inputs
// include('../_includes/escape_post_vars_classes.php');

// print_r($escapedEditedClass);
// exit;

//update table with escaped form values
$sql = "update " . $table_classes . " set instructor_id = '" . $_GET["instructorid"] . "' where id = '" . $_GET["classid"] . "'";
$sql2 = "update " . $table_assignments . " set instructor_id = '" . $_GET["instructorid"] . "' where class_id = '" . $_GET["classid"] . "'";
$sql3 = "update " . $table_submissions . " set instructor_id = '" . $_GET["instructorid"] . "' where class_id = '" . $_GET["classid"] . "'";

// $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

// $mysqli->query($sql);
if (!$result2 = $mysqli->query($sql2)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

// $mysqli->query($sql);
if (!$result3 = $mysqli->query($sql3)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

header("Location: viewinstructor.php?id=" . $_GET["instructorid"]); /* Redirect browser */
  exit();

?>