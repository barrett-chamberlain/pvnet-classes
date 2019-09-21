<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<style type="text/css">
    .roleBox {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
</style>
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');


//don't forget to remove these debuggers
// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why: \n";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "\n";
//     echo "Error: " . $mysqli->error . "\n";
//     exit;
// }
// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }

//don't forget to remove these debuggers
// if (!$result2 = $mysqli->query($sql2)) {
//     echo "Error2: Our query failed to execute and here is why: \n";
//     echo "Query: " . $sql2 . "\n";
//     echo "Errno: " . $mysqli->errno . "\n";
//     echo "Error: " . $mysqli->error . "\n";
//     exit;
// }
// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }

$sql4 = "select max(id) from " . $table_student . "";

$result4 = $mysqli->query($sql4);

$sql5 = "select min(id) from " . $table_student . "";

$result5 = $mysqli->query($sql5);

while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(id)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(id)"];
}

$sql = "SELECT * FROM " . $table_student . " where id = '" . $cleanedID . "'";

$result = $mysqli->query($sql);

$sql3 = "SELECT id FROM " . $table_student . " where id = '" . $cleanedID . "'";
$result3 = $mysqli->query($sql3);
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID--;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_student . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID++;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_student . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
    // echo 'final set: ' . $cleanedID;
$sql = "SELECT * FROM " . $table_student . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);
$nextstudent = $cleanedID + 1;
$prevstudent = $cleanedID - 1;
$studentToEdit = $result->fetch_assoc(); ?>

<h3>VIEWING STUDENT: #<?php echo $studentToEdit['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="viewstudent.php?id=<?php echo $prevstudent?>&prev=1">View previous student</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
<a href="viewstudent.php?id=<?php echo $nextstudent?>&next=1">View next student</a><?php } ?>
<br /><br />
<p>
Student ID: <?php echo $studentToEdit['id']?><br />
Student Name: <?php echo $studentToEdit['fname'] . ' ' . $studentToEdit['lname']?><br />
<br /><br />

<a href="../index.php">Go back</a> | <a href="editstudent.php?id=<?php echo $studentToEdit['id']?>">Edit this student</a> | <a href="duplicatestudent.php?id=<?php echo $studentToEdit['id']?>">Duplicate this student</a> | <a href="confirmdelete.php?id=<?php echo $studentToEdit['id']?>">Delete this student</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $studentToEdit['id']?>">
First Name: <input size="50" disabled type="text" name="firstname" value="<?php echo $studentToEdit['fname']?>"><br />
Last Name: <input size="50" disabled type="text" name="lastname" value="<?php echo $studentToEdit['lname']?>"><br />
Date of Birth: <input disabled type="date" name="dob" value="<?php echo $studentToEdit['dob']?>"><br />
Grade Level: <input size="50" disabled type="text" name="gradelevel" value="<?php echo $studentToEdit['gradelevel']?>"><br />
Grade Level Date: <input disabled type="date" name="gradeleveldate" value="<?php echo $studentToEdit['gradeleveldate']?>"><br />
School: <input size="50" disabled type="text" name="school" value="<?php echo $studentToEdit['school']?>"><br />
Gender: <input size="50" disabled type="text" name="gender" value="<?php echo $studentToEdit['gender']?>"><br />
Cell Phone: <input size="50" disabled type="number" name="cell_phone" value="<?php echo $studentToEdit['cell_phone']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $studentToEdit['email']?>"><br />
Linked Customer: <input size="50" disabled type="number" name="linkedcustomer" value="<?php echo $studentToEdit['linkedcustomer']?>"><br />
Internship Start Date: <input disabled type="date" name="internship_start_date" value="<?php echo $studentToEdit['internship_start_date']?>"><br />
Internship End Date: <input disabled type="date" name="internship_end_date" value="<?php echo $studentToEdit['internship_end_date']?>"><br />
<div class="roleBox">
    Student is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($studentToEdit['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($studentToEdit['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($studentToEdit['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($studentToEdit['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($studentToEdit['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($studentToEdit['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($studentToEdit['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($studentToEdit['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
    Intern: <input disabled type="checkbox" <?php if($studentToEdit['is_Intern'] == 1){echo "checked";}?> name="is_Intern"><br />
</div>
</form>
<?php 
$sql2 = "SELECT * FROM " . $table_customer . " where id = '" . $studentToEdit['linkedcustomer'] . "'";
$result2 = $mysqli->query($sql2); ?>
<h3>LINKED CUSTOMER<br />
========================</h3>
<?php $students_customer = $result2->fetch_assoc() ?>
Name: <?php echo $students_customer['firstname'] . ' ' . $students_customer['lastname']?> 
| <a href="../customers/viewcustomer.php?id=<?php echo $studentToEdit['linkedcustomer'] ?>">View customer</a>
<br /><br />
<a href="../index.php">Go back</a><br /><br />

</body>