<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

$sql = "SELECT id, Class_ID, Class_Name, Department, Class_Number, Class_Section, Activate, Instructor, Internal_Notes, Class_Description, Additional_Info, Prerequisite, Start_Week, End_Week, Age_Start, Age_End, Consummables_Fee, Hourly_Fee, Registration_Fee, Price_Included_For_Interns, Intern_Only, Field_Trip, Field_Trip_Wish_List, Class, Workshop, `GroupBased`, Seasonal_Classification, No_Weeks, M, T, W, TH, F, Sat, Sun, Hrs_Per_Class, Mtgs_Per_Wk, Total_Meetings, Total_Class_Time_Hrs, Start_Time, End_Time, AREA, IMG_1, IMG_2, IMG_3, EXT_LINK_1, EXT_LINK_2, EXT_LINK_3, UND_1, UND_2, UND_3, UND_4, UND_5, UND_6, UND_7, UND_8, UND_9, UND_10 FROM " . $table . " where id = '" . $_GET['id'] . "'";

// echo $sql . '<br />';

//debugger
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

$result = $mysqli->query($sql);

while ($classToEdit = $result->fetch_assoc()) { ?>
<h3>EDITING RECORD: #<?php echo $classToEdit['id']?><br />
==============
</h3>
<a href="index.php">Go back</a> | <a href="duplicateclass.php?id=<?php echo $classToEdit['id']?>">Duplicate this class</a> | <a href="confirmdelete.php?id=<?php echo $classToEdit['id']?>">Delete this class</a><br /><br />
<p>
Class ID: <?php echo $classToEdit['Class_ID']?><br />
Class Name: <?php echo $classToEdit['Class_Name']?><br />
Department: <?php echo $classToEdit['Department']?><br />
</p>
<form method="post" action="processeditedclass.php">
<input type="hidden" name="dbid" value="<?php echo $classToEdit['id']?>">
Class ID: <input required="required" type="text" name="classId" value="<?php echo $classToEdit['Class_ID']?>"><br />
Class Name: <input required="required" type="text" name="className" size="50" value="<?php echo $classToEdit['Class_Name']?>"><br />
Department: <input type="text" size="50" name="dept" value="<?php echo $classToEdit['Department']?>"><br />
Class Number: <input type="number" name="classNum" value="<?php echo $classToEdit['Class_Number']?>"><br />
Class Section: <input type="number" name="classSec" value="<?php echo $classToEdit['Class_Section']?>"><br />
Activate: <input type="checkbox" <?php if($classToEdit['Activate'] == 1){echo "checked";}?> name="actv"><br />
Instructor: <input type="text" size="50" name="instr" value="<?php echo $classToEdit['Instructor']?>"><br />
Internal Notes: <textarea rows="4" cols="50" name="int_notes"><?php echo $classToEdit['Internal_Notes']?></textarea><br />
Class Description: <textarea rows="4" cols="50" name="class_desc"><?php echo $classToEdit['Class_Description']?></textarea><br />
Additional Info: <textarea rows="4" cols="50" name="addl_info"><?php echo $classToEdit['Additional_Info']?></textarea><br />
Prerequisite: <textarea rows="4" cols="50" name="prereq"><?php echo $classToEdit['Prerequisite']?></textarea><br />
Start Week: <input type="date" name="st_week" value="<?php echo $classToEdit['Start_Week']?>"><br />
End Week: <input type="date" name="end_week" value="<?php echo $classToEdit['End_Week']?>"><br />
Age Start: <input type="Number" name="ageStart" value="<?php echo $classToEdit['Age_Start']?>"><br />
Age End: <input type="Number" name="ageEnd" value="<?php echo $classToEdit['Age_End']?>"><br />
Consumables Fee: <input type="Number" name="consFee" value="<?php echo $classToEdit['Consummables_Fee']?>"><br />
Hourly Fee: <input type="Number" name="hourFee" value="<?php echo $classToEdit['Hourly_Fee']?>"><br />
Registration Fee: <input type="Number" name="regFee" value="<?php echo $classToEdit['Registration_Fee']?>"><br />
Price Included For Interns: <input type="checkbox" <?php if($classToEdit['Price_Included_For_Interns'] == 1){echo "checked";}?> name="priceInterns"><br />
Intern Only: <input type="checkbox" <?php if($classToEdit['Intern_Only'] == 1){echo "checked";}?> name="intOnly"><br />
Field Trip: <input type="checkbox" <?php if($classToEdit['Field_Trip'] == 1){echo "checked";}?> name="fieldTrip"><br />
Field Trip Wish List: <input type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="fieldTripWishList"><br />
Class: <input type="checkbox" <?php if($classToEdit['Field_Trip_Wish_List'] == 1){echo "checked";}?> name="cl"><br />
Workshop: <input type="checkbox" <?php if($classToEdit['Workshop'] == 1){echo "checked";}?> name="wkshp"><br />
Group-Based: <input type="checkbox" <?php if($classToEdit['GroupBased'] == 1){echo "checked";}?> name="grpBased"><br />
Seasonal Classification: <input type="text" name="seasClass" value="<?php echo $classToEdit['Seasonal_Classification']?>"><br />
No Weeks: <input type="text" name="noWks" value="<?php echo $classToEdit['No_Weeks']?>"><br />
Monday: <input type="checkbox" <?php if($classToEdit['M'] == 1){echo "checked";}?> name="mon"><br />
Tuesday: <input type="checkbox" <?php if($classToEdit['T'] == 1){echo "checked";}?> name="tues"><br />
Wednesday: <input type="checkbox" <?php if($classToEdit['W'] == 1){echo "checked";}?> name="wed"><br />
Thursday: <input type="checkbox" <?php if($classToEdit['TH'] == 1){echo "checked";}?> name="thurs"><br />
Friday: <input type="checkbox" <?php if($classToEdit['F'] == 1){echo "checked";}?> name="friday"><br />
Saturday: <input type="checkbox" <?php if($classToEdit['Sat'] == 1){echo "checked";}?> name="saturday"><br />
Sunday: <input type="checkbox" <?php if($classToEdit['Sun'] == 1){echo "checked";}?> name="sunday"><br />
Hours Per Class: <input type="Number" name="hoursPerClass" value="<?php echo $classToEdit['Hrs_Per_Class']?>"><br />
Meetings Per Week: <input type="Number" name="meetingsPerWeek" value="<?php echo $classToEdit['Mtgs_Per_Wk']?>"><br />
Total Meetings: <input type="Number" name="totalMtgs" value="<?php echo $classToEdit['Total_Meetings']?>"><br />
Total Class Time Hours: <input type="Number" name="totClasTimeHrs" value="<?php echo $classToEdit['Total_Class_Time_Hrs']?>"><br />
Start Time: <input type="time" name="stTime" value="<?php echo $classToEdit['Start_Time']?>"><br />
End Time: <input type="time" name="endTime" value="<?php echo $classToEdit['End_Time']?>"><br />
Area: <input type="text" size="50" name="ar_ea" value="<?php echo $classToEdit['AREA']?>"><br />
Image 1: <input type="text" size="50" name="img1" value="<?php echo $classToEdit['IMG_1']?>"><br />
Image 2: <input type="text" size="50" name="img2" value="<?php echo $classToEdit['IMG_2']?>"><br />
Image 3: <input type="text" size="50" name="img3" value="<?php echo $classToEdit['IMG_3']?>"><br />
External Link 1: <input type="text" size="50" name="extLink1" value="<?php echo $classToEdit['EXT_LINK_1']?>"><br />
External Link 2: <input type="text" size="50" name="extLink2" value="<?php echo $classToEdit['EXT_LINK_2']?>"><br />
External Link 3: <input type="text" size="50" name="extLink3" value="<?php echo $classToEdit['EXT_LINK_3']?>"><br />
UND 1: <input type="text" name="und1" size="50" value="<?php echo $classToEdit['UND_1']?>"><br />
UND 2: <input type="text" name="und2" size="50" value="<?php echo $classToEdit['UND_2']?>"><br />
UND 3: <input type="text" name="und3" size="50" value="<?php echo $classToEdit['UND_3']?>"><br />
UND 4: <input type="text" name="und4" size="50" value="<?php echo $classToEdit['UND_4']?>"><br />
UND 5: <input type="text" name="und5" size="50" value="<?php echo $classToEdit['UND_5']?>"><br />
UND 6: <input type="text" name="und6" size="50" value="<?php echo $classToEdit['UND_6']?>"><br />
UND 7: <input type="text" name="und7" size="50" value="<?php echo $classToEdit['UND_7']?>"><br />
UND 8: <input type="text" name="und8" size="50" value="<?php echo $classToEdit['UND_8']?>"><br />
UND 9: <input type="text" name="und9" size="50" value="<?php echo $classToEdit['UND_9']?>"><br />
UND 10: <input type="text" name="und10" size="50" value="<?php echo $classToEdit['UND_10']?>"><br />
<input type="submit">
</form>

<?php } ?>
</body>