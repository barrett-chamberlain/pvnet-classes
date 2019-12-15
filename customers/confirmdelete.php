<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/prettify.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<style type="text/css">
    .roleBox {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
</style>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/prettify.js"></script>
<script type="text/javascript" src="../js/jquery.collapsible-menus.min.js"></script>
<script type="text/javascript" src="../js/site.js"></script>
<title>Confirm Deletion</title>
</head>
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

$customerToEdit = $result->fetch_assoc();
$customercontToEdit = $result2->fetch_assoc(); ?>
<p style="font-weight: bold; color: red;">Are you sure you wish to delete this customer?</p>
<h3>CUSTOMER: #<?php echo $customerToEdit['id']?></h3>
<a href="../index.php">Go back</a><br /><br />
<form>
<input disabled type="hidden" name="dbid" value="<?php echo $customerToEdit['id']?>">
<ul id="first">
    <li><a href="javascript:;">Contact Info</a></li>
    <li>
        <ul>
            <li>First Name: <input disabled size="50"  required="required" type="text" name="firstname" value="<?php echo $customerToEdit['firstname']?>"></li>
            <li>Last Name: <input disabled size="50"  required="required" type="text" name="lastname" value="<?php echo $customerToEdit['lastname']?>"></li>
            <li>Address Line 1: <input disabled size="50" type="text" name="addr1" value="<?php echo $customercontToEdit['addr1']?>"></li>
            <li>Address Line 2: <input disabled size="50" type="text" name="addr2" value="<?php echo $customercontToEdit['addr2']?>"></li>
            <li>City: <input disabled size="50" type="text" name="city" value="<?php echo $customercontToEdit['city']?>"></li>
            <li>State: <input disabled size="50" type="text" name="state" value="<?php echo $customercontToEdit['state']?>"></li>
            <li>Zip Code: <input disabled size="50" type="number" name="zipcode" value="<?php echo $customercontToEdit['zipcode']?>"></li>
            <li>Phone 1: <input disabled size="50" type="number" name="phone1" value="<?php echo $customercontToEdit['phone1']?>"></li>
            <li>Phone 2: <input disabled size="50" type="number" name="phone2" value="<?php echo $customercontToEdit['phone2']?>"></li>
            <li>Email Address: <input disabled size="50"  type="email" name="email" value="<?php echo $customercontToEdit['email']?>"></li>
        </ul>
    </li>       
</ul><!-- /Contact info -->
<ul id="accordion">
    <li><a href="javascript:;">Work Info</a></li>
    <li>
        <ul>
            <li>Employer Name: <input disabled size="50" type="text" name="employer_name" value="<?php echo $customercontToEdit['employer_name']?>"></li>
            <li>Position Title: <input disabled size="50" type="text" name="position_title" value="<?php echo $customercontToEdit['position_title']?>"></li>
            <li>Department: <input disabled size="50" type="text" name="department" value="<?php echo $customercontToEdit['department']?>"></li>
            <li>Area of Expertise: <input disabled size="50" type="text" name="area_of_expertise" value="<?php echo $customercontToEdit['area_of_expertise']?>"></li>
            <li>Work Address: <input disabled size="50" type="text" name="work_address" value="<?php echo $customercontToEdit['work_address']?>"></li>
            <li>Work City: <input disabled size="50" type="text" name="work_city" value="<?php echo $customercontToEdit['work_city']?>"></li>
            <li><?php include('../_includes/work_state_conditional.php'); ?></li>
            <li>Work Zip Code: <input disabled size="50" type="number" name="work_zip" value="<?php echo $customercontToEdit['work_zip']?>"></li>
            <li>Work Phone: <input disabled size="50" type="number" name="work_phone" value="<?php echo $customercontToEdit['work_phone']?>"></li>
            <li>Work Email: <input disabled size="50" type="email" name="work_email" value="<?php echo $customercontToEdit['work_email']?>"></li>
            <li>Work Notes: <textarea rows="4" cols="50" name="work_notes"><?php echo $customercontToEdit['work_notes']?></textarea>
        </ul>
    </li>       
</ul><!-- /Work Info -->
<ul id="accordion">
    <li><a href="javascript:;">Customer Details</a></li>
    <li>
        <ul>
            <li>
                <div class="roleBox">
                    Customer is a...<br /><br />
                    Parent: <input disabled  type="checkbox" <?php if($customerToEdit['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
                    Adult Student: <input disabled  type="checkbox" <?php if($customerToEdit['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
                    Minor Student: <input disabled  type="checkbox" <?php if($customerToEdit['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
                    Relative: <input disabled  type="checkbox" <?php if($customerToEdit['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
                    Sibling: <input disabled  type="checkbox" <?php if($customerToEdit['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
                    Instructor: <input disabled  type="checkbox" <?php if($customerToEdit['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
                    Adult Volunteer: <input disabled  type="checkbox" <?php if($customerToEdit['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
                    Minor Volunteer: <input disabled  type="checkbox" <?php if($customerToEdit['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
                    Sponsor: <input disabled type="checkbox" <?php if($customerToEdit['is_sponsor'] == 1){echo "checked";}?> name="is_sponsor"><br />
                    Alumni: <input disabled type="checkbox" <?php if($customerToEdit['is_alumni'] == 1){echo "checked";}?> name="is_alumni"><br />
                </div>
            </li>
            <li>
                <div class="roleBox">
                    Home Environment is...<br /><br />
                    Electronic: <input disabled type="checkbox" <?php if($customerToEdit['h_env_electronic'] == 1){echo "checked";}?> name="h_env_electronic"><br />
                    Computer Science: <input disabled type="checkbox" <?php if($customerToEdit['h_env_compsci'] == 1){echo "checked";}?> name="h_env_compsci"><br />
                    Mechanical Engineering: <input disabled type="checkbox" <?php if($customerToEdit['h_env_mecheng'] == 1){echo "checked";}?> name="h_env_mecheng"><br />
                </div>
            </li>
            <li>Password: <input disabled size="50" type="text" name="password" value="<?php echo $customerToEdit['password']?>"></li>
            <li>Referral Method: 
                <select name="referral">
                    <?php
                    switch ($customerToEdit['referral']) {
                        case 'friend': ?>
                            <option selected value="friend">Friend</option>
                            <option value="advertisement">Advertisement</option>
                            <option value="internet">Internet</option>
                            <option value="other">Other</option>
                        <?php break;
                        case 'advertisement': ?>
                            <option value="friend">Friend</option>
                            <option selected value="advertisement">Advertisement</option>
                            <option value="internet">Internet</option>
                            <option value="other">Other</option>>
                        <?php break;
                        case 'internet': ?>
                            <option value="friend">Friend</option>
                            <option value="advertisement">Advertisement</option>
                            <option selected value="internet">Internet</option>
                            <option value="other">Other</option>
                        <?php break;
                        case 'other': ?>
                            <option value="friend">Friend</option>
                            <option value="advertisement">Advertisement</option>
                            <option value="internet">Internet</option>
                            <option selected value="other">Other</option>
                        <?php
                            break;
                        default: ?>
                            <option selected value="friend">Friend</option>
                            <option value="advertisement">Advertisement</option>
                            <option value="internet">Internet</option>
                            <option value="other">Other</option>
                        <?php
                            break; } ?>
                </select>
            </li>
            <li>Referral Other: <textarea rows="4" cols="50" name="referral_other"><?php echo $customerToEdit['referral_other']?></textarea></li>
            <li>Willingness to Volunteer: 
                <select name="willing_to_volunteer">
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
                            break;} ?>
                </select>
            </li>
        </ul>
    </li>       
</ul><!-- /Customer Details -->
</form>
<br /><br />
<a style="font-weight: bold; color: red;" href="deletecustomer.php?id=<?php echo $cleanedID ?>">Yes, delete this customer</a><br /><br />

<a href="../index.php">Go back</a><br /><br />

</body>
</html>