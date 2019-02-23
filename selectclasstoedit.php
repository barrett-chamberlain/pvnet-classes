<style type="text/css">
.classRow {
	float: left;
    width: 100%;
    border-top: 1px solid black;
    padding: 5px 0 5px 5px;
}
.classRow.blue {
    background-color: powderblue;
}
.classRow.green {
    background-color: lightgreen;
}
.classOptions {
    float: left;
    width: 15%;
    border-right: 1px solid black;
}
.classRecord {
	float: left;
    width: 8%;
    padding-left: 1%;
    border-right: 1px solid black;
}
.classID {
    float: left;
    padding-left: 1%;
    border-right: 1px solid black;
    width: 13%;
}
.className {
    float: left;
    padding-left: 1%;
    width: 60%;
}
</style>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class deleted.</p><br /><br />
</div>
<?php }

$sql = "SELECT id,Class_ID,Class_Name FROM " . $table . " order by ID asc";
$result = $mysqli->query($sql); ?>
<h3>SELECT A CLASS TO MANAGE<br />
==============
</h3>
<a href="index.php">Go back</a><br /><br />
<?php
$i = 1;
while ($classes = $result->fetch_assoc()) { 
if($i % 2 == 0) {
	echo '<div class="classRow green">';
} else {
	echo '<div class="classRow blue">';
}
?>
<div class="classOptions">
<?php echo '<a href=editclass.php?id=' . $classes['id'] .'>ED</a>' . ' | ' . '<a href=duplicateclass.php?id=' . $classes['id'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>