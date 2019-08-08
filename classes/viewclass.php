<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "SELECT * FROM " . $table_classes . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);

//queries for prev/next viewing
$sql4 = "select max(id) from " . $table_classes . "";
$result4 = $mysqli->query($sql4);
$sql5 = "select min(id) from " . $table_classes . "";
$result5 = $mysqli->query($sql5);
while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(id)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(id)"];
}
$sql3 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
$result3 = $mysqli->query($sql3);

//increment/decrement ID and rerun query until record found for prev/next links
while($result3->num_rows === 0 and $_GET['prev'] == 1)
    {
        $cleanedID--;
        $sql3 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }
while($result3->num_rows === 0 and $_GET['next'] == 1)
    {
        $cleanedID++;
        $sql3 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
        $result3 = $mysqli->query($sql3);
    }

//re-establish SQL statement with found valid ID
$sql = "SELECT * FROM " . $table_classes . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);
$nextClass = $cleanedID + 1;
$prevClass = $cleanedID - 1;

while ($classToEdit = $result->fetch_assoc()) { ?>

<h3>VIEWING RECORD: #<?php echo $classToEdit['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="viewclass.php?id=<?php echo $prevClass?>&prev=1">View previous class</a> 
<?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
<a href="viewclass.php?id=<?php echo $nextClass?>&next=1">View next class</a><?php } ?>
<br /><br />
<p>
Class ID: <?php echo $classToEdit['Class_ID']?><br />
Class Name: <?php echo $classToEdit['Class_Name']?><br />
Department: <?php echo $classToEdit['Department']?><br /><br />
<a href="../index.php">Go back</a> | <a href="editclass.php?id=<?php echo $classToEdit['id']?>">Edit this class</a> | <a href="duplicateclass.php?id=<?php echo $classToEdit['id']?>">Duplicate this class</a> | <a href="confirmdelete.php?id=<?php echo $classToEdit['id']?>">Delete this class</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $classToEdit['id']?>">
Class ID: <input disabled required="required" type="text" name="classId" value="<?php echo $classToEdit['Class_ID']?>"><br />
Class Name: <input size="50" disabled required="required" type="text" name="className" value="<?php echo $classToEdit['Class_Name']?>"><br />
Department: <input size="50" disabled type="text" name="dept" value="<?php echo $classToEdit['Department']?>"><br />
Class Number: <input disabled type="text" name="classNum" value="<?php echo $classToEdit['Class_Number']?>"><br />
Class Section: <input disabled type="text" name="classSec" value="<?php echo $classToEdit['Class_Section']?>"><br />
Activate: <input disabled type="checkbox" <?php if($classToEdit['activate'] == 1){echo "checked";}?> name="actv"><br />
Instructor: <input size="50" disabled type="text" name="instr" value="<?php echo $classToEdit['Instructor']?>"><br />
Internal Notes: <textarea disabled rows="4" cols="50" name="int_notes"><?php echo $classToEdit['Internal_Notes']?></textarea><br />
Class Description: <textarea disabled rows="4" cols="50" name="class_desc"><?php echo $classToEdit['Class_Description']?></textarea><br /><br />
Additional Info: <textarea disabled rows="4" cols="50" name="addl_info"><?php echo $classToEdit['Additional_Info']?></textarea><br />
Prerequisite: <textarea disabled rows="4" cols="50" name="prereq"><?php echo $classToEdit['Prerequisite']?></textarea><br />
Start Week: <input disabled type="date" name="st_week" value="<?php echo $classToEdit['Start_Week']?>"><br />
End Week: <input disabled type="date" name="end_week" value="<?php echo $classToEdit['End_Week']?>"><br />
Age Start: <input disabled type="text" name="ageStart" value="<?php echo $classToEdit['Age_Start']?>"><br />
Age End: <input disabled type="text" name="ageEnd" value="<?php echo $classToEdit['Age_End']?>"><br />
Consumables Fee: <input disabled type="text" name="consFee" value="<?php echo $classToEdit['Consummables_Fee']?>"><br />
Hourly Fee: <input disabled type="text" name="hourFee" value="<?php echo $classToEdit['Hourly_Fee']?>"><br />
Registration Fee: <input disabled type="text" name="regFee" value="<?php echo $classToEdit['Registration_Fee']?>"><br />
Price Included For Interns: <input disabled type="checkbox" <?php if($classToEdit['Price_Included_For_Interns'] == 1){echo "checked";}?> name="priceInterns"><br />
Intern Only: <input disabled type="checkbox" <?php if($classToEdit['Intern_Only'] == 1){echo "checked";}?> name="intOnly"><br />
Field Trip: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip'] == 1){echo "checked";}?> name="fieldTrip"><br />
Field Trip Wish List: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="fieldTripWishList"><br />
Class: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="cl"><br />
Workshop: <input disabled type="checkbox" <?php if($classToEdit['Workshop'] == 1){echo "checked";}?> name="wkshp"><br />
Group-Based: <input disabled type="checkbox" <?php if($classToEdit['GroupBased'] == 1){echo "checked";}?> name="grpBased"><br />
Seasonal Classification: <input disabled type="text" name="seasClass" value="<?php echo $classToEdit['Seasonal_Classification']?>"><br />
No Weeks: <input disabled type="text" name="noWks" value="<?php echo $classToEdit['No_Weeks']?>"><br />
Monday: <input disabled type="checkbox" <?php if($classToEdit['M'] == 1){echo "checked";}?> name="mon"><br />
Tuesday: <input disabled type="checkbox" <?php if($classToEdit['T'] == 1){echo "checked";}?> name="tues"><br />
Wednesday: <input disabled type="checkbox" <?php if($classToEdit['W'] == 1){echo "checked";}?> name="wed"><br />
Thursday: <input disabled type="checkbox" <?php if($classToEdit['TH'] == 1){echo "checked";}?> name="thurs"><br />
Friday: <input disabled type="checkbox" <?php if($classToEdit['F'] == 1){echo "checked";}?> name="friday"><br />
Saturday: <input disabled type="checkbox" <?php if($classToEdit['Sat'] == 1){echo "checked";}?> name="saturday"><br />
Sunday: <input disabled type="checkbox" <?php if($classToEdit['Sun'] == 1){echo "checked";}?> name="sunday"><br />
Hours Per Class: <input disabled type="text" name="hoursPerClass" value="<?php echo $classToEdit['Hrs_Per_Class']?>"><br />
Meetings Per Week: <input disabled type="text" name="meetingsPerWeek" value="<?php echo $classToEdit['Mtgs_Per_Wk']?>"><br />
Total Meetings: <input disabled type="text" name="totalMtgs" value="<?php echo $classToEdit['Total_Meetings']?>"><br />
Total Class Time Hours: <input disabled type="text" name="totClasTimeHrs" value="<?php echo $classToEdit['Total_Class_Time_Hrs']?>"><br />
Start Time: <input disabled type="time" name="stTime" value="<?php echo $classToEdit['Start_Time']?>"><br />
End Time: <input disabled type="time" name="endTime" value="<?php echo $classToEdit['End_Time']?>"><br />
Area: <input size="50" disabled type="text" name="ar_ea" value="<?php echo $classToEdit['AREA']?>"><br />
Image 1: <input size="50" disabled type="text" name="img1" value="<?php echo $classToEdit['IMG_1']?>"><br />
Image 2: <input size="50" disabled type="text" name="img2" value="<?php echo $classToEdit['IMG_2']?>"><br />
Image 3: <input size="50" disabled type="text" name="img3" value="<?php echo $classToEdit['IMG_3']?>"><br />
External Link 1: <input size="50" disabled type="text" name="extLink1" value="<?php echo $classToEdit['EXT_LINK_1']?>"><br />
External Link 2: <input size="50" disabled type="text" name="extLink2" value="<?php echo $classToEdit['EXT_LINK_2']?>"><br />
External Link 3: <input size="50" disabled type="text" name="extLink3" value="<?php echo $classToEdit['EXT_LINK_3']?>"><br />
UND 1: <input size="50" disabled type="text" name="und1" value="<?php echo $classToEdit['UND_1']?>"><br />
UND 2: <input size="50" disabled type="text" name="und2" value="<?php echo $classToEdit['UND_2']?>"><br />
UND 3: <input size="50" disabled type="text" name="und3" value="<?php echo $classToEdit['UND_3']?>"><br />
UND 4: <input size="50" disabled type="text" name="und4" value="<?php echo $classToEdit['UND_4']?>"><br />
UND 5: <input size="50" disabled type="text" name="und5" value="<?php echo $classToEdit['UND_5']?>"><br />
UND 6: <input size="50" disabled type="text" name="und6" value="<?php echo $classToEdit['UND_6']?>"><br />
UND 7: <input size="50" disabled type="text" name="und7" value="<?php echo $classToEdit['UND_7']?>"><br />
UND 8: <input size="50" disabled type="text" name="und8" value="<?php echo $classToEdit['UND_8']?>"><br />
UND 9: <input size="50" disabled type="text" name="und9" value="<?php echo $classToEdit['UND_9']?>"><br />
UND 10: <input size="50" disabled type="text" name="und10" value="<?php echo $classToEdit['UND_10']?>"><br />
Publish Date: <input disabled type="date" name="pub_date" value="<?php echo $classToEdit['Publish_Date']?>"><br />
Enrollment Limit: <input disabled type="Number" name="enr_limit" value="<?php echo $classToEdit['Enrollment_Limit']?>"><br />
Not Included For Interns: <input disabled type="checkbox" <?php if($classToEdit['Not_Included_For_Interns'] == 1){echo "checked";}?> name="not_inc_int"><br />
Seminars: <input disabled type="checkbox" <?php if($classToEdit['Seminars'] == 1){echo "checked";}?> name="sem"><br />
Events: <input disabled type="checkbox" <?php if($classToEdit['Events'] == 1){echo "checked";}?> name="eve"><br />
<?php } ?>
Accreditation Status: <input disabled type="checkbox" name="accred_status" <?php if($classToEdit['accred_status'] == 1){echo "checked";}?>><br />
Accrediting Organization Name: <input disabled type="text" size="50" name="accred_org_name" value="<?php echo $classToEdit['accred_org_name']?>"><br />
Number of Units: <input disabled type="Number" name="num_units" value="<?php echo $classToEdit['num_units']?>"><br />
Grade Level: <select disabled name="grade_level">
    <?php 
    switch ($classToEdit['grade_level']) {
    case 'Elementary': ?>
    <option selected value="Elementary">Elementary</option>
    <option value="Middle">Middle</option>
    <option value="High school">High School</option>
    <option value="College">College</option>
    <?php
        break;
    case 'Middle': ?>
    <option value="Elementary">Elementary</option>
    <option selected value="Middle">Middle</option>
    <option value="High school">High School</option>
    <option value="College">College</option>
    <?php
        break;
            case 'High school': ?>
    <option value="Elementary">Elementary</option>
    <option value="Middle">Middle</option>
    <option selected value="High school">High School</option>
    <option value="College">College</option>
    <?php
        break;
    case 'College': ?>
    <option value="Elementary">Elementary</option>
    <option value="Middle">Middle</option>
    <option value="High school">High School</option>
    <option selected value="College">College</option>
    <?php
        break;
    default: ?>
    <option selected value="notset">Not Set</option>
    <option value="Elementary">Elementary</option>
    <option value="Middle">Middle</option>
    <option value="High school">High School</option>
    <option value="College">College</option>
    <?php
        break; }?>
</select>
</form>

<a href="../index.php">Go back</a><br /><br />

</body>