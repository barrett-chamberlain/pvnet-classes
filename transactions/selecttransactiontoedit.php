<style type="text/css">
.controlSpacer {
    float: left;
    wIDth: 15%;
}
.sortRecord {
    wIDth: 8%;
    padding-left: 1%;
    float: left;
}
.sortID {
    float: left;
    wIDth: 13%;
    padding-left: 1%;
}
.sortName {
    float: left;
    padding-left: 1%;
    wIDth: 60%;
}
.sortOptions {
    float: left;
    wIDth: 100%;
    border-top: 1px solID black;
    padding: 5px 0 5px 5px;
    font-size: 12px;
}
.classRow {
	float: left;
    wIDth: 100%;
    border-top: 1px solID black;
    padding: 5px 0 5px 5px;
}
.classRow.lav {
    background-color: lavender;
}
.classOptions {
    float: left;
    wIDth: 15%;
    border-right: 1px solID black;
}
.classRecord {
	float: left;
    wIDth: 8%;
    padding-left: 1%;
    border-right: 1px solID black;
}
.classID {
    float: left;
    padding-left: 1%;
    border-right: 1px solID black;
    wIDth: 13%;
}
.className {
    float: left;
    padding-left: 1%;
    wIDth: 60%;
}
</style>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//class deleted notification
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solID green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Transaction deleted.</p><br /><br />
</div>
<?php } ?>
<?php
// column sorting
$sql = "SELECT ID FROM " . $table_transactions . " order by ID asc";
$result = $mysqli->query($sql); ?>
<h3>SELECT A TRANSACTION TO MANAGE<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<?php
$i = 1;
while ($classes = $result->fetch_assoc()) { 
if($i % 2 == 0) {
	echo '<div class="classRow">';
} else {
	echo '<div class="classRow lav">';
}
?>
<div class="classOptions">
<?php echo '<a href=viewtransactions.php?ID=' . $classes['ID'] .'>VU</a>' . ' | ' . '<a href=edittransaction.php?ID=' . $classes['ID'] .'>ED</a>' . ' | ' . '<a href=duplicatetransaction.php?ID=' . $classes['ID'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?ID=' . $classes['ID'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $classes['ID'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>