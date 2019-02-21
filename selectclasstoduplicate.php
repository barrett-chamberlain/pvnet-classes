<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

$sql = "SELECT id,Class_ID,Class_Name FROM " . $table . " ORDER BY id asc";
$result = $mysqli->query($sql); ?>
<h3>SELECT A CLASS TO DUPLICATE<br />
==============
</h3>
<a href="index.php">Go back</a><br /><br />
<?php
while ($classes = $result->fetch_assoc()) {
    echo '# ' . $classes['id'] . ' | ' . $classes['Class_ID'] . ' | ' . $classes['Class_Name'] . ' | ' . '<a href=duplicateclass.php?id=' . $classes['id'] .'>DUPLICATE</a>' . '<br /><br />';
}
?>
</body>