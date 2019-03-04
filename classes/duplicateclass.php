<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$sql = "INSERT into " . $table_classes . " (`Class_ID`, `Class_Name`, `Department`, `Class_Number`, `Class_Section`, `activate`, `Instructor`, `Internal_Notes`, `Class_Description`, `Additional_Info`, `Prerequisite`, `Start_Week`, `End_Week`, `Age_Start`, `Age_End`, `Consummables_Fee`, `Hourly_Fee`, `Registration_Fee`, `Price_Included_For_Interns`, `Intern_Only`, `Field_Trip`, `Field_Trip_Wish_List`, `Class`, `Workshop`, `GroupBased`, `Seasonal_Classification`, `No_Weeks`, `M`, `T`, `W`, `TH`, `F`, `Sat`, `Sun`, `Hrs_Per_Class`, `Mtgs_Per_Wk`, `Total_Meetings`, `Total_Class_Time_Hrs`, `Start_Time`, `End_Time`, `AREA`, `IMG_1`, `IMG_2`, `IMG_3`, `EXT_LINK_1`, `EXT_LINK_2`, `EXT_LINK_3`, `UND_1`, `UND_2`, `UND_3`, `UND_4`, `UND_5`, `UND_6`, `UND_7`, `UND_8`, `UND_9`, `UND_10`, `Publish_Date`, `Enrollment_Limit`, `Not_Included_For_Interns`, `Seminars`, `Events`) 
SELECT 
    `Class_ID`, `Class_Name`, `Department`, `Class_Number`, `Class_Section`, `activate`, `Instructor`, `Internal_Notes`, `Class_Description`, `Additional_Info`, `Prerequisite`, `Start_Week`, `End_Week`, `Age_Start`, `Age_End`, `Consummables_Fee`, `Hourly_Fee`, `Registration_Fee`, `Price_Included_For_Interns`, `Intern_Only`, `Field_Trip`, `Field_Trip_Wish_List`, `Class`, `Workshop`, `GroupBased`, `Seasonal_Classification`, `No_Weeks`, `M`, `T`, `W`, `TH`, `F`, `Sat`, `Sun`, `Hrs_Per_Class`, `Mtgs_Per_Wk`, `Total_Meetings`, `Total_Class_Time_Hrs`, `Start_Time`, `End_Time`, `AREA`, `IMG_1`, `IMG_2`, `IMG_3`, `EXT_LINK_1`, `EXT_LINK_2`, `EXT_LINK_3`, `UND_1`, `UND_2`, `UND_3`, `UND_4`, `UND_5`, `UND_6`, `UND_7`, `UND_8`, `UND_9`, `UND_10`, `Publish_Date`, `Enrollment_Limit`, `Not_Included_For_Interns`, `Seminars`, `Events`
FROM " . $table_classes . " WHERE id='" . $_GET['id'] . "';";

// echo $sql;

// $sql = "CREATE TEMPORARY TABLE tmp SELECT * FROM classesDev WHERE id = 95;UPDATE tmp SET id=96 WHERE id = 95;INSERT INTO classesDev SELECT * FROM tmp WHERE id = 96;";

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//debugger
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
// if ($result->num_rows === 0) {
//     echo "No rows returned.";
//     exit;
// }

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
header("Location: editclass.php?id=$insertedID&duplicated=1");
  exit();
?>