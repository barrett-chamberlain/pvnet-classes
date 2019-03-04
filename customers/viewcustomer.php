<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
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

$sql4 = "select max(id) from " . $table_customer . "";

$result4 = $mysqli->query($sql4);

$sql5 = "select min(id) from " . $table_customer . "";

$result5 = $mysqli->query($sql5);

while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(id)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(id)"];
}

$sql = "SELECT * FROM " . $table_customer . " where id = '" . $_GET['id'] . "'";

$result = $mysqli->query($sql);

$sql2 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $_GET['id'] . "'";

$result2 = $mysqli->query($sql2);

$sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $_GET['id'] . "'";
$result3 = $mysqli->query($sql3);
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        // echo $_GET['id'] . ' gives no results' . '<br />';
        $_GET['id']--;
        // echo 'decrement: ' . $_GET['id'] . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $_GET['id'] . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        // echo $_GET['id'] . ' gives no results' . '<br />';
        $_GET['id']++;
        // echo 'decrement: ' . $_GET['id'] . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $_GET['id'] . "'";
        $result3 = $mysqli->query($sql3);
    }
    // echo 'final set: ' . $_GET['id'];
$sql = "SELECT * FROM " . $table_customer . " where id = '" . $_GET['id'] . "'";
$result = $mysqli->query($sql);
$nextCustomer = $_GET['id'] + 1;
$prevCustomer = $_GET['id'] - 1;


while ($customerToEdit = $result->fetch_assoc()) { ?>

<h3>VIEWING CUSTOMER: #<?php echo $customerToEdit['id']?><br />
==============
</h3>
<?php if($_GET['id'] == $minID) { } else { ?>
	<a href="viewcustomer.php?id=<?php echo $prevCustomer?>&prev=1">View previous customer</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($_GET['id'] == $maxID) { } else { ?>
<a href="viewcustomer.php?id=<?php echo $nextCustomer?>&next=1">View next customer</a><?php } ?>
<br /><br />
<p>
Customer ID: <?php echo $customerToEdit['id']?><br />
Customer First Name: <?php echo $customerToEdit['firstname']?><br />
Customer Last Name: <?php echo $customerToEdit['lastname']?><br /><br />
<a href="../index.php">Go back</a> | <a href="editcustomer.php?id=<?php echo $customerToEdit['id']?>">Edit this customer</a> | <a href="duplicatecustomer.php?id=<?php echo $customerToEdit['id']?>">Duplicate this customer</a> | <a href="confirmdelete.php?id=<?php echo $customerToEdit['id']?>">Delete this customer</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $customerToEdit['id']?>">
First Name: <input size="50" disabled required="required" type="text" name="firstname" value="<?php echo $customerToEdit['firstname']?>"><br />
Last Name: <input size="50" disabled required="required" type="text" name="lastname" value="<?php echo $customerToEdit['lastname']?>"><br />

<?php }
while ($customercontToEdit = $result2->fetch_assoc()) { ?>
Address Line 1: <input size="50" disabled required="required" type="text" name="addr1" value="<?php echo $customercontToEdit['addr1']?>"><br />
Address Line 2: <input size="50" disabled required="required" type="text" name="addr2" value="<?php echo $customercontToEdit['addr2']?>"><br />
City: <input size="50" disabled required="required" type="text" name="city" value="<?php echo $customercontToEdit['city']?>"><br />
State: <input size="50" disabled required="required" type="text" name="state" value="<?php echo $customercontToEdit['state']?>"><br />
Zip Code: <input size="50" disabled type="number" name="zipcode" value="<?php echo $customercontToEdit['zipcode']?>"><br />
Phone 1: <input size="50" disabled required="required" type="number" name="phone1" value="<?php echo $customercontToEdit['phone1']?>"><br />
Phone 2: <input size="50" disabled required="required" type="number" name="phone2" value="<?php echo $customercontToEdit['phone2']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $customercontToEdit['email']?>"><br />
<?php } ?>
</form>

<a href="../index.php">Go back</a><br /><br />

</body>