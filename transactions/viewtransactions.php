<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT * FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
$result = $mysqli->query($sql);

//queries for prev/next viewing
$sql4 = "select max(ID) from " . $table_transactions . "";
$result4 = $mysqli->query($sql4);
$sql5 = "select min(ID) from " . $table_transactions . "";
$result5 = $mysqli->query($sql5);
while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(ID)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(ID)"];
}
$sql3 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
$result3 = $mysqli->query($sql3);

//increment/decrement ID and rerun query until record found for prev/next links
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        $cleanedID_caps--;
        $sql3 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        $cleanedID_caps++;
        $sql3 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
        $result3 = $mysqli->query($sql3);
    }

//re-establish SQL statement with found valid ID
$sql = "SELECT * FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
$result = $mysqli->query($sql);
$nextTransaction = $cleanedID_caps + 1;
$prevTransaction = $cleanedID_caps - 1;

while ($transactionToView = $result->fetch_assoc()) { ?>
<h3>VIEWING RECORD: #<?php echo $transactionToView['ID']?><br />
==============
</h3>
<?php if($cleanedID_caps == $minID) { } else { ?>
	<a href="viewclass.php?id=<?php echo $prevTransaction?>&prev=1">View previous class</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID_caps == $maxID) { } else { ?>
<a href="viewclass.php?id=<?php echo $nextTransaction?>&next=1">View next class</a><?php } ?>
<br /><br />
<p>
Transaction ID: <?php echo $transactionToView['ID']?><br />
Class ID: <?php echo $transactionToView['ClassID']?><br />
Student ID: <?php echo $transactionToView['StudentID']?><br /><br />
<a href="../index.php">Go back</a> | <a href="edittransaction.php?ID=<?php echo $transactionToView['ID']?>">Edit this transaction</a> | <a href="duplicatetransaction.php?ID=<?php echo $transactionToView['ID']?>">Duplicate this transaction</a> | <a href="confirmdelete.php?ID=<?php echo $transactionToView['ID']?>">Delete this transaction</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="ID" value="<?php echo $transactionToView['ID']?>"><br />
Student ID: <input disabled type="number" size="50" name="StudentID" value="<?php echo $transactionToView['StudentID']?>"><br />
Class ID: <input disabled type="number" size="50" name="ClassID" value="<?php echo $transactionToView['ClassID']?>"><br />
Time Signed Up: <input disabled type="text" name="TimeSignedUp" value="<?php echo $transactionToView['TimeSignedUp']?>"><br />
Paid Or Not: <input disabled type="checkbox" name="PaidOrNot" <?php if($transactionToView['PaidOrNot'] == 1){echo "checked";}?>><br />
Business Department Comments: <input disabled type="text" size="50" name="BusinessDepartmentComments" value="<?php echo $transactionToView['BusinessDepartmentComments']?>"><br />
Amount Due: <input disabled type="Number" name="AmountDue" value="<?php echo $transactionToView['AmountDue']?>"><br />
Amount Paid: <input disabled type="Number" name="AmountPaid" value="<?php echo $transactionToView['AmountPaid']?>"><br />
</form>
<?php } ?>
<a href="selecttransactiontoedit.php">Go back</a><br /><br />

</body>