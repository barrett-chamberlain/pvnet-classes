<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_class.php');

//escape form inputs
include('../_includes/escape_post_vars_classes.php');

$sql = "INSERT INTO " . $table_classes . " (`Class_ID`, `Class_Name`, `Department`, `Class_Number`, `Class_Section`, `activate`, `Instructor`, `Internal_Notes`, `Class_Description`, `Additional_Info`, `Prerequisite`, `Start_Week`, `End_Week`, `Age_Start`, `Age_End`, `Consummables_Fee`, `Hourly_Fee`, `Registration_Fee`, `Price_Included_For_Interns`, `Intern_Only`, `Field_Trip`, `Field_Trip_Wish_List`, `Class`, `Workshop`, `GroupBased`, `Seasonal_Classification`, `No_Weeks`, `M`, `T`, `W`, `TH`, `F`, `Sat`, `Sun`, `Hrs_Per_Class`, `Mtgs_Per_Wk`, `Total_Meetings`, `Total_Class_Time_Hrs`, `Start_Time`, `End_Time`, `AREA`, `IMG_1`, `IMG_2`, `IMG_3`, `EXT_LINK_1`, `EXT_LINK_2`, `EXT_LINK_3`, `UND_1`, `UND_2`, `UND_3`, `UND_4`, `UND_5`, `UND_6`, `UND_7`, `UND_8`, `UND_9`, `UND_10`) VALUES ('" . $classId_escaped . "', '" . $className_escaped . "', '" . $dept_escaped . "', '" . $_classNum_escaped . "', '" . $classSec_escaped . "', $activate, '" . $instr_escaped . "', '" . $int_notes_escaped . "', '" . $class_desc_escaped . "', '" . $addl_info_escaped . "', '" . $prereq_escaped . "', '" . $st_week_escaped . "', '" . $end_week_escaped . "', '" . $ageStart_escaped . "', '" . $ageEnd_escaped . "', '" . $consFee_escaped . "', '" . $hourFee_escaped . "', '" . $regFee_escaped . "', $priceInterns, $intOnly, $fieldTrip, $fieldTripWishList, $cl_as, $wkshp, $grpBased, '" . $seasClass_escaped . "', '" . $noWks_escaped . "', $mon, $tues, $wed, $thurs, $fri, $saturday, $sunday, '" . $hoursPerClass_escaped . "', '" . $meetingsPerWeek_escaped . "', '" . $totalMtgs_escaped . "', '" . $totClasTimeHrs_escaped . "', '" . $stTime_escaped . "', '" . $endTime_escaped . "', '" . $ar_ea_escaped . "', '" . $img1_escaped . "', '" . $img2_escaped . "', '" . $img3_escaped . "', '" . $extLink1_escaped . "', '" . $extLink2_escaped . "', '" . $extLink3_escaped . "', '" . $und1_escaped . "', '" . $und2_escaped . "', '" . $und3_escaped . "', '" . $und4_escaped . "', '" . $und5_escaped . "', '" . $und6_escaped . "', '" . $und7_escaped . "', '" . $und8_escaped . "', '" . $und9_escaped . "', '" . $und10_escaped . "');";


// debugger

// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }


$mysqli->query($sql);

$sql2 = "select max(id) from " . $table_classes . "";

$result = $mysqli->query($sql2);
// if (!$result = $mysqli->query($sql2)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

while ($getTopID = $result->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;

header("Location: ../index.php?inserted=$insertedID"); /* Redirect browser */
  exit();

?>