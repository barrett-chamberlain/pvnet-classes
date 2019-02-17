<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');
?>
<h3>INSERT NEW RECORD<br />
==============
</h3>
<form action="processinsertedclass.php" method="post">
Class ID: <input required="required" type="text" name="classId"><br />
Class Name: <input required="required" size="50" type="text" name="className"><br />
Department: <input type="text" size="50" name="dept"><br />
Class Number: <input type="number" name="classNum"><br />
Class Section: <input type="number" name="classSec"><br />
Activate: <input type="checkbox" name="actv"><br />
Instructor: <input type="text" size="50" name="instr"><br />
Internal Notes: <textarea rows="4" cols="50" name="int_notes"></textarea><br />
Class Description: <textarea rows="4" cols="50" name="class_desc"></textarea><br />
Additional Info: <textarea rows="4" cols="50" name="addl_info"></textarea><br />
Prerequisite: <textarea rows="4" cols="50" name="prereq"></textarea><br />
Start Week: <input type="date" name="st_week"><br />
End Week: <input type="date" name="end_week"><br />
Age Start: <input type="number" name="ageStart"><br />
Age End: <input type="number" name="ageEnd"><br />
Consumables Fee: <input type="number" name="consFee"><br />
Hourly Fee: <input type="number" name="hourFee"><br />
Registration Fee: <input type="number" name="regFee"><br />
Price Included For Interns: <input type="checkbox" name="priceInterns"><br />
Intern Only: <input type="checkbox" name="intOnly"><br />
Field Trip: <input type="checkbox" name="fieldTrip"><br />
Field Trip Wish List: <input type="checkbox" name="fieldTripWishList"><br />
Class: <input type="checkbox" name="cl"><br />
Workshop: <input type="checkbox" name="wkshp"><br />
Group-Based: <input type="checkbox" name="grpBased"><br />
Seasonal Classification: <input type="text" name="seasClass"><br />
No Weeks: <input type="text" name="noWks"><br />
Monday: <input type="checkbox" name="mon"><br />
Tuesday: <input type="checkbox" name="tues"><br />
Wednesday: <input type="checkbox" name="wed"><br />
Thursday: <input type="checkbox" name="thurs"><br />
Friday: <input type="checkbox" name="friday"><br />
Saturday: <input type="checkbox" name="saturday"><br />
Sunday: <input type="checkbox" name="sunday"><br />
Hours Per Class: <input type="number" name="hoursPerClass"><br />
Meetings Per Week: <input type="number" name="meetingsPerWeek"><br />
Total Meetings: <input type="number" name="totalMtgs"><br />
Total Class Time Hours: <input type="number" name="totClasTimeHrs"><br />
Start Time: <input type="time" name="stTime"><br />
End Time: <input type="time" name="endTime"><br />
Area: <input type="text" size="50" name="ar_ea"><br />
Image 1: <input type="text" size="50" name="img1"><br />
Image 2: <input type="text" size="50" name="img2"><br />
Image 3: <input type="text" size="50" name="img3"><br />
External Link 1: <input type="text" size="50" name="extLink1"><br />
External Link 2: <input type="text" size="50" name="extLink2"><br />
External Link 3: <input type="text" size="50" name="extLink3"><br />
UND 1: <input type="text" size="50" name="und1"><br />
UND 2: <input type="text" size="50" name="und2"><br />
UND 3: <input type="text" size="50" name="und3"><br />
UND 4: <input type="text" size="50" name="und4"><br />
UND 5: <input type="text" size="50" name="und5"><br />
UND 6: <input type="text" size="50" name="und6"><br />
UND 7: <input type="text" size="50" name="und7"><br />
UND 8: <input type="text" size="50" name="und8"><br />
UND 9: <input type="text" size="50" name="und9"><br />
UND 10: <input type="text" size="50" name="und10"><br />
<input type="submit">
</form>
</body>