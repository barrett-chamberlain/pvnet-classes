<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

$sql = "SELECT id,class_id,class_name FROM classes ORDER BY id asc";

//don't forget to remove these debuggers
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
if ($result->num_rows === 0) {
    echo "No rows returned.";
    exit;
}

// $classes = $result->fetch_assoc();
while ($classes = $result->fetch_assoc()) {
    echo '<a href=editclass.php?id=' . $classes['id'] . '>Edit class info</a>' . ' ' . $classes['class_id'] . ' | ' . $classes['class_name'] . '<br /><br />';
}
?>
