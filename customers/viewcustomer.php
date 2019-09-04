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

$result = $mysqli->query($sql);

$sql2 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";

$result2 = $mysqli->query($sql2);

$sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
$result3 = $mysqli->query($sql3);
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID--;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        // echo $cleanedID . ' gives no results' . '<br />';
        $cleanedID++;
        // echo 'decrement: ' . $cleanedID . '<br />';
        $sql3 = "SELECT id FROM " . $table_customer . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
    // echo 'final set: ' . $cleanedID;
$sql = "SELECT * FROM " . $table_customer . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);
$nextCustomer = $cleanedID + 1;
$prevCustomer = $cleanedID - 1;

$customerToEdit = $result->fetch_assoc(); ?>

<h3>VIEWING CUSTOMER: #<?php echo $customerToEdit['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="viewcustomer.php?id=<?php echo $prevCustomer?>&prev=1">View previous customer</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
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
First Name: <input size="50" disabled type="text" name="firstname" value="<?php echo $customerToEdit['firstname']?>"><br />
Last Name: <input size="50" disabled type="text" name="lastname" value="<?php echo $customerToEdit['lastname']?>"><br />
<div class="roleBox">
    Customer is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($customerToEdit['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($customerToEdit['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($customerToEdit['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($customerToEdit['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($customerToEdit['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($customerToEdit['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($customerToEdit['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($customerToEdit['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
</div>
<div class="roleBox">
    Home Environment is...<br /><br />
    Electronic: <input disabled type="checkbox" name="h_env_electronic"><br />
    Computer Science: <input disabled type="checkbox" name="h_env_compsci"><br />
    Mechanical Engineering: <input disabled type="checkbox" name="h_env_mecheng"><br />
</div>
Password: <input disabled size="50" type="text" name="password" value="<?php echo $customerToEdit['password']?>"><br />
Referral Method: <select disabled name="referral">
<?php
switch ($customercontToEdit['referral']) {
    case 'friend': ?>
        <option selected value="friend">Friend</option>
        <option value="advertisement">Advertisement</option>
        <option value="internet">Internet</option>
        <option value="other">Other</option>
    <?php
        break;
    case 'advertisement': ?>
        <option value="friend">Friend</option>
        <option selected value="advertisement">Advertisement</option>
        <option value="internet">Internet</option>
        <option value="other">Other</option>>
    <?php
        break;
    case 'internet': ?>
        <option value="friend">Friend</option>
        <option value="advertisement">Advertisement</option>
        <option selected value="internet">Internet</option>
        <option value="other">Other</option>
    <?php
        break;
    case 'other': ?>
        <option value="friend">Friend</option>
        <option value="advertisement">Advertisement</option>
        <option value="internet">Internet</option>
        <option selected value="other">Other</option>
    <?php
        break;
}
?>
</select>
<br />
Referral Other: <textarea disabled rows="4" cols="50" name="referral_other" value="<?php echo $customerToEdit['referral_other']?>"></textarea><br />
<?php $customercontToEdit = $result2->fetch_assoc(); ?>
Address Line 1: <input size="50" disabled type="text" name="addr1" value="<?php echo $customercontToEdit['addr1']?>"><br />
Address Line 2: <input size="50" disabled type="text" name="addr2" value="<?php echo $customercontToEdit['addr2']?>"><br />
City: <input size="50" disabled type="text" name="city" value="<?php echo $customercontToEdit['city']?>"><br />
State: <input size="50" disabled type="text" name="state" value="<?php echo $customercontToEdit['state']?>"><br />
Zip Code: <input size="50" disabled type="number" name="zipcode" value="<?php echo $customercontToEdit['zipcode']?>"><br />
Phone 1: <input size="50" disabled type="number" name="phone1" value="<?php echo $customercontToEdit['phone1']?>"><br />
Phone 2: <input size="50" disabled type="number" name="phone2" value="<?php echo $customercontToEdit['phone2']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $customercontToEdit['email']?>"><br />
Employer Name: <input size="50" disabled type="text" name="employer_name" value="<?php echo $customercontToEdit['employer_name']?>"><br />
Position Title: <input size="50" disabled type="text" name="position_title" value="<?php echo $customercontToEdit['position_title']?>"><br />
Department: <input size="50" disabled type="text" name="department" value="<?php echo $customercontToEdit['department']?>"><br />
Area of Expertise: <input size="50" disabled type="text" name="area_of_expertise" value="<?php echo $customercontToEdit['area_of_expertise']?>"><br />
Work Address: <input size="50" disabled type="text" name="work_address" value="<?php echo $customercontToEdit['work_address']?>"><br />
Work City: <input size="50" disabled type="text" name="work_city" value="<?php echo $customercontToEdit['work_city']?>"><br />
<?php include('../_includes/work_state_conditional_disabled.php'); ?>
Work Zip Code: <input size="50" disabled type="number" name="work_zip" value="<?php echo $customercontToEdit['work_zip']?>"><br />
Work Phone: <input size="50" disabled type="number" name="work_phone" value="<?php echo $customercontToEdit['work_phone']?>"><br />
Work Email: <input size="50" disabled type="email" name="work_email" value="<?php echo $customercontToEdit['work_email']?>"><br />
Work Notes: <textarea rows="4" cols="50" disabled name="work_notes"><?php echo $customercontToEdit['work_notes']?></textarea><br />
Willingness to Volunteer: <select disabled name="willing_to_volunteer">
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
<h3>LINKED STUDENTS<br />
=====================</h3>
<?php 
    $sql6 = "SELECT * FROM " . $table_student . " where linkedcustomer = '" . $customerToEdit['id'] . "'";
    $result6 = $mysqli->query($sql6);
while ($getLinkedStudent = $result6->fetch_assoc()) { ?>
<input disabled type="hidden" name="dbid" value="<?php echo $getLinkedStudent['id']?>">
First Name: <input size="50"  required="required" disabled type="text" name="firstname" value="<?php echo $getLinkedStudent['fname']?>"><br />
Last Name: <input size="50"  required="required" disabled type="text" name="lastname" value="<?php echo $getLinkedStudent['lname']?>"><br />
Date of Birth: <input disabled type="date" name="dob" value="<?php echo $getLinkedStudent['dob']?>"><br />
Grade Level: <input disabled size="50" type="text" name="gradelevel" value="<?php echo $getLinkedStudent['gradelevel']?>"><br />
Grade Level Date: <input disabled type="date" name="gradeleveldate" value="<?php echo $getLinkedStudent['gradeleveldate']?>"><br />
School: <input disabled size="50" type="text" name="school" value="<?php echo $getLinkedStudent['school']?>"><br />
Gender: <input disabled size="50" type="text" name="gender" value="<?php echo $getLinkedStudent['gender']?>"><br />
Cell Phone: <input disabled size="50" type="number" name="cell_phone" value="<?php echo $getLinkedStudent['cell_phone']?>"><br />
Email Address: <input disabled size="50" type="email" name="email" value="<?php echo $getLinkedStudent['email']?>"><br />
Linked Customer: <input disabled size="50" type="number" name="linkedcustomer" value="<?php echo $getLinkedStudent['linkedcustomer']?>"><br />
<div class="roleBox">
    Student is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($getLinkedStudent['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($getLinkedStudent['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($getLinkedStudent['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($getLinkedStudent['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($getLinkedStudent['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($getLinkedStudent['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($getLinkedStudent['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($getLinkedStudent['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
</div>
<h3>=============================</h3>
<?php } ?>
</form>

<a href="../index.php">Go back</a><br /><br />

</body>