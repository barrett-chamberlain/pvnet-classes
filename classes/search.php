<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
body {
    font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;"
}
</style>
</head>
<body>
<h3>Search Results<br />=============</h3>
<a href="selectclasstoedit.php">Go back</a><br /><br />
<?php
//password auth
require('../protect-this.php');
//connect to db
include('../_includes/connect.php');
$query = $_GET['query']; 
$cleanedQuery = mysqli_real_escape_string($mysqli,$_GET['id']);
$sql = "SELECT * FROM " . $table_classes . " WHERE (`Class_Name` LIKE '%".$query."%')";
$result = $mysqli->query($sql);
// echo $sql; exit;
$i = 1;
if(mysqli_num_rows($result) > 0){
    while ($classes = $result->fetch_assoc()) {
        if($i % 2 == 0) {
            echo '<div class="classRow">';
            echo "<p><h3>".$searchResults['Class_Name']."</h3></p>";
        } else {
            echo '<div class="classRow lav">';
            echo "<p><h3>".$searchResults['Class_Name']."</h3></p>";
        } ?>
        <div class="classOptions">
        <?php echo '<a href=viewclass.php?id=' . $classes['id'] .'>VU</a>' . ' | ' . '<a href=editclass.php?id=' . $classes['id'] .'>ED</a>' . ' | ' . '<a href=duplicateclass.php?id=' . $classes['id'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?id=' . $classes['id'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $classes['id'] . '</div><div class="classID">' . $classes['Class_ID'] . '</div><div class="className">' . $classes['Class_Name'] . '</div></div>';
        $i++;
    } 
} else {
    echo 'No matching records found.';
}
?>
</body>
</html>