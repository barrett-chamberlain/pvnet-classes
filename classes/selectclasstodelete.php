<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " ORDER BY id asc";
// $result = $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}
 ?>
<h3>SELECT A CLASS TO DELETE<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<?php
while ($classes = $result->fetch_assoc()) {
    echo '# ' . $classes['id'] . ' | ' . $classes['Class_ID'] . ' | ' . $classes['Class_Name'] . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] .'>DELETE</a>' . '<br /><br />';
}
?>
</body>