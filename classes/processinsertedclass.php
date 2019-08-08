<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//translate checkboxes from on and off to 1 and 0
include('../_includes/convert_checkboxes_class.php');

//escape form inputs
// include('../_includes/escape_post_vars_classes.php');

// print_r($_POST);
foreach($_POST AS $key => $val) {
    $escapedInsertClass[$key] = mysqli_real_escape_string($mysqli, $val);
}
// echo 'escapedInsertClass ' . print_r($escapedInsertClass);
// print_r($escapedInsertClass);
// echo $escapedInsertClass['className'];
// exit;


$sql = "INSERT INTO " . $table_classes . " (`Class_ID`, `Class_Name`, `Department`, `Class_Number`, `Class_Section`, `activate`, `Instructor`, `Internal_Notes`, `Class_Description`, `Additional_Info`, `Prerequisite`, `Start_Week`, `End_Week`, `Age_Start`, `Age_End`, `Consummables_Fee`, `Hourly_Fee`, `Registration_Fee`, `Price_Included_For_Interns`, `Intern_Only`, `Field_Trip`, `Field_Trip_Wish_List`, `Class`, `Workshop`, `GroupBased`, `Seasonal_Classification`, `No_Weeks`, `M`, `T`, `W`, `TH`, `F`, `Sat`, `Sun`, `Hrs_Per_Class`, `Mtgs_Per_Wk`, `Total_Meetings`, `Total_Class_Time_Hrs`, `Start_Time`, `End_Time`, `AREA`, `IMG_1`, `IMG_2`, `IMG_3`, `EXT_LINK_1`, `EXT_LINK_2`, `EXT_LINK_3`, `UND_1`, `UND_2`, `UND_3`, `UND_4`, `UND_5`, `UND_6`, `UND_7`, `UND_8`, `UND_9`, `UND_10`, `price_for_interns`, `price_for_students`, `accred_status`, `accred_org_name`, `num_units`, `grade_level`) VALUES ('" . $escapedInsertClass["classId"] . "', '" . $escapedInsertClass["className"] . "', '" . $escapedInsertClass["dept"] . "', '" . $escapedInsertClass["classNum"] . "', '" . $escapedInsertClass["classSec"] . "', $activate, '" . $escapedInsertClass["instr"] . "', '" . $escapedInsertClass["int_notes"] . "', '" . $escapedInsertClass["class_desc"] . "', '" . $escapedInsertClass["addl_info"] . "', '" . $escapedInsertClass["prereq"] . "', '" . $escapedInsertClass["st_week"] . "', '" . $escapedInsertClass["end_week"] . "', '" . $escapedInsertClass["ageStart"] . "', '" . $escapedInsertClass["ageEnd"] . "', '" . $escapedInsertClass["consFee"] . "', '" . $escapedInsertClass["hourFee"] . "', '" . $escapedInsertClass["regFee"] . "', $priceInterns, $intOnly, $fieldTrip, $fieldTripWishList, $cl_as, $wkshp, $grpBased, '" . $escapedInsertClass["seasClass"] . "', '" . $escapedInsertClass["noWks"] . "', $mon, $tues, $wed, $thurs, $fri, $saturday, $sunday, '" . $escapedInsertClass["hoursPerClass"] . "', '" . $escapedInsertClass["meetingsPerWeek"] . "', '" . $escapedInsertClass["totalMtgs"] . "', '" . $escapedInsertClass["totClasTimeHrs"] . "', '" . $escapedInsertClass["stTime"] . "', '" . $escapedInsertClass["endTime"] . "', '" . $escapedInsertClass["ar_ea"] . "', '" . $escapedInsertClass["img1"] . "', '" . $$escapedInsertClass["img2"] . "', '" . $escapedInsertClass["img3"] . "', '" . $escapedInsertClass["extLink1"] . "', '" . $escapedInsertClass["extLink2"] . "', '" . $escapedInsertClass["extLink3"] . "', '" . $escapedInsertClass["und1"] . "', '" . $escapedInsertClass["und2"] . "', '" . $escapedInsertClass["und3"] . "', '" . $escapedInsertClass["und4"] . "', '" . $escapedInsertClass["und5"] . "', '" . $escapedInsertClass["und6"] . "', '" . $escapedInsertClass["und7"] . "', '" . $escapedInsertClass["und8"] . "', '" . $escapedInsertClass["und9"] . "', '" . $escapedInsertClass["und10"] . "', '" . $escapedInsertClass['price_for_interns'] . "', '" . $escapedInsertClass['price_for_students'] . "', '" . $accred_status . "', '" . $escapedInsertClass['accred_org_name'] . "', '" . $escapedInsertClass['num_units'] . "', '" . $escapedInsertClass['grade_level'] . "');";

// echo $sql;
// exit;

if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}
// $mysqli->query($sql);

//get newly inserted ID and redirect
$sql2 = "select max(id) from " . $table_classes . "";
$result = $mysqli->query($sql2);
while ($getTopID = $result->fetch_assoc()) {
 $insertedID = $getTopID["max(id)"];
}


header("Location: ../index.php?inserted=$insertedID"); /* Redirect browser */
  exit();

?>