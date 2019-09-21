<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php

//display confirmation page with form inputs disabled so someone doesn't accidentally delete a record.

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT * FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
//debugger
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
if ($result->num_rows === 0) {
    echo "No rows returned.";
    exit;
}

$transactionToEdit = $result->fetch_assoc(); 
$sql2 = "SELECT * FROM " . $table_student . " where id = " . $transactionToEdit['StudentID'] . "";
$result2 = $mysqli->query($sql2);
$student = $result2->fetch_assoc(); 
$sql3 = "SELECT * FROM " . $table_classes . " where id = " . $transactionToEdit['ClassID'] . "";
$result3 = $mysqli->query($sql3);
$class = $result3->fetch_assoc();
?>

<p style="font-weight: bold; color: red;">Are you sure you wish to delete this transaction?</p>

<h3>TRANSACTION ID #<?php echo $transactionToEdit['ID']?></h3>
<p>Class Name: <?php echo $class['Class_Name']?><br />
Student Name: <?php echo $student['fname'] . ' ' . $student['lname']?><br />
</p>
<form>
<input type="hidden" name="ID" value="<?php echo $transactionToEdit['ID']?>"><br />
Transaction ID: <input disabled type="text" name="ID" value="<?php echo $transactionToEdit['ID']?>"><br />
Class ID: <input disabled type="number" size="50" name="ClassID" value="<?php echo $transactionToEdit['ClassID']?>"><br />
Class Name: <?php echo $class['Class_Name']?><br />
Student ID: <input disabled type="number" size="50" name="StudentID" value="<?php echo $transactionToEdit['StudentID']?>"><br />
Student Name: <?php echo $student['fname'] . ' ' . $student['lname']?><br />
Time Signed Up: <input disabled type="text" name="TimeSignedUp" value="<?php echo $transactionToEdit['TimeSignedUp']?>"><br />
Paid Or Not: <input disabled type="checkbox" name="PaidOrNot" <?php if($transactionToEdit['PaidOrNot'] == 1){echo "checked";}?>><br />
Business Department Comments: <textarea disabled name="BusinessDepartmentComments">
<?php echo $transactionToEdit['BusinessDepartmentComments']?>    
</textarea><br />
Amount Due: <input disabled type="Number" name="AmountDue" value="<?php echo $transactionToEdit['AmountDue']?>"><br />
Amount Paid: <input disabled type="Number" name="AmountPaid" value="<?php echo $transactionToEdit['AmountPaid']?>"><br />
</form>
<a href="deletetransaction.php?ID=<?php echo $cleanedID_caps ?>">Yes, delete this transaction</a><br /><br />

<a href="../index.php">Go back</a><br /><br />

</body>