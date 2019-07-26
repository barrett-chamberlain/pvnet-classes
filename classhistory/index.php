<style type="text/css">
.controlSpacer {
    float: left;
    width: 5%;
}
.sortRecord {
    width: 14%;
    padding-left: 1%;
    float: left;
}
.sortfn {
    float: left;
    width: 14%;
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
    width: 5%;
    border-right: 1px solid black;
}
.classRecord {
	float: left;
    width: 14%;
    padding-left: 1%;
    border-right: 1px solid black;
}
.classID {
    float: left;
    padding-left: 1%;
    border-right: 1px solid black;
    width: 14%;
}
.className {
    float: left;
    padding-left: 1%;
    width: 63%;
}
</style>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');
 
// column sorting
$sql = "SELECT * FROM " . $table_class_history . " order by id asc";
if ($_GET['record'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by id desc";
} 
if ($_GET['record'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by id asc";
} 
if ($_GET['sortfn'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by fname desc";
} 
if ($_GET['sortfn'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by fname asc";
} 
if ($_GET['sortln'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by lname desc";
} 
if ($_GET['sortln'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_class_history . " order by lname asc";
} 
$result = $mysqli->query($sql); ?>
<h3>CLASS HISTORY<br />
==============
</h3>
<div class="duplicateOptions">
        <a href="../spreadsheet/generate_spreadsheet_class_history.php">Generate a spreadsheet of all class history</a><br /><br />
        <a href="../spreadsheet/generate_spreadsheet_class_history_order_by_class.php">Generate a spreadsheet of all class history sorted by class</a><br /><br />
        <a href="../spreadsheet/generate_spreadsheet_class_history_order_by_student.php">Generate a spreadsheet of all class history sorted by student</a><br /><br />
        <br />
</div>
<a href="../index.php">Go back</a><br /><br />
<div class="sortOptions">
    <div class="controlSpacer">&nbsp;</div>
    <div class="sortRecord">
        <?php if ($_GET['record'] == "sortdesc") { ?>
            <a href="index.php?record=sortasc">SORT ↓</a>
        <?php } if ($_GET['record'] == "sortasc") { ?>
            <a href="index.php?record=sortdesc">SORT ↑</a>
        <?php } if (!isset($_GET['record'])) { ?>
            <a href="index.php?record=sortdesc">SORT</a>
        <?php } ?>
    </div>
    <div class="sortfn">
        <?php if ($_GET['sortfn'] == "sortdesc") { ?>
            <a href="index.php?sortfn=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortfn'] == "sortasc") { ?>
            <a href="index.php?sortfn=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortfn'])) { ?>
            <a href="index.php?sortfn=sortasc">SORT</a>
        <?php }?>
    </div>
    <div class="sortln">
        <?php if ($_GET['sortln'] == "sortdesc") { ?>
            <a href="index.php?sortln=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortln'] == "sortasc") { ?>
            <a href="index.php?sortln=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortln'])) { ?>
            <a href="index.php?sortln=sortasc">SORT</a>
        <?php }?>
    </div>

</div>
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
<?php echo '<a href=view.php?id=' . $classes['id'] .'>VIEW</a>' . '</div><div class="classRecord">' . $classes['fname'] . '</div><div class="classID">' . $classes['lname'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>