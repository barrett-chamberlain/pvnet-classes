<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "DELETE FROM " . $table_customer . " WHERE id = " . $_GET['id'] . "";

//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     // echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

$result = $mysqli->query($sql);


$sql2 = "DELETE FROM " . $table_customer_contact . " WHERE customer_id = " . $_GET['id'] . "";

//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     // echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

$result2 = $mysqli->query($sql2);

header("Location: selectcustomertoedit.php?deleted=1"); /* Redirect browser */
  exit();

?>
</body>