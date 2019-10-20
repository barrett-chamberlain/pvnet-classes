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
<title>Edit Class</title>
</head>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//get class selected for editing
$sql = "SELECT * FROM " . $table_classes . " where id = '" . $cleanedID . "'";

//get upper limit for next class link
$sql4 = "select max(id) from " . $table_classes . "";
$result4 = $mysqli->query($sql4);

//get lower limit for prev class link
$sql5 = "select min(id) from " . $table_classes . "";
$result5 = $mysqli->query($sql5);

while ($getTopID = $result4->fetch_assoc()) {
 $maxID = $getTopID["max(id)"];
}
while ($getBottomID = $result5->fetch_assoc()) {
 $minID = $getBottomID["min(id)"];
}

//display banner at top of page if action has been completed
if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class duplicated.</p><br /><br />
</div> <?php }
if (isset($_GET['edited'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class edited.</p><br /><br />
</div>
<?php } 

$result = $mysqli->query($sql);

$sql2 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
$result2 = $mysqli->query($sql2);

//increment/decrement ID and rerun query until record found for prev/next links
while($result2->num_rows === 0 and $_GET['prev'] == 1)
    {
        $cleanedID--;
        $sql2 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
        $result2 = $mysqli->query($sql2);
    }
while($result2->num_rows === 0 and $_GET['next'] == 1)
    {
        $cleanedID++;
        $sql2 = "SELECT id FROM " . $table_classes . " where id = '" . $cleanedID . "'";
        $result2 = $mysqli->query($sql2);
    }
//re-establish SQL statement with found valid ID
$sql = "SELECT * FROM " . $table_classes . " where id = '" . $cleanedID . "'";
$result = $mysqli->query($sql);

$nextClass = $cleanedID + 1;
$prevClass = $cleanedID - 1;

//list out input fields with DB info set for values
while ($classToEdit = $result->fetch_assoc()) { ?>
<h3>EDITING RECORD: #<?php echo $classToEdit['id']?><br />
==============
</h3>
<?php if($cleanedID == $minID) { } else { ?>
	<a href="editclass.php?id=<?php echo $prevClass?>&prev=1">Edit previous record</a><?php } ?>
&nbsp;&nbsp;
<?php if($cleanedID == $maxID) { } else { ?>
<a href="editclass.php?id=<?php echo $nextClass?>&next=1">
Edit next record</a><?php } ?>
<br /><br />
<a href="../index.php">Go back</a> | <a href="duplicateclass.php?id=<?php echo $classToEdit['id']?>">Duplicate this class</a> | <a href="confirmdelete.php?id=<?php echo $classToEdit['id']?>">Delete this class</a><br /><br />
<p>
Class ID: <?php echo $classToEdit['Class_ID']?><br />
Class Name: <?php echo $classToEdit['Class_Name']?><br />
Department: <?php echo $classToEdit['Department']?><br />
</p>
<form method="post" action="processeditedclass.php">
<input type="submit"><br />
<input type="hidden" name="dbid" value="<?php echo $classToEdit['id']?>"><br />
<ul id="first">
    <li><a href="javascript:;">Classification</a></li>
    <li>
        <ul>
            <li>Class ID: <input required="required" type="text" name="classId" value="<?php echo $classToEdit['Class_ID']?>"></li>
            <li>Class Name: <input required="required" type="text" name="className" size="50" value="<?php echo $classToEdit['Class_Name']?>"></li>
            <li>Department: <input type="text" size="50" name="dept" value="<?php echo $classToEdit['Department']?>"></li>
            <li>Class Number: <input type="number" name="classNum" value="<?php echo $classToEdit['Class_Number']?>"></li>
            <li>Class Section: <input type="number" name="classSec" value="<?php echo $classToEdit['Class_Section']?>"></li>
            <li>Activate: <input type="checkbox" <?php if($classToEdit['activate'] == 1){echo "checked";}?> name="actv"></li>
            <li>Instructor: <input type="text" size="50" name="instr" value="<?php echo $classToEdit['Instructor']?>"></li>
            <li>Class Description: <textarea rows="4" cols="50" name="class_desc"><?php echo $classToEdit['Class_Description']?></textarea></li>
            <li>Additional Info: <textarea rows="4" cols="50" name="addl_info"><?php echo $classToEdit['Additional_Info']?></textarea></li>
            <li>Prerequisite: <textarea rows="4" cols="50" name="prereq"><?php echo $classToEdit['Prerequisite']?></textarea></li>
        </ul>
    </li>       
</ul><!-- /Classification -->
<ul id="accordion">
    <li><a href="javascript:;">Times and Pricing</a></li>
    <li>
        <ul>
            <li>Start Week: <input type="date" name="st_week" value="<?php echo $classToEdit['Start_Week']?>"></li>
            <li>End Week: <input type="date" name="end_week" value="<?php echo $classToEdit['End_Week']?>"></li>
            <li>Age Start: <input type="Number" name="ageStart" value="<?php echo $classToEdit['Age_Start']?>"></li>
            <li>Age End: <input type="Number" name="ageEnd" value="<?php echo $classToEdit['Age_End']?>"></li>
            <li>Consumables Fee: <input type="Number" name="consFee" value="<?php echo $classToEdit['Consummables_Fee']?>"></li>
            <li>Hourly Fee: <input type="Number" name="hourFee" value="<?php echo $classToEdit['Hourly_Fee']?>"></li>
            <li>Registration Fee: <input type="Number" name="regFee" value="<?php echo $classToEdit['Registration_Fee']?>"></li>
            <li>Price Included For Interns: <input type="checkbox" <?php if($classToEdit['Price_Included_For_Interns'] == 1){echo "checked";}?> name="priceInterns"></li>
            <li>Price for Interns: <input type="Number" name="price_for_interns" value="<?php echo $classToEdit['price_for_interns']?>"></li>
            <li>Price for Students: <input type="Number" name="price_for_students" value="<?php echo $classToEdit['price_for_students']?>"></li>
            <li>Seasonal Classification: <input type="text" name="seasClass" value="<?php echo $classToEdit['Seasonal_Classification']?>"></li>
            <li>No Weeks: <input type="text" name="noWks" value="<?php echo $classToEdit['No_Weeks']?>"></li>
            <li><a href='#'>Days of the Week</a></li>
            <li>
                <ul>
                    <li>Monday: <input type="checkbox" <?php if($classToEdit['M'] == 1){echo "checked";}?> name="mon"></li>
                    <li>Tuesday: <input type="checkbox" <?php if($classToEdit['T'] == 1){echo "checked";}?> name="tues"></li>
                    <li>Wednesday: <input type="checkbox" <?php if($classToEdit['W'] == 1){echo "checked";}?> name="wed"></li>
                    <li>Thursday: <input type="checkbox" <?php if($classToEdit['TH'] == 1){echo "checked";}?> name="thurs"></li>
                    <li>Friday: <input type="checkbox" <?php if($classToEdit['F'] == 1){echo "checked";}?> name="friday"></li>
                    <li>Saturday: <input type="checkbox" <?php if($classToEdit['Sat'] == 1){echo "checked";}?> name="saturday"></li>
                    <li>Sunday: <input type="checkbox" <?php if($classToEdit['Sun'] == 1){echo "checked";}?> name="sunday"></li>
                </ul>
            </li>
            <li>Hours Per Class: <input type="Number" name="hoursPerClass" value="<?php echo $classToEdit['Hrs_Per_Class']?>"></li>
            <li>Meetings Per Week: <input type="Number" name="meetingsPerWeek" value="<?php echo $classToEdit['Mtgs_Per_Wk']?>"></li>
            <li>Total Meetings: <input type="Number" name="totalMtgs" value="<?php echo $classToEdit['Total_Meetings']?>"></li>
            <li>Total Class Time Hours: <input type="Number" name="totClasTimeHrs" value="<?php echo $classToEdit['Total_Class_Time_Hrs']?>"></li>
            <li>Start Time: <input type="time" name="stTime" value="<?php echo $classToEdit['Start_Time']?>"></li>
            <li>End Time: <input type="time" name="endTime" value="<?php echo $classToEdit['End_Time']?>"></li>
        </ul>
    </li>       
</ul><!-- /Times and Pricing -->
<ul id="accordion">
    <li><a href="javascript:;">Class Details</a></li>
    <li>
        <ul>
            <li>Intern Only: <input type="checkbox" <?php if($classToEdit['Intern_Only'] == 1){echo "checked";}?> name="intOnly"></li>
            <li>Field Trip: <input type="checkbox" <?php if($classToEdit['Field_Trip'] == 1){echo "checked";}?> name="fieldTrip"></li>
            <li>Field Trip Wish List: <input type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="fieldTripWishList"></li>
            <li>Class: <input type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="cl"></li>
            <li>Workshop: <input type="checkbox" <?php if($classToEdit['Workshop'] == 1){echo "checked";}?> name="wkshp"></li>
            <li>Group-Based: <input type="checkbox" <?php if($classToEdit['GroupBased'] == 1){echo "checked";}?> name="grpBased"></li>
            <li>Publish Date: <input type="date" name="pub_date" value="<?php echo $classToEdit['Publish_Date']?>"></li>
            <li>Enrollment Limit: <input type="Number" name="enr_limit" value="<?php echo $classToEdit['Enrollment_Limit']?>"></li>
            <li>Not Included For Interns: <input type="checkbox" <?php if($classToEdit['Not_Included_For_Interns'] == 1){echo "checked";}?> name="not_inc_int"><br />
            <li>Seminars: <input type="checkbox" <?php if($classToEdit['Seminars'] == 1){echo "checked";}?> name="sem"></li>
            <li>Events: <input type="checkbox" <?php if($classToEdit['Events'] == 1){echo "checked";}?> name="eve"></li>
            <li>Accreditation Status: <input type="checkbox" name="accred_status" <?php if($classToEdit['accred_status'] == 1){echo "checked";}?>></li>
            <li>Accrediting Organization Name: <input type="text" size="50" name="accred_org_name" value="<?php echo $classToEdit['accred_org_name']?>"></li>
            <li>Number of Units: <input type="Number" name="num_units" value="<?php echo $classToEdit['num_units']?>"></li>
            <li>Grade Level: <select name="grade_level">
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
            <li>Internal Notes: <textarea rows="4" cols="50" name="int_notes"><?php echo $classToEdit['Internal_Notes']?></textarea></li>
        </ul>
    </li>       
</ul><!-- /Class Details -->
<ul id="accordion">
    <li><a href="javascript:;">Links and Images</a></li>
    <li>
        <ul>
            <li>Area: <input type="text" size="50" name="ar_ea" value="<?php echo $classToEdit['AREA']?>"></li>
            <li>Image 1: <input type="text" size="50" name="img1" value="<?php echo $classToEdit['IMG_1']?>"></li>
            <li>Image 2: <input type="text" size="50" name="img2" value="<?php echo $classToEdit['IMG_2']?>"></li>
            <li>Image 3: <input type="text" size="50" name="img3" value="<?php echo $classToEdit['IMG_3']?>"></li>
            <li>External Link 1: <input type="text" size="50" name="extLink1" value="<?php echo $classToEdit['EXT_LINK_1']?>"></li>
            <li>External Link 2: <input type="text" size="50" name="extLink2" value="<?php echo $classToEdit['EXT_LINK_2']?>"></li>
            <li>External Link 3: <input type="text" size="50" name="extLink3" value="<?php echo $classToEdit['EXT_LINK_3']?>"></li>
            <li>UND 1: <input type="text" name="und1" size="50" value="<?php echo $classToEdit['UND_1']?>"></li>
            <li>UND 2: <input type="text" name="und2" size="50" value="<?php echo $classToEdit['UND_2']?>"></li>
            <li>UND 3: <input type="text" name="und3" size="50" value="<?php echo $classToEdit['UND_3']?>"></li>
            <li>UND 4: <input type="text" name="und4" size="50" value="<?php echo $classToEdit['UND_4']?>"></li>
            <li>UND 5: <input type="text" name="und5" size="50" value="<?php echo $classToEdit['UND_5']?>"></li>
            <li>UND 6: <input type="text" name="und6" size="50" value="<?php echo $classToEdit['UND_6']?>"></li>
            <li>UND 7: <input type="text" name="und7" size="50" value="<?php echo $classToEdit['UND_7']?>"></li>
            <li>UND 8: <input type="text" name="und8" size="50" value="<?php echo $classToEdit['UND_8']?>"></li>
            <li>UND 9: <input type="text" name="und9" size="50" value="<?php echo $classToEdit['UND_9']?>"></li>
            <li>UND 10: <input type="text" name="und10" size="50" value="<?php echo $classToEdit['UND_10']?>"></li>
        </ul>
    </li>       
</ul><!-- /Links and Images -->
<input type="submit">
</form>

<?php } ?>
</body>
</html>