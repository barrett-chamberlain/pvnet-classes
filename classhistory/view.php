<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT * FROM " . $table_class_history . " where id = '" . $cleanedID . "'";
// $result = $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    include('../_includes/send_error.php');
    exit;
}

//queries for prev/next viewing
$sql4 = "select max(id) from " . $table_class_history . "";
$result4 = $mysqli->query($sql4);
$sql5 = "select min(id) from " . $table_class_history . "";
$result5 = $mysqli->query($sql5);
while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(id)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(id)"];
}
$sql3 = "SELECT id FROM " . $table_class_history . " where id = '" . $cleanedID . "'";
$result3 = $mysqli->query($sql3);

//increment/decrement ID and rerun query until record found for prev/next links
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        $cleanedID--;
        $sql3 = "SELECT id FROM " . $table_class_history . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        $cleanedID++;
        $sql3 = "SELECT id FROM " . $table_class_history . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }

//re-establish SQL statement with found valid ID
$sql = "SELECT * FROM " . $table_class_history . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);
$nextClass = $cleanedID + 1;
$prevClass = $cleanedID - 1;

$viewHistory = $result->fetch_assoc(); ?>

<h3>RECORD #<?php echo $viewHistory['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="view.php?id=<?php echo $prevClass?>&prev=1">View previous record</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
<a href="view.php?id=<?php echo $nextClass?>&next=1">View next record</a><?php } ?>
<br /><br />
<h3>CLASS<br />
==============
</h3>
<p>
Class ID: <?php echo $viewHistory['Class_ID']?><br />
Class Name: <?php echo $viewHistory['Class_Name']?><br />
Department: <?php echo $viewHistory['Department']?><br /><br />
<a href="index.php">Go back</a> | <a href="../classes/editclass.php?id=<?php echo $viewHistory['classes_table_id']?>">Edit this class</a> | <a href="../classes/duplicateclass.php?id=<?php echo $viewHistory['classes_table_id']?>">Duplicate this class</a> | <a href="../classes/confirmdelete.php?id=<?php echo $viewHistory['classes_table_id']?>">Delete this class</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $viewHistory['id']?>">
Class ID: <input disabled required="required" type="text" name="classId" value="<?php echo $viewHistory['Class_ID']?>"><br />
Class Name: <input size="50" disabled required="required" type="text" name="className" value="<?php echo $viewHistory['Class_Name']?>"><br />
Department: <input size="50" disabled type="text" name="dept" value="<?php echo $viewHistory['Department']?>"><br />
Class Number: <input disabled type="text" name="classNum" value="<?php echo $viewHistory['Class_Number']?>"><br />
Class Section: <input disabled type="text" name="classSec" value="<?php echo $viewHistory['Class_Section']?>"><br />
Activate: <input disabled type="checkbox" <?php if($viewHistory['activate'] == 1){echo "checked";}?> name="actv"><br />
Instructor: <input size="50" disabled type="text" name="instr" value="<?php echo $viewHistory['Instructor']?>"><br />
Internal Notes: <textarea disabled rows="4" cols="50" name="int_notes"><?php echo $viewHistory['Internal_Notes']?></textarea><br />
Class Description: <textarea disabled rows="4" cols="50" name="class_desc"><?php echo $viewHistory['Class_Description']?></textarea><br /><br />
Additional Info: <textarea disabled rows="4" cols="50" name="addl_info"><?php echo $viewHistory['Additional_Info']?></textarea><br />
Prerequisite: <textarea disabled rows="4" cols="50" name="prereq"><?php echo $viewHistory['Prerequisite']?></textarea><br />
Start Week: <input disabled type="date" name="st_week" value="<?php echo $viewHistory['Start_Week']?>"><br />
End Week: <input disabled type="date" name="end_week" value="<?php echo $viewHistory['End_Week']?>"><br />
Age Start: <input disabled type="text" name="ageStart" value="<?php echo $viewHistory['Age_Start']?>"><br />
Age End: <input disabled type="text" name="ageEnd" value="<?php echo $viewHistory['Age_End']?>"><br />
Consumables Fee: <input disabled type="text" name="consFee" value="<?php echo $viewHistory['Consummables_Fee']?>"><br />
Hourly Fee: <input disabled type="text" name="hourFee" value="<?php echo $viewHistory['Hourly_Fee']?>"><br />
Registration Fee: <input disabled type="text" name="regFee" value="<?php echo $viewHistory['Registration_Fee']?>"><br />
Price Included For Interns: <input disabled type="checkbox" <?php if($viewHistory['Price_Included_For_Interns'] == 1){echo "checked";}?> name="priceInterns"><br />
Intern Only: <input disabled type="checkbox" <?php if($viewHistory['Intern_Only'] == 1){echo "checked";}?> name="intOnly"><br />
Field Trip: <input disabled type="checkbox" <?php if($viewHistory['Field_Trip'] == 1){echo "checked";}?> name="fieldTrip"><br />
Field Trip Wish List: <input disabled type="checkbox" <?php if($viewHistory['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="fieldTripWishList"><br />
Class: <input disabled type="checkbox" <?php if($viewHistory['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="cl"><br />
Workshop: <input disabled type="checkbox" <?php if($viewHistory['Workshop'] == 1){echo "checked";}?> name="wkshp"><br />
Group-Based: <input disabled type="checkbox" <?php if($viewHistory['GroupBased'] == 1){echo "checked";}?> name="grpBased"><br />
Seasonal Classification: <input disabled type="text" name="seasClass" value="<?php echo $viewHistory['Seasonal_Classification']?>"><br />
No Weeks: <input disabled type="text" name="noWks" value="<?php echo $viewHistory['No_Weeks']?>"><br />
Monday: <input disabled type="checkbox" <?php if($viewHistory['M'] == 1){echo "checked";}?> name="mon"><br />
Tuesday: <input disabled type="checkbox" <?php if($viewHistory['T'] == 1){echo "checked";}?> name="tues"><br />
Wednesday: <input disabled type="checkbox" <?php if($viewHistory['W'] == 1){echo "checked";}?> name="wed"><br />
Thursday: <input disabled type="checkbox" <?php if($viewHistory['TH'] == 1){echo "checked";}?> name="thurs"><br />
Friday: <input disabled type="checkbox" <?php if($viewHistory['F'] == 1){echo "checked";}?> name="friday"><br />
Saturday: <input disabled type="checkbox" <?php if($viewHistory['Sat'] == 1){echo "checked";}?> name="saturday"><br />
Sunday: <input disabled type="checkbox" <?php if($viewHistory['Sun'] == 1){echo "checked";}?> name="sunday"><br />
Hours Per Class: <input disabled type="text" name="hoursPerClass" value="<?php echo $viewHistory['Hrs_Per_Class']?>"><br />
Meetings Per Week: <input disabled type="text" name="meetingsPerWeek" value="<?php echo $viewHistory['Mtgs_Per_Wk']?>"><br />
Total Meetings: <input disabled type="text" name="totalMtgs" value="<?php echo $viewHistory['Total_Meetings']?>"><br />
Total Class Time Hours: <input disabled type="text" name="totClasTimeHrs" value="<?php echo $viewHistory['Total_Class_Time_Hrs']?>"><br />
Start Time: <input disabled type="time" name="stTime" value="<?php echo $viewHistory['Start_Time']?>"><br />
End Time: <input disabled type="time" name="endTime" value="<?php echo $viewHistory['End_Time']?>"><br />
Area: <input size="50" disabled type="text" name="ar_ea" value="<?php echo $viewHistory['AREA']?>"><br />
Image 1: <input size="50" disabled type="text" name="img1" value="<?php echo $viewHistory['IMG_1']?>"><br />
Image 2: <input size="50" disabled type="text" name="img2" value="<?php echo $viewHistory['IMG_2']?>"><br />
Image 3: <input size="50" disabled type="text" name="img3" value="<?php echo $viewHistory['IMG_3']?>"><br />
External Link 1: <input size="50" disabled type="text" name="extLink1" value="<?php echo $viewHistory['EXT_LINK_1']?>"><br />
External Link 2: <input size="50" disabled type="text" name="extLink2" value="<?php echo $viewHistory['EXT_LINK_2']?>"><br />
External Link 3: <input size="50" disabled type="text" name="extLink3" value="<?php echo $viewHistory['EXT_LINK_3']?>"><br />
UND 1: <input size="50" disabled type="text" name="und1" value="<?php echo $viewHistory['UND_1']?>"><br />
UND 2: <input size="50" disabled type="text" name="und2" value="<?php echo $viewHistory['UND_2']?>"><br />
UND 3: <input size="50" disabled type="text" name="und3" value="<?php echo $viewHistory['UND_3']?>"><br />
UND 4: <input size="50" disabled type="text" name="und4" value="<?php echo $viewHistory['UND_4']?>"><br />
UND 5: <input size="50" disabled type="text" name="und5" value="<?php echo $viewHistory['UND_5']?>"><br />
UND 6: <input size="50" disabled type="text" name="und6" value="<?php echo $viewHistory['UND_6']?>"><br />
UND 7: <input size="50" disabled type="text" name="und7" value="<?php echo $viewHistory['UND_7']?>"><br />
UND 8: <input size="50" disabled type="text" name="und8" value="<?php echo $viewHistory['UND_8']?>"><br />
UND 9: <input size="50" disabled type="text" name="und9" value="<?php echo $viewHistory['UND_9']?>"><br />
UND 10: <input size="50" disabled type="text" name="und10" value="<?php echo $viewHistory['UND_10']?>"><br />
Publish Date: <input disabled type="date" name="pub_date" value="<?php echo $viewHistory['Publish_Date']?>"><br />
Enrollment Limit: <input disabled type="Number" name="enr_limit" value="<?php echo $viewHistory['Enrollment_Limit']?>"><br />
Not Included For Interns: <input disabled type="checkbox" <?php if($viewHistory['Not_Included_For_Interns'] == 1){echo "checked";}?> name="not_inc_int"><br />
Seminars: <input disabled type="checkbox" <?php if($viewHistory['Seminars'] == 1){echo "checked";}?> name="sem"><br />
Events: <input disabled type="checkbox" <?php if($viewHistory['Events'] == 1){echo "checked";}?> name="eve"><br />
<h3>STUDENT<br />
==============
</h3>
<p>
Student ID: <?php echo $viewHistory['students_table_id']?><br />
Student First Name: <?php echo $viewHistory['fname']?><br />
Student Last Name: <?php echo $viewHistory['lname']?><br /><br />
<a href="index.php">Go back</a> | <a href="../students/editstudent.php?id=<?php echo $viewHistory['students_table_id']?>">Edit this student</a> | <a href="../students/duplicatestudent.php?id=<?php echo $viewHistory['students_table_id']?>">Duplicate this student</a> | <a href="../students/confirmdelete.php?id=<?php echo $viewHistory['students_table_id']?>">Delete this student</a><br /><br />
</p>
<input disabled type="hidden" name="dbid" value="<?php echo $viewHistory['id']?>">
First Name: <input size="50" disabled type="text" name="firstname" value="<?php echo $viewHistory['fname']?>"><br />
Last Name: <input size="50" disabled type="text" name="lastname" value="<?php echo $viewHistory['lname']?>"><br />
Date of Birth: <input disabled type="date" name="dob" value="<?php echo $viewHistory['dob']?>"><br />
Grade Level: <input size="50" disabled type="text" name="gradelevel" value="<?php echo $viewHistory['gradelevel']?>"><br />
Grade Level Date: <input disabled type="date" name="gradeleveldate" value="<?php echo $viewHistory['gradeleveldate']?>"><br />
School: <input size="50" disabled type="text" name="school" value="<?php echo $viewHistory['school']?>"><br />
Gender: <input size="50" disabled type="text" name="gender" value="<?php echo $viewHistory['gender']?>"><br />
Cell Phone: <input size="50" disabled type="number" name="cell_phone" value="<?php echo $viewHistory['cell_phone']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $viewHistory['email']?>"><br />
Linked Customer: <input size="50" disabled type="number" name="linkedcustomer" value="<?php echo $viewHistory['linkedcustomer']?>"><br />

<div class="roleBox">
    Student is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($viewHistory['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($viewHistory['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($viewHistory['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($viewHistory['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($viewHistory['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($viewHistory['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($viewHistory['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($viewHistory['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
</div>
<h3>CUSTOMER<br />
==============
</h3>
<p>
Customer ID: <?php echo $viewHistory['customers_table_id']?><br />
Customer First Name: <?php echo $viewHistory['firstname']?><br />
Customer Last Name: <?php echo $viewHistory['lastname']?><br /><br />
<a href="index.php">Go back</a> | <a href="../customers/editcustomer.php?id=<?php echo $viewHistory['customers_table_id']?>">Edit this customer</a> | <a href="../customers/duplicatecustomer.php?id=<?php echo $viewHistory['customers_table_id']?>">Duplicate this customer</a> | <a href="../customers/confirmdelete.php?id=<?php echo $viewHistory['customers_table_id']?>">Delete this customer</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $viewHistory['id']?>">
First Name: <input size="50" disabled type="text" name="firstname" value="<?php echo $viewHistory['firstname']?>"><br />
Last Name: <input size="50" disabled type="text" name="lastname" value="<?php echo $viewHistory['lastname']?>"><br />
<div class="roleBox">
    Customer is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($viewHistory['cust_is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($viewHistory['cust_is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($viewHistory['cust_is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($viewHistory['cust_is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($viewHistory['cust_is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($viewHistory['cust_is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($viewHistory['cust_is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($viewHistory['cust_is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
</div>
Address Line 1: <input size="50" disabled type="text" name="addr1" value="<?php echo $viewHistory['addr1']?>"><br />
Address Line 2: <input size="50" disabled type="text" name="addr2" value="<?php echo $viewHistory['addr2']?>"><br />
City: <input size="50" disabled type="text" name="city" value="<?php echo $viewHistory['city']?>"><br />
State: <input size="50" disabled type="text" name="state" value="<?php echo $viewHistory['state']?>"><br />
Zip Code: <input size="50" disabled type="number" name="zipcode" value="<?php echo $viewHistory['zipcode']?>"><br />
Phone 1: <input size="50" disabled type="number" name="phone1" value="<?php echo $viewHistory['phone1']?>"><br />
Phone 2: <input size="50" disabled type="number" name="phone2" value="<?php echo $viewHistory['phone2']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $viewHistory['cust_cont_email']?>"><br />
Employer Name: <input size="50" disabled type="text" name="employer_name" value="<?php echo $viewHistory['employer_name']?>"><br />
Position Title: <input size="50" disabled type="text" name="position_title" value="<?php echo $viewHistory['position_title']?>"><br />
Department: <input size="50" disabled type="text" name="department" value="<?php echo $viewHistory['cust_cont_department']?>"><br />
Area of Expertise: <input size="50" disabled type="text" name="area_of_expertise" value="<?php echo $viewHistory['area_of_expertise']?>"><br />
Work Address: <input size="50" disabled type="text" name="work_address" value="<?php echo $viewHistory['work_address']?>"><br />
Work City: <input size="50" disabled type="text" name="work_city" value="<?php echo $viewHistory['work_city']?>"><br />
<?php include('../_includes/work_state_conditional_disabled.php'); ?>
Work Zip Code: <input size="50" disabled type="number" name="work_zip" value="<?php echo $viewHistory['work_zip']?>"><br />
Work Phone: <input size="50" disabled type="number" name="work_phone" value="<?php echo $viewHistory['work_phone']?>"><br />
Work Email: <input size="50" disabled type="email" name="work_email" value="<?php echo $viewHistory['work_email']?>"><br />
Work Notes: <textarea rows="4" cols="50" disabled name="work_notes"><?php echo $viewHistory['work_notes']?></textarea><br />
Willingness to Volunteer: <select disabled name="willing_to_volunteer">
<?php
switch ($viewHistory['willing_to_volunteer']) {
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
</form>

<a href="index.php">Go back</a><br /><br />

</body>