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

while ($transactionToEdit = $result->fetch_assoc()) { ?>

<p style="font-weight: bold; color: red;">Are you sure you wish to delete this transaction?</p>

<h3>TRANSACTION ID #<?php echo $transactionToEdit['ID']?></h3>

<form>
<input type="hidden" name="ID" value="<?php echo $transactionToEdit['ID']?>"><br />
Transaction ID: <input disabled type="text" name="ID" value="<?php echo $transactionToEdit['ID']?>"><br />
Class ID: <input type="number" size="50" name="ClassID" value="<?php echo $transactionToEdit['ClassID']?>"><br />
Time Signed Up: <input type="text" name="TimeSignedUp" value="<?php echo $transactionToEdit['TimeSignedUp']?>"><br />
Paid Or Not: <input type="checkbox" name="PaidOrNot" <?php if($transactionToEdit['PaidOrNot'] == 1){echo "checked";}?>><br />
Business Department Comments: <input type="text" size="50" name="BusinessDepartmentComments" value="<?php echo $transactionToEdit['BusinessDepartmentComments']?>"><br />
Amount Due: <input type="Number" name="AmountDue" value="<?php echo $transactionToEdit['AmountDue']?>"><br />
Amount Paid: <input type="Number" name="AmountPaid" value="<?php echo $transactionToEdit['AmountPaid']?>"><br />
</form>

<?php } ?>
<a href="deletetransaction.php?ID=<?php echo $cleanedID_caps ?>">Yes, delete this transaction</a><br /><br />

<a href="../index.php">Go back</a><br /><br />

</body>