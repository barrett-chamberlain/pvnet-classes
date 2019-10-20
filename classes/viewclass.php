<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/prettify.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/prettify.js"></script>
<script type="text/javascript" src="../js/jquery.collapsible-menus.min.js"></script>
<script type="text/javascript" src="../js/site.js"></script>
<title>View Class</title>
</head>
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
    <a href="viewclass.php?id=<?php echo $nextClass?>&next=1">View next class</a>
<?php } ?>
<br /><br />
<p>
Class ID: <?php echo $classToEdit['Class_ID']?><br />
Class Name: <?php echo $classToEdit['Class_Name']?><br />
Department: <?php echo $classToEdit['Department']?><br /><br />
<a href="../index.php">Go back</a> | <a href="editclass.php?id=<?php echo $classToEdit['id']?>">Edit this class</a> | <a href="duplicateclass.php?id=<?php echo $classToEdit['id']?>">Duplicate this class</a> | <a href="confirmdelete.php?id=<?php echo $classToEdit['id']?>">Delete this class</a><br /><br />
</p>

<form>
<input disabled type="hidden" name="dbid" value="<?php echo $classToEdit['id']?>">
<ul id="first">
    <li><a href="javascript:;">Classification</a></li>
    <li>
        <ul>
            <li>Class ID: <input disabled required="required" type="text" name="classId" value="<?php echo $classToEdit['Class_ID']?>"></li>
            <li>Class Name: <input disabled required="required" type="text" name="className" size="50" value="<?php echo $classToEdit['Class_Name']?>"></li>
            <li>Department: <input disabled type="text" size="50" name="dept" value="<?php echo $classToEdit['Department']?>"></li>
            <li>Class Number: <input disabled type="number" name="classNum" value="<?php echo $classToEdit['Class_Number']?>"></li>
            <li>Class Section: <input disabled type="number" name="classSec" value="<?php echo $classToEdit['Class_Section']?>"></li>
            <li>Activate: <input disabled type="checkbox" <?php if($classToEdit['activate'] == 1){echo "checked";}?> name="actv"></li>
            <li>Instructor: <input disabled type="text" size="50" name="instr" value="<?php echo $classToEdit['Instructor']?>"></li>
            <li>Class Description: <textarea disabled rows="4" cols="50" name="class_desc"><?php echo $classToEdit['Class_Description']?></textarea></li>
            <li>Additional Info: <textarea disabled rows="4" cols="50" name="addl_info"><?php echo $classToEdit['Additional_Info']?></textarea></li>
            <li>Prerequisite: <textarea disabled rows="4" cols="50" name="prereq"><?php echo $classToEdit['Prerequisite']?></textarea></li>
        </ul>
    </li>       
</ul><!-- /Classification -->
<ul id="accordion">
    <li><a href="javascript:;">Times and Pricing</a></li>
    <li>
        <ul>
            <li>Start Week: <input disabled type="date" name="st_week" value="<?php echo $classToEdit['Start_Week']?>"></li>
            <li>End Week: <input disabled type="date" name="end_week" value="<?php echo $classToEdit['End_Week']?>"></li>
            <li>Age Start: <input disabled type="Number" name="ageStart" value="<?php echo $classToEdit['Age_Start']?>"></li>
            <li>Age End: <input disabled type="Number" name="ageEnd" value="<?php echo $classToEdit['Age_End']?>"></li>
            <li>Consumables Fee: <input disabled type="Number" name="consFee" value="<?php echo $classToEdit['Consummables_Fee']?>"></li>
            <li>Hourly Fee: <input disabled type="Number" name="hourFee" value="<?php echo $classToEdit['Hourly_Fee']?>"></li>
            <li>Registration Fee: <input disabled type="Number" name="regFee" value="<?php echo $classToEdit['Registration_Fee']?>"></li>
            <li>Price Included For Interns: <input disabled type="checkbox" <?php if($classToEdit['Price_Included_For_Interns'] == 1){echo "checked";}?> name="priceInterns"></li>
            <li>Price for Interns: <input disabled type="Number" name="price_for_interns" value="<?php echo $classToEdit['price_for_interns']?>"></li>
            <li>Price for Students: <input disabled type="Number" name="price_for_students" value="<?php echo $classToEdit['price_for_students']?>"></li>
            <li>Seasonal Classification: <input disabled type="text" name="seasClass" value="<?php echo $classToEdit['Seasonal_Classification']?>"></li>
            <li>No Weeks: <input disabled type="text" name="noWks" value="<?php echo $classToEdit['No_Weeks']?>"></li>
            <li><a href='#'>Days of the Week</a></li>
            <li>
                <ul>
                    <li>Monday: <input disabled type="checkbox" <?php if($classToEdit['M'] == 1){echo "checked";}?> name="mon"></li>
                    <li>Tuesday: <input disabled type="checkbox" <?php if($classToEdit['T'] == 1){echo "checked";}?> name="tues"></li>
                    <li>Wednesday: <input disabled type="checkbox" <?php if($classToEdit['W'] == 1){echo "checked";}?> name="wed"></li>
                    <li>Thursday: <input disabled type="checkbox" <?php if($classToEdit['TH'] == 1){echo "checked";}?> name="thurs"></li>
                    <li>Friday: <input disabled type="checkbox" <?php if($classToEdit['F'] == 1){echo "checked";}?> name="friday"></li>
                    <li>Saturday: <input disabled type="checkbox" <?php if($classToEdit['Sat'] == 1){echo "checked";}?> name="saturday"></li>
                    <li>Sunday: <input disabled type="checkbox" <?php if($classToEdit['Sun'] == 1){echo "checked";}?> name="sunday"></li>
                </ul>
            </li>
            <li>Hours Per Class: <input disabled type="Number" name="hoursPerClass" value="<?php echo $classToEdit['Hrs_Per_Class']?>"></li>
            <li>Meetings Per Week: <input disabled type="Number" name="meetingsPerWeek" value="<?php echo $classToEdit['Mtgs_Per_Wk']?>"></li>
            <li>Total Meetings: <input disabled type="Number" name="totalMtgs" value="<?php echo $classToEdit['Total_Meetings']?>"></li>
            <li>Total Class Time Hours: <input disabled type="Number" name="totClasTimeHrs" value="<?php echo $classToEdit['Total_Class_Time_Hrs']?>"></li>
            <li>Start Time: <input disabled type="time" name="stTime" value="<?php echo $classToEdit['Start_Time']?>"></li>
            <li>End Time: <input disabled type="time" name="endTime" value="<?php echo $classToEdit['End_Time']?>"></li>
        </ul>
    </li>       
</ul><!-- /Times and Pricing -->
<ul id="accordion">
    <li><a href="javascript:;">Class Details</a></li>
    <li>
        <ul>
            <li>Intern Only: <input disabled type="checkbox" <?php if($classToEdit['Intern_Only'] == 1){echo "checked";}?> name="intOnly"></li>
            <li>Field Trip: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip'] == 1){echo "checked";}?> name="fieldTrip"></li>
            <li>Field Trip Wish List: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="fieldTripWishList"></li>
            <li>Class: <input disabled type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="cl"></li>
            <li>Workshop: <input disabled type="checkbox" <?php if($classToEdit['Workshop'] == 1){echo "checked";}?> name="wkshp"></li>
            <li>Group-Based: <input disabled type="checkbox" <?php if($classToEdit['GroupBased'] == 1){echo "checked";}?> name="grpBased"></li>
            <li>Publish Date: <input disabled type="date" name="pub_date" value="<?php echo $classToEdit['Publish_Date']?>"></li>
            <li>Enrollment Limit: <input disabled type="Number" name="enr_limit" value="<?php echo $classToEdit['Enrollment_Limit']?>"></li>
            <li>Not Included For Interns: <input disabled type="checkbox" <?php if($classToEdit['Not_Included_For_Interns'] == 1){echo "checked";}?> name="not_inc_int"><br />
            <li>Seminars: <input disabled type="checkbox" <?php if($classToEdit['Seminars'] == 1){echo "checked";}?> name="sem"></li>
            <li>Events: <input disabled type="checkbox" <?php if($classToEdit['Events'] == 1){echo "checked";}?> name="eve"></li>
            <li>Accreditation Status: <input disabled type="checkbox" name="accred_status" <?php if($classToEdit['accred_status'] == 1){echo "checked";}?>></li>
            <li>Accrediting Organization Name: <input disabled type="text" size="50" name="accred_org_name" value="<?php echo $classToEdit['accred_org_name']?>"></li>
            <li>Number of Units: <input disabled type="Number" name="num_units" value="<?php echo $classToEdit['num_units']?>"></li>
            <li>Grade Level: <select disabled name="grade_level">
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
                <?php break; }?>
                </select>
            </li>
            <li>Internal Notes: <textarea disabled rows="4" cols="50" name="int_notes"><?php echo $classToEdit['Internal_Notes']?></textarea></li>
        </ul>
    </li>       
</ul><!-- /Class Details -->
<ul id="accordion">
    <li><a href="javascript:;">Links and Images</a></li>
    <li>
        <ul>
            <li>Area: <input disabled type="text" size="50" name="ar_ea" value="<?php echo $classToEdit['AREA']?>"></li>
            <li>Image 1: <input disabled type="text" size="50" name="img1" value="<?php echo $classToEdit['IMG_1']?>"></li>
            <li>Image 2: <input disabled type="text" size="50" name="img2" value="<?php echo $classToEdit['IMG_2']?>"></li>
            <li>Image 3: <input disabled type="text" size="50" name="img3" value="<?php echo $classToEdit['IMG_3']?>"></li>
            <li>External Link 1: <input disabled type="text" size="50" name="extLink1" value="<?php echo $classToEdit['EXT_LINK_1']?>"></li>
            <li>External Link 2: <input disabled type="text" size="50" name="extLink2" value="<?php echo $classToEdit['EXT_LINK_2']?>"></li>
            <li>External Link 3: <input disabled type="text" size="50" name="extLink3" value="<?php echo $classToEdit['EXT_LINK_3']?>"></li>
            <li>UND 1: <input disabled type="text" name="und1" size="50" value="<?php echo $classToEdit['UND_1']?>"></li>
            <li>UND 2: <input disabled type="text" name="und2" size="50" value="<?php echo $classToEdit['UND_2']?>"></li>
            <li>UND 3: <input disabled type="text" name="und3" size="50" value="<?php echo $classToEdit['UND_3']?>"></li>
            <li>UND 4: <input disabled type="text" name="und4" size="50" value="<?php echo $classToEdit['UND_4']?>"></li>
            <li>UND 5: <input disabled type="text" name="und5" size="50" value="<?php echo $classToEdit['UND_5']?>"></li>
            <li>UND 6: <input disabled type="text" name="und6" size="50" value="<?php echo $classToEdit['UND_6']?>"></li>
            <li>UND 7: <input disabled type="text" name="und7" size="50" value="<?php echo $classToEdit['UND_7']?>"></li>
            <li>UND 8: <input disabled type="text" name="und8" size="50" value="<?php echo $classToEdit['UND_8']?>"></li>
            <li>UND 9: <input disabled type="text" name="und9" size="50" value="<?php echo $classToEdit['UND_9']?>"></li>
            <li>UND 10: <input disabled type="text" name="und10" size="50" value="<?php echo $classToEdit['UND_10']?>"></li>
        </ul>
    </li>       
</ul><!-- /Links and Images -->
</form>
<?php } ?>
<a href="../index.php">Go back</a><br /><br />
</body>
</html>