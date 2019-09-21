<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

echo $cleanedID;

$cleanedCustomerID = mysqli_real_escape_string($mysqli,$_GET['customerid']);
$cleanedStudentID = mysqli_real_escape_string($mysqli,$_GET['studentid']);
$cleanedClassID = mysqli_real_escape_string($mysqli,$_GET['classid']);
// echo '$cleanedCustomerID:' . $cleanedCustomerID . '<br />'; 
// echo '$cleanedStudentID' . $cleanedStudentID . '<br />'; 
// echo '$cleanedClassID' . $cleanedClassID . '<br />';
$sql="SELECT * FROM " . $table_customer . " WHERE id = " . $cleanedCustomerID . "";
$sql2="SELECT * FROM " . $table_classes . " WHERE id = " . $cleanedClassID . "";
$sql3="SELECT * FROM " . $table_student . " WHERE id = " . $cleanedStudentID . "";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
$result3 = $mysqli->query($sql3);
// echo $sql;exit;
$customerName = $result->fetch_assoc();
$className = $result2->fetch_assoc();
$studentName = $result3->fetch_assoc();
?>
<h3>INSERT TRANSACTION<br />
==============
</h3>
<form method="post" action="processinsertedtransaction.php?id=<?php echo $cleanedID;?>&customerid=<?php echo $cleanedCustomerID?>">
<input type="hidden" name="ID" value="<?php echo $transactionToInsert['ID']?>"><br />
<input type="hidden" name="cleanedCustomerID" value="<?php echo $cleanedCustomerID?>"><br />
<input type="hidden" name="cleanedStudentID" value="<?php echo $cleanedStudentID?>"><br />
<input type="hidden" name="cleanedClassID" value="<?php echo $cleanedClassID?>"><br />
Customer Name: <?php echo $customerName['firstname'] . ' ' . $customerName['lastname'] ?><br /> 
Student: <?php echo $studentName['fname'] . ' ' . $studentName['lname'] ?><br />
Class: <?php echo $className['Class_Name'] ?><br />
Paid: <input type="checkbox" name="PaidOrNot"><br />
Business Department Comments: <textarea rows="4" cols="50" name="BusinessDepartmentComments"></textarea><br />
Amount Due: <input type="Number" name="AmountDue"><br />
Amount Paid: <input type="Number" name="AmountPaid"><br />
<input type="submit"><br />
</form>
</body>