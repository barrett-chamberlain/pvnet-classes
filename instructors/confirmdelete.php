<style type="text/css">
.controlSpacer {
    float: left;
    width: 15%;
}
.sortRecord {
    width: 8%;
    padding-left: 1%;
    float: left;
}
.sortfn {
    float: left;
    width: 13%;
    padding-left: 1%;
}
.sortln {
    float: left;
    padding-left: 1%;
    width: 60%;
}
.sortOptions {
    float: left;
    width: 100%;
    border-top: 1px solid black;
    padding: 5px 0 5px 5px;
    font-size: 12px;
}
.classRow {
	float: left;
    width: 100%;
    border-top: 1px solid black;
    padding: 5px 0 5px 5px;
}
.classRow.lav {
    background-color: lavender;
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
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT firstname,lastname FROM " . $table_customer . " WHERE id = " . $cleanedID . "";
$result = $mysqli->query($sql);
$instructor = $result->fetch_assoc();
?>

<h3>Are you sure you want to delete this instructor?<br />
==============
</h3>
<br /><br />

<a href="selectinstructortoedit.php">Go back</a> | <a href="editinstructor.php?id=<?php echo $cleanedID?>">Edit this instructor</a> | <a href="confirmdelete.php?id=<?php echo $cleanedID?>">Delete this instructor</a> <br /><br />

<h2>
<?php echo $instructor['firstname'] . " " . $instructor['lastname'] . "'s Classes:"; ?>
</h2>

<?php
$sql2 = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " WHERE instructor_id = " . $cleanedID . " order by ID asc";
$result2 = $mysqli->query($sql2);
$i = 1;
while ($classes = $result2->fetch_assoc()) {
if($i % 2 == 0) {
	echo '<div class="classRow">';
} else {
	echo '<div class="classRow lav">';
}
?>
<div class="classRecord">
<?php echo ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
<a href="deleteinstructor.php?id=<?php echo $cleanedID?>">Yes, delete this</a> <br /><br />
<a href="selectinstructortoedit.php">Go back</a>
</body>
