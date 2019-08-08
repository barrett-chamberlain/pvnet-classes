<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//get class selected for editing
$sql = "SELECT * FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";

//get upper limit for next class link
$sql4 = "select max(ID) from " . $table_transactions . "";
$result4 = $mysqli->query($sql4);

//get lower limit for prev class link
$sql5 = "select min(ID) from " . $table_transactions . "";
$result5 = $mysqli->query($sql5);

while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(ID)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(ID)"];
}

//display banner at top of page if action has been completed
if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Transaction duplicated.</p><br /><br />
</div> <?php }
if (isset($_GET['edited'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Transaction edited.</p><br /><br />
</div>
<?php } 

$result = $mysqli->query($sql);

$sql2 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
$result2 = $mysqli->query($sql2);

//increment/decrement ID and rerun query until record found for prev/next links
while($result2->num_rows === 0 and $_GET['prev'] == 1)
    {
        $cleanedID_caps--;
        $sql2 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
        $result2 = $mysqli->query($sql2);
    }
while($result2->num_rows === 0 and $_GET['next'] == 1)
    {
        $cleanedID_caps++;
        $sql2 = "SELECT ID FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
        $result2 = $mysqli->query($sql2);
    }
//re-establish SQL statement with found valid ID
$sql = "SELECT * FROM " . $table_transactions . " where ID = '" . $cleanedID_caps . "'";
// echo $sql;
// exit;
$result = $mysqli->query($sql);

$nextTransaction = $cleanedID_caps + 1;
$prevTransaction = $cleanedID_caps - 1;

// echo 'clean' . $cleanedID_caps;

//list out input fields with DB info set for values
while ($transactionToEdit = $result->fetch_assoc()) { ?>
<h3>EDITING TRANSACTION: #<?php echo $transactionToEdit['ID']?><br />
==============
</h3>
<?php if($cleanedID_caps == $minID) { } else { ?>
	<a href="edittransaction.php?ID=<?php echo $prevTransaction?>&prev=1">Edit previous transaction</a><?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID_caps == $maxID) { } else { ?>
<a href="edittransaction.php?ID=<?php echo $nextTransaction?>&next=1">
Edit next transaction</a><?php } ?>
<br /><br />
<a href="selecttransactiontoedit.php">Go back</a> | <a href="confirmdelete.php?ID=<?php echo $transactionToEdit['ID']?>">Delete this transaction</a><br /><br />
<form method="post" action="processeditedtransaction.php">
<input type="submit"><br />
<input type="hidden" name="ID" value="<?php echo $transactionToEdit['ID']?>"><br />
Student ID: <input type="number" size="50" name="StudentID" value="<?php echo $transactionToEdit['StudentID']?>"><br />
Class ID: <input type="number" size="50" name="ClassID" value="<?php echo $transactionToEdit['ClassID']?>"><br />
Time Signed Up: <input type="text" name="TimeSignedUp" value="<?php echo $transactionToEdit['TimeSignedUp']?>"><br />
Paid Or Not: <input type="checkbox" name="PaidOrNot" <?php if($transactionToEdit['PaidOrNot'] == 1){echo "checked";}?>><br />
Business Department Comments: <input type="text" size="50" name="BusinessDepartmentComments" value="<?php echo $transactionToEdit['BusinessDepartmentComments']?>"><br />
Amount Due: <input type="Number" name="AmountDue" value="<?php echo $transactionToEdit['AmountDue']?>"><br />
Amount Paid: <input type="Number" name="AmountPaid" value="<?php echo $transactionToEdit['AmountPaid']?>"><br />
</form>
<?php } ?>
</body>