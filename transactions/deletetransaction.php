<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php

//processes deletion of row of ID passed from confirmdelete.php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "DELETE FROM " . $table_transactions . " WHERE ID = " . $cleanedID_caps . "";
//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     // echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

$result = $mysqli->query($sql);

header("Location: selecttransactiontoedit.php?deleted=1"); /* Redirect browser */
  exit();

?>
</body>