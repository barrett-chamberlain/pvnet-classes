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


$sql = "SELECT * FROM " . $table_customer . " where id = '" . $cleanedID . "'";

$result = $mysqli->query($sql);

$sql2 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $cleanedID . "'";

$result2 = $mysqli->query($sql2);

while ($customerToEdit = $result->fetch_assoc()) { ?>
<p style="font-weight: bold; color: red;">Are you sure you wish to delete this customer?</p>
<h3>CUSTOMER: #<?php echo $customerToEdit['id']?></h3>
<form>
<input disabled type="hidden" name="dbid" value="<?php echo $customerToEdit['id']?>">
First Name: <input size="50" disabled required="required" type="text" name="firstname" value="<?php echo $customerToEdit['firstname']?>"><br />
Last Name: <input size="50" disabled required="required" type="text" name="lastname" value="<?php echo $customerToEdit['lastname']?>"><br />
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
<a href="deletecustomer.php?id=<?php echo $cleanedID ?>">Yes, delete this customer</a><br /><br />

<a href="../index.php">Go back</a><br /><br />

</body>