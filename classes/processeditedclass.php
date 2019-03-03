<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_class.php');

//escape form inputs
include('../_includes/escape_post_vars_classes.php');

$sql = "update " . $table_classes . " set Class_ID = '" . $classId_escaped . "', Class_Name = '" . $className_escaped . "', Department = '" . $dept_escaped . "', Class_Number = '" . $classNum_escaped . "', Class_Section = '" . $classSec_escaped . "', activate = " . $activate . ", Instructor = '" . $instr_escaped . "', Internal_Notes = '" . $int_notes_escaped . "', Class_Description = '" . $class_desc_escaped . "', Additional_Info = '" . $addl_info_escaped . "', Prerequisite = '" . $prereq_escaped . "', Start_Week = '" . $st_week_escaped . "', End_Week = '" . $end_week_escaped . "', Age_Start = '" . $ageStart_escaped . "', Age_End = '" . $ageEnd_escaped . "', Consummables_Fee = '" . $consFee_escaped . "', Hourly_Fee = '" . $hourFee_escaped . "', Registration_Fee = '" . $regFee_escaped . "', Price_Included_For_Interns = '" . $priceInterns . "', Intern_Only = '" . $intOnly . "', Field_Trip = '" . $fieldTrip . "', Field_Trip_Wish_List = '" . $fieldTripWishList . "', Class = '" . $cl_as . "', Workshop = '" . $wkshp . "', GroupBased = '" . $grpBased . "', Seasonal_Classification = '" . $seasClass_escaped . "', No_Weeks = '" . $noWks_escaped . "', M = '" . $mon . "', T = '" . $tues . "', W = '" . $wed . "', TH = '" . $thurs . "', F = '" . $fri . "', Sat = '" . $saturday . "', Sun = '" . $sunday . "', Hrs_Per_Class = '" . $hoursPerClass_escaped . "', Mtgs_Per_Wk = '" . $meetingsPerWeek_escaped . "', Total_Meetings = '" . $totalMtgs_escaped . "', Total_Class_Time_Hrs = '" . $totClasTimeHrs_escaped . "', Start_Time = '" . $stTime_escaped . "', End_Time = '" . $endTime_escaped . "', AREA = '" . $ar_ea_escaped . "', IMG_1 = '" . $img1_escaped . "', IMG_2 = '" . $img2_escaped . "', IMG_3 = '" . $img3_escaped . "', EXT_LINK_1 = '" . $extLink1_escaped . "', EXT_LINK_2 = '" . $extLink2_escaped . "', EXT_LINK_3 = '" . $extLink3_escaped . "', UND_1 = '" . $und1_escaped . "', UND_2 = '" . $und2_escaped . "', UND_3 = '" . $und3_escaped . "', UND_4 = '" . $und4_escaped . "', UND_5 = '" . $und5_escaped . "', UND_6 = '" . $und6_escaped . "', UND_7 = '" . $und7_escaped . "', UND_8 = '" . $und8_escaped . "', UND_9 = '" . $und9_escaped . "', UND_10 = '" . $und10_escaped . "', Publish_Date = '" . $pub_date_escaped . "', Enrollment_Limit = '" . $enr_limit_escaped . "', Not_Included_For_Interns = '" . $not_inc_int . "', Seminars = '" . $sem . "', Events = '" . $eve . "' where id = '" . $dbid_escaped . "'";
//debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

// echo 'activate: ' . $activate;

$mysqli->query($sql);

// echo $sql;
header("Location: editclass.php?id=$dbid_escaped&edited=1"); /* Redirect browser */
  exit();

?>