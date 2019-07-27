<?php

//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

$cleanedStudentID = mysqli_real_escape_string($mysqli,$_GET['studentid']);
$cleanedClassID = mysqli_real_escape_string($mysqli,$_GET['classid']);

//debugger


$sql1 = "SELECT * FROM " . $table_classes . " where id = '" . $cleanedClassID . "'";

// if (!$result1 = $mysqli->query($sql1)) {
//     include('../_includes/send_error.php');
//     exit; }
    if (!$result1 = $mysqli->query($sql1)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql1 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

$sql2 = "SELECT * FROM " . $table_student . " where id = '" . $cleanedStudentID . "'";

$result2 = $mysqli->query($sql2);

$updateWithStudent = $result2->fetch_assoc();

foreach($updateWithStudent AS $key => $val) {
    $escapedUpdateWithStudent[$key] = mysqli_real_escape_string($mysqli, $val);
}

// var_dump($escapedUpdateWithStudent);

$sql3 = "SELECT * FROM " . $table_customer . " where id = '" . $updateWithStudent["linkedcustomer"] . "'";

$result3 = $mysqli->query($sql3);

$escapedUpdateWithCustomer = $result3->fetch_assoc();

foreach($escapedUpdateWithCustomer AS $key => $val) {
    $escapedUpdateWithCustomer[$key] = mysqli_real_escape_string($mysqli, $val);
}

$sql4 = "SELECT * FROM " . $table_customer_contact . " where customer_id = '" . $escapedUpdateWithCustomer["id"] . "'";

$result4 = $mysqli->query($sql4);

$updateWithCustomerContact = $result4->fetch_assoc();

foreach($updateWithCustomerContact AS $key => $val) {
    $escapedUpdateWithCustomerContact[$key] = mysqli_real_escape_string($mysqli, $val);
}

// echo $sql1 . '<br />';
// echo '$cleanedStudentID ' . $cleanedStudentID . '<br />';
// echo '$cleanedClassID ' . $cleanedClassID . '<br />';
// echo '$linkedCustomer ' . $updateWithStudent["linkedcustomer"] . '<br />';
// echo '$linkedCustomerContact ' . $escapedUpdateWithCustomerContact["id"] . '<br />';
// exit;


// if (!$result = $mysqli->query($sql)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

//debugger

// if (!$result2 = $mysqli->query($sql2)) {
//     echo "Error: Our query failed to execute and here is why:" . "<br />";
//     echo "Query: " . $sql2 . "\n";
//     echo "Errno: " . $mysqli->errno . "<br />";
//     echo "Error: " . $mysqli->error . "<br />";
//     exit;
// }

while ($getLinkedCustomerContact = $result4->fetch_assoc()) {
 $linkedCustomerContact = $getLinkedCustomerContact["id"];
}
$insertClass = $result1->fetch_assoc();
echo 'dept: ' . $insertClass["Department"] . '<br />';

foreach($insertClass AS $key => $val) {
    $escapedInsertClass[$key] = mysqli_real_escape_string($mysqli, $val);
}
// var_dump($keys);
// var_dump($escapedInsertClass);
// echo "escaped: " . $escapedInsertClass["Class_Description"];
// exit;

$sql5 = "INSERT INTO " . $table_class_history . " (`classes_table_id`, `Class_ID`, `Class_Name`, `Department`, `Class_Number`, `Class_Section`, `activate`, `Instructor`, `Internal_Notes`, `Class_Description`, `Additional_Info`, `Prerequisite`, `Start_Week`, `End_Week`, `Age_Start`, `Age_End`, `Consummables_Fee`, `Hourly_Fee`, `Registration_Fee`, `Price_Included_For_Interns`, `Intern_Only`, `Field_Trip`, `Field_Trip_Wish_List`, `Class`, `Workshop`, `GroupBased`, `Seasonal_Classification`, `No_Weeks`, `M`, `T`, `W`, `TH`, `F`, `Sat`, `Sun`, `Hrs_Per_Class`, `Mtgs_Per_Wk`, `Total_Meetings`, `Total_Class_Time_Hrs`, `Start_Time`, `End_Time`, `AREA`, `IMG_1`, `IMG_2`, `IMG_3`, `EXT_LINK_1`, `EXT_LINK_2`, `EXT_LINK_3`, `UND_1`, `UND_2`, `UND_3`, `UND_4`, `UND_5`, `UND_6`, `UND_7`, `UND_8`, `UND_9`, `UND_10`, `record_inserted`, `Publish_Date`, `Enrollment_Limit`, `Not_Included_For_Interns`, `Seminars`, `Events`, `price_for_interns`, `price_for_students`) VALUES ('" . $escapedInsertClass['id'] . "', '" . $escapedInsertClass['Class_ID'] . "', '" . $escapedInsertClass['Class_Name'] . "', '" . $escapedInsertClass['Department'] . "', '" . $escapedInsertClass['Class_Number'] . "', '" . $escapedInsertClass['Class_Section'] . "', '" . $escapedInsertClass['activate'] . "', '" . $escapedInsertClass['Instructor'] . "', '" . $escapedInsertClass['Internal_Notes'] . "', '" . $escapedInsertClass['Class_Description'] . "', '" . $escapedInsertClass['Additional_Info'] . "', '" . $escapedInsertClass['Prerequisite'] . "', '" . $escapedInsertClass['Start_Week'] . "', '" . $escapedInsertClass['End_Week'] . "', '" . $escapedInsertClass['Age_Start'] . "', '" . $escapedInsertClass['Age_End'] . "', '" . $escapedInsertClass['Consummables_Fee'] . "', '" . $escapedInsertClass['Hourly_Fee'] . "', '" . $escapedInsertClass['Registration_Fee'] . "', '" . $escapedInsertClass['Price_Included_For_Interns'] . "', '" . $escapedInsertClass['Intern_Only'] . "', '" . $escapedInsertClass['Field_Trip'] . "', '" . $escapedInsertClass['Field_Trip_Wish_List'] . "', '" . $escapedInsertClass['Class'] . "', '" . $escapedInsertClass['Workshop'] . "', '" . $escapedInsertClass['GroupBased'] . "', '" . $escapedInsertClass['Seasonal_Classification'] . "', '" . $escapedInsertClass['No_Weeks'] . "', '" . $escapedInsertClass['M'] . "', '" . $escapedInsertClass['T'] . "', '" . $escapedInsertClass['W'] . "', '" . $escapedInsertClass['TH'] . "', '" . $escapedInsertClass['F'] . "', '" . $escapedInsertClass['Sat'] . "', '" . $escapedInsertClass['Sun'] . "', '" . $escapedInsertClass['Hrs_Per_Class'] . "', '" . $escapedInsertClass['Mtgs_Per_Wk'] . "', '" . $escapedInsertClass['Total_Meetings'] . "', '" . $escapedInsertClass['Total_Class_Time_Hrs'] . "', '" . $escapedInsertClass['Start_Time'] . "', '" . $escapedInsertClass['End_Time'] . "', '" . $escapedInsertClass['AREA'] . "', '" . $escapedInsertClass['IMG_1'] . "', '" . $escapedInsertClass['IMG_2'] . "', '" . $escapedInsertClass['IMG_3'] . "', '" . $escapedInsertClass['EXT_LINK_1'] . "', '" . $escapedInsertClass['EXT_LINK_2'] . "', '" . $escapedInsertClass['EXT_LINK_3'] . "', '" . $escapedInsertClass['UND_1'] . "', '" . $escapedInsertClass['UND_2'] . "', '" . $escapedInsertClass['UND_3'] . "', '" . $escapedInsertClass['UND_4'] . "', '" . $escapedInsertClass['UND_5'] . "', '" . $escapedInsertClass['UND_6'] . "', '" . $escapedInsertClass['UND_7'] . "', '" . $escapedInsertClass['UND_8'] . "', '" . $escapedInsertClass['UND_9'] . "', '" . $escapedInsertClass['UND_10'] . "', '" . $escapedInsertClass['record_inserted'] . "', '" . $escapedInsertClass['Publish_Date'] . "', '" . $escapedInsertClass['Enrollment_Limit'] . "', '" . $escapedInsertClass['Not_Included_For_Interns'] . "', '" . $escapedInsertClass['Seminars'] . "', '" . $escapedInsertClass['Events'] . "', '" . $escapedInsertClass['price_for_interns'] . "', '" . $escapedInsertClass['price_for_students'] . "');";

// debugger

// if (!$result5 = $mysqli->query($sql5)) {
//     include('../_includes/send_error.php');
//     exit;
// }
if (!$result5 = $mysqli->query($sql5)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql5 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

$sql6 = "select max(id) from " . $table_class_history . "";
$result6 = $mysqli->query($sql6);
$getTopID = $result6->fetch_assoc();
$insertedID = $getTopID["max(id)"];
echo '$insertedID ' . $insertedID . '<br />';

$sql7 = "update " . $table_class_history . " set students_table_id = '" . $escapedUpdateWithStudent["id"] . "', fname = '" . $escapedUpdateWithStudent["fname"] . "', lname = '" . $escapedUpdateWithStudent["lname"] . "', dob = '" . $escapedUpdateWithStudent["dob"] . "', gradelevel = '" . $escapedUpdateWithStudent["gradelevel"] . "', gradeleveldate = '" . $escapedUpdateWithStudent["gradeleveldate"] . "', school = '" . $escapedUpdateWithStudent["school"] . "', gender = '" . $escapedUpdateWithStudent["gender"] . "', cell_phone = '" . $escapedUpdateWithStudent["cell_phone"] . "', linkedcustomer = '" . $escapedUpdateWithStudent["linkedcustomer"] . "', email = '" . $escapedUpdateWithStudent["email"] . "', is_parent = '" . $escapedUpdateWithStudent["is_parent"] . "', is_student_adult = '" . $escapedUpdateWithStudent["is_student_adult"] . "', is_student_minor = '" . $escapedUpdateWithStudent["is_student_minor"] . "', is_relative = '" . $escapedUpdateWithStudent["is_relative"] . "', is_sibling = '" . $escapedUpdateWithStudent["is_sibling"] . "', is_instructor = '" . $escapedUpdateWithStudent["is_instructor"] . "', is_vol_adult = '" . $escapedUpdateWithStudent["is_vol_adult"] . "', is_vol_minor = '" . $escapedUpdateWithStudent["is_vol_minor"] . "', is_sponsor = '" . $escapedUpdateWithStudent["is_sponsor"] . "',  is_alumni = '" . $escapedUpdateWithStudent["is_alumni"] . "', linkedcustomer = '" . $escapedUpdateWithStudent["linkedcustomer"] . "', medical_cond = '" . $escapedUpdateWithStudent["medical_cond"] . "', medical_cond_desc = '" . $escapedUpdateWithStudent["medical_cond_desc"] . "', medical_cond_life_threatening = '" . $escapedUpdateWithStudent["medical_cond_life_threatening"] . "', goals = '" . $escapedUpdateWithStudent["goals"] . "' where id = " . $insertedID . "";

// $result7 = $mysqli->query($sql7);
// echo $sql7;
// if (!$result7 = $mysqli->query($sql7)) {
//     include('../_includes/send_error.php');
//     exit;
// }
if (!$result7 = $mysqli->query($sql7)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql7 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

$sql8 = "update " . $table_class_history . " set customers_table_id = '" . $escapedUpdateWithCustomer["id"] . "', firstname = '" . $escapedUpdateWithCustomer["firstname"] . "', lastname = '" . $escapedUpdateWithCustomer["lastname"] . "', custuuid = '" . $escapedUpdateWithCustomer["custuuid"] . "', cust_is_parent = '" . $escapedUpdateWithCustomer["is_parent"] . "', cust_is_student_adult = '" . $escapedUpdateWithCustomer["is_student_adult"] . "', cust_is_student_minor = '" . $escapedUpdateWithCustomer["is_student_minor"] . "', cust_is_relative = '" . $escapedUpdateWithCustomer["is_relative"] . "', cust_is_sibling = '" . $escapedUpdateWithCustomer["is_sibling"] . "', cust_is_instructor = '" . $escapedUpdateWithCustomer["is_instructor"] . "', cust_is_vol_adult = '" . $escapedUpdateWithCustomer["is_vol_adult"] . "', cust_is_vol_minor = '" . $escapedUpdateWithCustomer["is_vol_minor"] . "', cust_is_sponsor = '" . $escapedUpdateWithCustomer["is_sponsor"] . "', cust_is_alumni = '" . $escapedUpdateWithCustomer["is_alumni"] . "', password = '" . $escapedUpdateWithCustomer["password"] . "', h_env_electronic = '" . $escapedUpdateWithCustomer["h_env_electronic"] . "', h_env_compsci = '" . $escapedUpdateWithCustomer["h_env_compsci"] . "', h_env_mecheng = '" . $escapedUpdateWithCustomer["h_env_mecheng"] . "' where id = " . $insertedID . "";

// echo $sql8;

// $result8 = $mysqli->query($sql8);

// if (!$result8 = $mysqli->query($sql8)) {
//     include('../_includes/send_error.php');
//     exit;
// } 
if (!$result8 = $mysqli->query($sql8)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql8 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}

var_dump($escapedUpdateWithCustomerContact);

$sql9 = "update " . $table_class_history . " set customer_contact_table_id = '" . $escapedUpdateWithCustomerContact["id"] . "', addr1 = '" . $escapedUpdateWithCustomerContact["addr1"] . "', addr2 = '" . $escapedUpdateWithCustomerContact["addr2"] . "', city = '" . $escapedUpdateWithCustomerContact["city"] . "', state = '" . $escapedUpdateWithCustomerContact["state"] . "', zipcode = '" . $escapedUpdateWithCustomerContact["zipcode"] . "', phone1 = '" . $escapedUpdateWithCustomerContact["phone1"] . "', phone2 = '" . $escapedUpdateWithCustomerContact["phone2"] . "', cust_cont_email = '" . $escapedUpdateWithCustomerContact["email"] . "', employer_name = '" . $escapedUpdateWithCustomerContact["employer_name"] . "', position_title = '" . $escapedUpdateWithCustomerContact["position_title"] . "', cust_cont_department = '" . $escapedUpdateWithCustomerContact["department"] . "', area_of_expertise = '" . $escapedUpdateWithCustomerContact["area_of_expertise"] . "', work_address = '" . $escapedUpdateWithCustomerContact["work_address"] . "', work_city = '" . $escapedUpdateWithCustomerContact["work_city"] . "', work_state = '" . $escapedUpdateWithCustomerContact["work_state"] . "', work_zip = '" . $escapedUpdateWithCustomerContact["work_zip"] . "', work_phone = '" . $escapedUpdateWithCustomerContact["work_phone"] . "', work_email = '" . $escapedUpdateWithCustomerContact["work_email"] . "', work_notes = '" . $escapedUpdateWithCustomerContact["work_notes"] . "', willing_to_volunteer = '" . $escapedUpdateWithCustomerContact["willing_to_volunteer"] . "'  where id = " . $insertedID . "";

// echo $sql9;

// $result9 = $mysqli->query($sql9);

// if (!$result9 = $mysqli->query($sql9)) {
//     include('../_includes/send_error.php');
//     exit;
// } 
if (!$result9 = $mysqli->query($sql9)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql9 . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}


// exit;
// while ($getTopID = $result2->fetch_assoc()) {
//  $insertedID = $getTopID["max(id)"];
// }
// echo $sql2 . '<br />';
// echo "inserted id: " . $insertedID;

header("Location: ../index.php?studentenrolled=$insertedID"); /* Redirect browser */
  exit();

?>