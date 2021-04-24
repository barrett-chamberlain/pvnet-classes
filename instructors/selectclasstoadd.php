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

// column sorting
$sql = "SELECT * FROM " . $table_classes . " order by id asc";
if ($_GET['record'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_classes . " order by id desc";
}
if ($_GET['record'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_classes . " order by id asc";
}
if ($_GET['sortfn'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_classes . " order by firstname desc";
}
if ($_GET['sortfn'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_classes . " order by firstname asc";
}
if ($_GET['sortln'] == "sortdesc") {
    $sql = "SELECT * FROM " . $table_classes . " order by lastname desc";
}
if ($_GET['sortln'] == "sortasc") {
    $sql = "SELECT * FROM " . $table_classes . " order by lastname asc";
}
$result = $mysqli->query($sql); ?>
<h3>SELECT A CLASS FOR THE INSTRUCTOR<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search by customer name" />
</form>
<div class="sortOptions">
    <div class="controlSpacer">&nbsp;</div>
    <div class="sortRecord">
        <?php if ($_GET['record'] == "sortdesc") {
            echo '<a href="selectinstructor.php?record=sortasc&id=' . $_GET['id'] . '">SORT ↓</a>';
        } if ($_GET['record'] == "sortasc") {
            echo '<a href="selectinstructor.php?record=sortdesc&id=' . $_GET['id'] . '">SORT ↑</a>';
        } if (!isset($_GET['record'])) {
            echo '<a href="selectinstructor.php?record=sortdesc&id=' . $_GET['id'] . '">SORT</a>';
        } ?>
    </div>
    <div class="sortfn">
        <?php if ($_GET['sortfn'] == "sortdesc") {
            echo '<a href="selectinstructor.php?sortfn=sortasc&id=' . $_GET['id'] . '">SORT ↓</a>';
        } if ($_GET['sortfn'] == "sortasc") {
            echo '<a href="selectinstructor.php?sortfn=sortdesc&id=' . $_GET['id'] . '">SORT ↑</a>';
        } if(!isset($_GET['sortfn'])) {
            echo '<a href="selectinstructor.php?sortfn=sortasc&id=' . $_GET['id'] . '">SORT</a>';
        }?>
    </div>
    <div class="sortln">
        <?php if ($_GET['sortln'] == "sortdesc") {
            echo '<a href="selectinstructor.php?sortln=sortasc&id=' . $_GET['id'] . '">SORT ↓</a>';
        } if ($_GET['sortln'] == "sortasc") {
            echo '<a href="selectinstructor.php?sortln=sortdesc&id=' . $_GET['id'] . '">SORT ↑</a>';
        } if(!isset($_GET['sortln'])) {
            echo '<a href="selectinstructor.php?sortln=sortasc&id=' . $_GET['id'] . '">SORT</a>';
        }?>
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
<?php echo '<a href=addclass.php?classid=' . $classes['id'] . '&instructorid=' . $_GET['id'] . '>SELECT</a></div><div class="classRecord">' . ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>