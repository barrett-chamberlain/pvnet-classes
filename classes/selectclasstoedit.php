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
.sortID {
    float: left;
    width: 13%;
    padding-left: 1%;
}
.sortName {
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

//class deleted notification
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class deleted.</p><br /><br />
</div>

<?php 
// column sorting
}
$sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by ID asc";
if ($_GET['record'] == "sortdesc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by id desc";
} 
if ($_GET['record'] == "sortasc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by ID asc";
} 
if ($_GET['sortid'] == "sortdesc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by Class_ID desc";
} 
if ($_GET['sortid'] == "sortasc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by Class_ID asc";
} 
if ($_GET['sortname'] == "sortdesc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by Class_Name desc";
} 
if ($_GET['sortname'] == "sortasc") {
    $sql = "SELECT id,Class_ID,Class_Name FROM " . $table_classes . " order by Class_Name asc";
} 
$result = $mysqli->query($sql); ?>
<h3>SELECT A CLASS TO MANAGE<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<div class="sortOptions">
    <div class="controlSpacer">&nbsp;</div>
    <div class="sortRecord">
        <?php if ($_GET['record'] == "sortdesc") { ?>
            <a href="selectclasstoedit.php?record=sortasc">SORT ↓</a>
        <?php } if ($_GET['record'] == "sortasc") { ?>
            <a href="selectclasstoedit.php?record=sortdesc">SORT ↑</a>
        <?php } if (!isset($_GET['record'])) { ?>
            <a href="selectclasstoedit.php?record=sortdesc">SORT</a>
        <?php } ?>
    </div>
    <div class="sortID">
        <?php if ($_GET['sortid'] == "sortdesc") { ?>
            <a href="selectclasstoedit.php?sortid=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortid'] == "sortasc") { ?>
            <a href="selectclasstoedit.php?sortid=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortid'])) { ?>
            <a href="selectclasstoedit.php?sortid=sortasc">SORT</a>
        <?php }?>
    </div>
    <div class="sortName">
        <?php if ($_GET['sortname'] == "sortdesc") { ?>
            <a href="selectclasstoedit.php?sortname=sortasc">SORT ↓</a>
        <?php } if ($_GET['sortname'] == "sortasc") { ?>
            <a href="selectclasstoedit.php?sortname=sortdesc">SORT ↑</a>
        <?php } if(!isset($_GET['sortname'])) { ?>
            <a href="selectclasstoedit.php?sortname=sortasc">SORT</a>
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
<?php echo '<a href=viewclass.php?id=' . $classes['id'] .'>VU</a>' . ' | ' . '<a href=editclass.php?id=' . $classes['id'] .'>ED</a>' . ' | ' . '<a href=duplicateclass.php?id=' . $classes['id'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>