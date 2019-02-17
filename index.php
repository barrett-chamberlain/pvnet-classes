<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

$sql = "SELECT id,class_id,class_name FROM classes ORDER BY id asc";

//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why: \n";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "\n";
//     echo "Error: " . $mysqli->error . "\n";
//     exit;
// }
// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }

$result = $mysqli->query($sql);

if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class deleted.</p><br /><br />
</div>
<?php } 
if ($_GET['edited'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class edited.</p><br /><br />
</div>
<?php } 
if ($_GET['inserted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class inserted.</p><br /><br />
</div>
<?php } ?>
<a href="insertclass.php">Insert new class</a><br /><br />
<?php while ($classes = $result->fetch_assoc()) {
    echo '# ' . $classes['id'] . ' ' . '<a href=editclass.php?id=' . $classes['id'] . '>EDIT</a>' . ' | ' . $classes['class_id'] . ' | ' . $classes['class_name'] . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] . '># DELETE #</a>' . '<br /><br />';
}
?>
</body>