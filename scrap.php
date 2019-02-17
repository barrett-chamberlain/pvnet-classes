
This is an introductory course - you don't need to have advanced knowledge, just some basic coding experience. test

This is an excellent starting point to prepare you to learn more about Machine Learning & Deep Learning Technology.

!@#$%^&*()-_=+\|?><,.{}[]~`''""

Table: classes
Columns:

$_POST["classNum"]
$_POST["classSec"]
$_POST["instr"]
$_POST["int_notes"]
$_POST["addl_info"]
$_POST["prereq"]
$_POST["st_week"]
$_POST["end_week"]
$_POST["ageStart"]
$_POST["ageEnd"]
$_POST["consFee"]
$_POST["hourFee"]
$_POST["regFee"]
$_POST["seasClass"]
$_POST["noWks"]
$_POST["hoursPerClass"]
$_POST["meetingsPerWeek"]
$_POST["totalMtgs"]
$_POST["totClasTimeHrs"]
$_POST["stTime"]
$_POST["endTime"]
$_POST["ar_ea"]
$_POST["img1"]
$_POST["img2"]
$_POST["img3"]
$_POST["extLink1"]
$_POST["extLink2"]
$_POST["extLink3"]
$_POST["und1"]$_POST["und2"] . "', UND_3 = '" . $_POST["und3"] . "', UND_4 = '" . $_POST["und4"] . "', UND_5 = '" . $_POST["und5"] . "', UND_6 = '" . $_POST["und6"] . "', UND_7 = '" . $_POST["und7"] . "', UND_8 = '" . $_POST["und8"] . "', UND_9 = '" . $_POST["und9"] . "', UND_10 = '" . $_POST["und10"] . "' where id = '" . $_POST['dbid'] . "'";


Class_ID varchar(11) 
Class_Name varchar(50) 
Department varchar(100) 

Instructor varchar(100) 
Internal_Notes text 
Class_Description text 
Additional_Info varchar(300) 
Prerequisite varchar(300) 
Start_Week date 
End_Week date 
Age_Start int(11) 
Age_End int(11) 
Consummables_Fee int(11) 
Hourly_Fee int(11) 
Registration_Fee int(11) 
Price_Included_For_Interns tinyint(1) 
Intern_Only tinyint(1) 
Field_Trip tinyint(1) 
Field_Trip_Wish_List tinyint(1) 
Class tinyint(1) 
Workshop tinyint(1) 
GroupBased tinyint(1) 
Seasonal_Classification varchar(100) 
No_Weeks decimal(3,1) 
M tinyint(1) 
T tinyint(1) 
W tinyint(1) 
TH tinyint(1) 
F tinyint(1) 
Sat tinyint(1) 
Sun tinyint(1) 
Hrs_Per_Class int(11) 
Mtgs_Per_Wk int(11) 
Total_Meetings int(11) 
Total_Class_Time_Hrs varchar(5) 
Start_Time time 
End_Time time 
AREA varchar(13) 
IMG_1 varchar(100) 
IMG_2 varchar(100) 
IMG_3 varchar(100) 
EXT_LINK_1 varchar(100) 
EXT_LINK_2 varchar(100) 
EXT_LINK_3 varchar(100) 
UND_1 varchar(100) 
UND_2 varchar(100) 
UND_3 varchar(100) 
UND_4 varchar(100) 
UND_5 varchar(100) 
UND_6 varchar(100) 
UND_7 varchar(100) 
UND_8 varchar(100) 
UND_9 varchar(100) 
UND_10 varchar(100) 
record_inserted timestamp