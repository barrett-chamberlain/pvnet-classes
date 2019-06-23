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

$sql = "SELECT * FROM " . $table_customer . " where id = '" . $cleanedID . "'";

// $result = $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}

$sql2 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";

// $result2 = $mysqli->query($sql2);
if (!$result2 = $mysqli->query($sql2)) {
    include('../_includes/send_error.php');
    exit;
}

// echo '$cleanedID ' . $cleanedID . '<br />'; 

// echo '$sql2 ' . $sql2 . '<br />';

// echo '$sql ' . $sql . '<br />';



$sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
// $result3 = $mysqli->query($sql3);
if (!$result3 = $mysqli->query($sql3)) {
    include('../_includes/send_error.php');
    exit;
}
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID--;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
        $sql4 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
        $result4 = $mysqli->query($sql4);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID++;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
        $sql4 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
        $result4 = $mysqli->query($sql4);
    }
    // echo 'final set: ' . $cleanedID;
$sql = "SELECT * FROM " . $table_customer . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);
$sql2 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";
$result2 = $mysqli->query($sql2);
$nextCustomer = $cleanedID + 1;
$prevCustomer = $cleanedID - 1;

if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
    <img style="float: left" src="../checkmark.png" />
    <p style="float: left; margin: 0px 5px;">Customer duplicated.</p><br /><br />
</div> <?php }
if (isset($_GET['edited'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
    <img style="float: left" src="../checkmark.png" />
    <p style="float: left; margin: 0px 5px;">Customer edited.</p><br /><br />
</div>
<?php } 

while ($customerToEdit = $result->fetch_assoc()) { ?>

<h3>EDITING CUSTOMER: #<?php echo $customerToEdit['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="editcustomer.php?id=<?php echo $prevCustomer?>&prev=1">View previous customer</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
<a href="editcustomer.php?id=<?php echo $nextCustomer?>&next=1">View next customer</a><?php } ?>
<br /><br />
<p>
Customer ID: <?php echo $customerToEdit['id']?><br />
Customer First Name: <?php echo $customerToEdit['firstname']?><br />
Customer Last Name: <?php echo $customerToEdit['lastname']?><br /><br />
<a href="../index.php">Go back</a> | <a href="duplicatecustomer.php?id=<?php echo $customerToEdit['id']?>">Duplicate this customer</a> | <a href="confirmdelete.php?id=<?php echo $customerToEdit['id']?>">Delete this customer</a><br /><br />
</p>

<form method="post" action="processeditedcustomer.php">
<input type="submit"><br /><br />
<input  type="hidden" name="dbid" value="<?php echo $customerToEdit['id']?>">
First Name: <input size="50"  required="required" type="text" name="firstname" value="<?php echo $customerToEdit['firstname']?>"><br />
Last Name: <input size="50"  required="required" type="text" name="lastname" value="<?php echo $customerToEdit['lastname']?>"><br />
<div class="roleBox">
    Customer is a...<br /><br />
    Parent: <input  type="checkbox" <?php if($customerToEdit['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input  type="checkbox" <?php if($customerToEdit['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input  type="checkbox" <?php if($customerToEdit['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input  type="checkbox" <?php if($customerToEdit['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input  type="checkbox" <?php if($customerToEdit['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input  type="checkbox" <?php if($customerToEdit['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input  type="checkbox" <?php if($customerToEdit['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input  type="checkbox" <?php if($customerToEdit['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
</div>
<?php }
while ($customercontToEdit = $result2->fetch_assoc()) { ?>
Address Line 1: <input size="50" type="text" name="addr1" value="<?php echo $customercontToEdit['addr1']?>"><br />
Address Line 2: <input size="50" type="text" name="addr2" value="<?php echo $customercontToEdit['addr2']?>"><br />
City: <input size="50" type="text" name="city" value="<?php echo $customercontToEdit['city']?>"><br />
State: <input size="50" type="text" name="state" value="<?php echo $customercontToEdit['state']?>"><br />
Zip Code: <input size="50" type="number" name="zipcode" value="<?php echo $customercontToEdit['zipcode']?>"><br />
Phone 1: <input size="50" type="number" name="phone1" value="<?php echo $customercontToEdit['phone1']?>"><br />
Phone 2: <input size="50" type="number" name="phone2" value="<?php echo $customercontToEdit['phone2']?>"><br />
Email Address: <input size="50"  type="email" name="email" value="<?php echo $customercontToEdit['email']?>"><br />
Employer Name: <input size="50" type="text" name="employer_name" value="<?php echo $customercontToEdit['employer_name']?>"><br />
Position Title: <input size="50" type="text" name="position_title" value="<?php echo $customercontToEdit['position_title']?>"><br />
Department: <input size="50" type="text" name="department" value="<?php echo $customercontToEdit['department']?>"><br />
Area of Expertise: <input size="50" type="text" name="area_of_expertise" value="<?php echo $customercontToEdit['area_of_expertise']?>"><br />
Work Address: <input size="50" type="text" name="work_address" value="<?php echo $customercontToEdit['work_address']?>"><br />
Work City: <input size="50" type="text" name="work_city" value="<?php echo $customercontToEdit['work_city']?>"><br />
<?php include('../_includes/work_state_conditional.php'); ?>
Work Zip Code: <input size="50" type="number" name="work_zip" value="<?php echo $customercontToEdit['work_zip']?>"><br />
Work Phone: <input size="50" type="number" name="work_phone" value="<?php echo $customercontToEdit['work_phone']?>"><br />
Work Email: <input size="50" type="email" name="work_email" value="<?php echo $customercontToEdit['work_email']?>"><br />
Work Notes: <textarea rows="4" cols="50" name="work_notes"><?php echo $customercontToEdit['work_notes']?></textarea><br />
Willingness to Volunteer: <select name="willing_to_volunteer">
<?php
switch ($customercontToEdit['willing_to_volunteer']) {
    case 'yes': ?>
    <option selected value="yes">Yes</option>
    <option value="no">No</option>
    <option value="possibly">Possibly</option>
    <option value="contact_me">Contact Me</option>
    <?php
        break;
    case 'no': ?>
    <option value="yes">Yes</option>
    <option selected value="no">No</option>
    <option value="possibly">Possibly</option>
    <option value="contact_me">Contact Me</option>
    <?php
        break;
            case 'possibly': ?>
    <option selected value="yes">Yes</option>
    <option value="no">No</option>
    <option selected value="possibly">Possibly</option>
    <option value="contact_me">Contact Me</option>
    <?php
        break;
    case 'contact_me': ?>
    <option value="yes">Yes</option>
    <option value="no">No</option>
    <option value="possibly">Possibly</option>
    <option selected value="contact_me">Contact Me</option>
    <?php
        break;
}
?>
</select>
<br />

<?php } ?><br />
<input type="submit"><br />
</form>

<a href="../index.php">Go back</a><br /><br />

</body>