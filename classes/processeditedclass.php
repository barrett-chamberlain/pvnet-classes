<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_class.php');

//escape form inputs
// include('../_includes/escape_post_vars_classes.php');

foreach($_POST AS $key => $val) {
    $escapedEditedClass[$key] = mysqli_real_escape_string($mysqli, $val);
}
// print_r($escapedEditedClass);
// exit;

//update table with escaped form values
$sql = "update " . $table_classes . " set Class_ID = '" . $escapedEditedClass["classId"] . "', Class_Name = '" . $escapedEditedClass["className"] . "', Department = '" . $escapedEditedClass["dept"] . "', Class_Number = '" . $escapedEditedClass["classNum"] . "', Class_Section = '" . $escapedEditedClass["classSec"] . "', activate = " . $activate . ", Instructor = '" . $escapedEditedClass["instr"] . "', Internal_Notes = '" . $escapedEditedClass["int_notes"] . "', Class_Description = '" . $escapedEditedClass["class_desc"] . "', Additional_Info = '" . $escapedEditedClass["addl_info"] . "', Prerequisite = '" . $escapedEditedClass["prereq"] . "', Start_Week = '" . $escapedEditedClass["st_week"] . "', End_Week = '" . $escapedEditedClass["end_week"] . "', Age_Start = '" . $escapedEditedClass["ageStart"] . "', Age_End = '" . $escapedEditedClass["ageEnd"] . "', Consummables_Fee = '" . $escapedEditedClass["consFee"] . "', Hourly_Fee = '" . $escapedEditedClass["hourFee"] . "', Registration_Fee = '" . $escapedEditedClass["regFee"] . "', Price_Included_For_Interns = '" . $priceInterns . "', Intern_Only = '" . $intOnly . "', Field_Trip = '" . $fieldTrip . "', Field_Trip_Wish_List = '" . $fieldTripWishList . "', Class = '" . $cl_as . "', Workshop = '" . $wkshp . "', GroupBased = '" . $grpBased . "', Seasonal_Classification = '" . $escapedEditedClass["seasClass"] . "', No_Weeks = '" . $escapedEditedClass["noWks"] . "', M = '" . $mon . "', T = '" . $tues . "', W = '" . $wed . "', TH = '" . $thurs . "', F = '" . $fri . "', Sat = '" . $saturday . "', Sun = '" . $sunday . "', Hrs_Per_Class = '" . $escapedEditedClass["hoursPerClass"] . "', Mtgs_Per_Wk = '" . $escapedEditedClass["meetingsPerWeek"] . "', Total_Meetings = '" . $escapedEditedClass["totalMtgs"] . "', Total_Class_Time_Hrs = '" . $escapedEditedClass["totClasTimeHrs"] . "', Start_Time = '" . $escapedEditedClass["stTime"] . "', End_Time = '" . $escapedEditedClass["endTime"] . "', AREA = '" . $escapedEditedClass["ar_ea"] . "', IMG_1 = '" . $escapedEditedClass["img1"] . "', IMG_2 = '" . $escapedEditedClass["img2"] . "', IMG_3 = '" . $escapedEditedClass["img3"] . "', EXT_LINK_1 = '" . $escapedEditedClass["extLink1"] . "', EXT_LINK_2 = '" . $escapedEditedClass["extLink2"] . "', EXT_LINK_3 = '" . $escapedEditedClass["extLink3"] . "', UND_1 = '" . $escapedEditedClass["und1"] . "', UND_2 = '" . $escapedEditedClass["und2"] . "', UND_3 = '" . $escapedEditedClass["und3"] . "', UND_4 = '" . $escapedEditedClass["und4"] . "', UND_5 = '" . $escapedEditedClass["und5"] . "', UND_6 = '" . $escapedEditedClass["und6"] . "', UND_7 = '" . $escapedEditedClass["und7"] . "', UND_8 = '" . $escapedEditedClass["und8"] . "', UND_9 = '" . $escapedEditedClass["und9"] . "', UND_10 = '" . $escapedEditedClass["und10"] . "', Publish_Date = '" . $escapedEditedClass["pub_date"] . "', Enrollment_Limit = '" . $escapedEditedClass["enr_limit"] . "', Not_Included_For_Interns = '" . $not_inc_int . "', Seminars = '" . $sem . "', Events = '" . $eve . "', price_for_interns = '" . $escapedEditedClass["price_for_interns"] . "', price_for_students = '" . $escapedEditedClass["price_for_students"] . "' where id = '" . $escapedEditedClass["dbid"] . "'";

// $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

header("Location: editclass.php?id=" . $escapedEditedClass["dbid"] . "&edited=1"); /* Redirect browser */
  exit();

?>