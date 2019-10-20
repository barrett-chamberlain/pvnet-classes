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

//student deleted notification
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Student deleted.</p><br /><br />
</div>

<?php 
// column sorting
}
$sql = "SELECT * FROM " . $table_student . " order by id asc";
if ($_GET['record'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_student . " order by id desc";
} 
if ($_GET['record'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_student . " order by id asc";
} 
if ($_GET['sortfn'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_student . " order by fname desc";
} 
if ($_GET['sortfn'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_student . " order by fname asc";
} 
if ($_GET['sortln'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_student . " order by lname desc";
} 
if ($_GET['sortln'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_student . " order by lname asc";
} 
$result = $mysqli->query($sql); ?>
<h3>SELECT A STUDENT TO MANAGE<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search by student name" />
</form>
<div class="sortOptions">
    <div class="controlSpacer">&nbsp;</div>
    <div class="sortRecord">
        <?php if ($_GET['record'] == "sortdesc") { ?>
            <a href="selectstudenttoedit.php?record=sortasc">SORT ↓</a>
        <?php } if ($_GET['record'] == "sortasc") { ?>
            <a href="selectstudenttoedit.php?record=sortdesc">SORT ↑</a>
        <?php } if (!isset($_GET['record'])) { ?>
            <a href="selectstudenttoedit.php?record=sortdesc">SORT</a>
        <?php } ?>
    </div>
    <div class="sortfn">
        <?php if ($_GET['sortfn'] == "sortdesc") { ?>
            <a href="selectstudenttoedit.php?sortfn=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortfn'] == "sortasc") { ?>
            <a href="selectstudenttoedit.php?sortfn=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortfn'])) { ?>
            <a href="selectstudenttoedit.php?sortfn=sortasc">SORT</a>
        <?php }?>
    </div>
    <div class="sortln">
        <?php if ($_GET['sortln'] == "sortdesc") { ?>
            <a href="selectstudenttoedit.php?sortln=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortln'] == "sortasc") { ?>
            <a href="selectstudenttoedit.php?sortln=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortln'])) { ?>
            <a href="selectstudenttoedit.php?sortln=sortasc">SORT</a>
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
<?php echo '<a href=viewstudent.php?id=' . $classes['id'] .'>VU</a>' . ' | ' . '<a href=editstudent.php?id=' . $classes['id'] .'>ED</a>' . ' | ' . '<a href=duplicatestudent.php?id=' . $classes['id'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['fname'] . '</div><div class="className">' . $classes['lname'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>