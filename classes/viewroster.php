<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
.classRow {
	float: left;
    width: 100%;
    border-top: 1px solid black;
    padding: 5px 0 5px 5px;
}
.classRow.lav {
    background-color: lavender;
    -webkit-print-color-adjust: exact;
}
.fname {
    float: left;
    width: 10%;
    padding-left: 1%;
    border-right: 1px solid black;
}
.lname {
    float: left;
    width: 15%;
    padding-left: 1%;
    border-right: 1px solid black;
}
</style>
<title>View Roster</title>
</head>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

// get student ids of students enrolled in classes
$sql = "SELECT StudentID FROM " . $table_transactions . " WHERE ClassID = '" . $cleanedID . "'";
$result = $mysqli->query($sql);

// create query string to get students' names
$sql2 = "SELECT fname,lname FROM " . $table_student;
$multiple = false;

// go through students and add their ids to the query string
while ($studentIDs = $result->fetch_assoc()) {

    // add OR operator if there are multiple students, add WHERE if it is the first student
    if ($multiple) {
        $sql2 .= " OR";
    } else {
        $sql2 .= " WHERE";
        $multiple = true;
    }

    // add student ids
    $sql2 .= " id = '" . $studentIDs['StudentID'] . "'";
}

// get name of class
$sql3 = "SELECT Class_Name,Start_Time,End_Time FROM " . $table_classes . " WHERE id = '" . $cleanedID . "'";
$result3 = $mysqli->query($sql3);
$class = $result3->fetch_assoc();

// display name of class
echo '<h3>Roster For ' . $class['Class_Name'] . '</h3>';
echo '<h4>' . $class['Start_Time'] . ' - ' . $class['End_Time'] . '</h4>';

// if students are enrolled
if ($result->num_rows != 0) {

    // get students' names
    $result2 = $mysqli->query($sql2);

    // alternate color of rows
    $i = 1;
    while ($students = $result2->fetch_assoc()) {
        if($i % 2 == 0) {
	       echo '<div class="classRow">';
        } else {
	        echo '<div class="classRow lav">';
        }
        ?>

        <!-- display student names -->
        <div class="fname">
        <?php echo $students['fname'] . '</div><div class="lname"> ' . $students['lname'] . '</div></div>';
        $i++;
    }

// if no students are enrolled, display "No Students Found" message
} else {
    ?>
    <h1>No Students Found</h1>
    <?php
}
?>
</body>
</html>