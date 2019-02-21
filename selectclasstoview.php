<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

$sql = "SELECT id,Class_ID,Class_Name FROM " . $table . " ORDER BY id asc";
$result = $mysqli->query($sql); ?>
<h3>SELECT A CLASS TO VIEW<br />
==============
</h3>
<?php
while ($classes = $result->fetch_assoc()) {
    echo '# ' . $classes['id'] . ' | ' . $classes['Class_ID'] . ' | ' . $classes['Class_Name'] . ' | ' . '<a href=viewclass.php?id=' . $classes['id'] .'>VIEW</a>' . '<br /><br />';
}
?>
</body>