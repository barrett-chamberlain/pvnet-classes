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
<title>Insert a Class</title>
</head>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');
?>
<h3>INSERT NEW CLASS<br />
==============
</h3>
<a href="../index.php">Go back</a>
<form action="processinsertedclass.php" method="post">
<input type="submit">
<ul id="first">
	<li><a href="javascript:;">Classification</a></li>
	<li>
		<ul>
			<li>Class ID: <input required="required" type="text" name="classId"></li>
			<li>Class Name: <input required="required" size="50" type="text" name="className"></li>
			<li>Department: <input type="text" size="50" name="dept"></li>
			<li>Class Number: <input type="number" name="classNum"></li>
			<li>Class Section: <input type="number" name="classSec"></li>
			<li>Activate: <input type="checkbox" name="actv"></li>
			<li>Instructor: <input type="text" size="50" name="instr"></li>
			<li>Class Description: <textarea rows="4" cols="50" name="class_desc"></textarea></li>
			<li>Additional Info: <textarea rows="4" cols="50" name="addl_info"></textarea></li>
			<li>Prerequisite: <textarea rows="4" cols="50" name="prereq"></textarea></li>
		</ul>
	</li>		
</ul><!-- /Classification -->
<ul id="accordion">
	<li><a href="javascript:;">Times and Pricing</a></li>
	<li>
		<ul>
			<li>Start Week: <input type="date" name="st_week"></li>
			<li>End Week: <input type="date" name="end_week"></li>
			<li>Age Start: <input type="number" name="ageStart"></li>
			<li>Age End: <input type="number" name="ageEnd"></li>
			<li>Consumables Fee: <input type="number" name="consFee"></li>
			<li>Hourly Fee: <input type="number" name="hourFee"></li>
			<li>Registration Fee: <input type="number" name="regFee"></li>
			<li>Price Included For Interns: <input type="checkbox" name="priceInterns">
</li>
			<li>Price for Interns: <input type="Number" name="price_for_interns"></li>
			<li>Price for Students: <input type="Number" name="price_for_students"></li>
			<li>Seasonal Classification: <input type="text" name="seasClass"></li>
			<li>No Weeks: <input type="text" name="noWks"></li>
			<li><a href='#'>Days of the Week</a></li>
			<li>
				<ul>
					<li>Monday: <input type="checkbox" name="mon"></li>
					<li>Tuesday: <input type="checkbox" name="tues"></li>
					<li>Wednesday: <input type="checkbox" name="wed"></li>
					<li>Thursday: <input type="checkbox" name="thurs"></li>
					<li>Friday: <input type="checkbox" name="friday"></li>
					<li>Saturday: <input type="checkbox" name="saturday"></li>
					<li>Sunday: <input type="checkbox" name="sunday"></li>
				</ul>
			</li>
			<li>Hours Per Class: <input type="number" name="hoursPerClass"></li>
			<li>Meetings Per Week: <input type="number" name="meetingsPerWeek"></li>
			<li>Total Meetings: <input type="number" name="totalMtgs"></li>
			<li>Total Class Time Hours: <input type="number" name="totClasTimeHrs"></li>
			<li>Start Time: <input type="time" name="stTime"></li>
			<li>End Time: <input type="time" name="endTime"></li>
		</ul>
	</li>		
</ul><!-- /Times and Pricing -->
<ul id="accordion">
	<li><a href="javascript:;">Class Details</a></li>
	<li>
		<ul>
			<li>Intern Only: <input type="checkbox" name="intOnly"></li>
			<li>Field Trip: <input type="checkbox" name="fieldTrip"></li>
			<li>Field Trip Wish List: <input type="checkbox" name="fieldTripWishList"></li>
			<li>Class: <input type="checkbox" name="cl"></li>
			<li>Workshop: <input type="checkbox" name="wkshp"></li>
			<li>Group-Based: <input type="checkbox" name="grpBased"></li>
			<li>Publish Date: <input type="date" name="pub_date"></li>
			<li>Enrollment Limit: <input type="Number" name="enr_limit"></li>
			<li>Not Included For Interns: <input type="checkbox" name="not_inc_int"></li>
			<li>Seminars: <input type="checkbox" name="sem"></li>
			<li>Events: <input type="checkbox" name="eve"></li>
			<li>Accreditation Status: <input type="checkbox" name="accred_status"></li>
			<li>Accrediting Organization Name: <input type="text" size="50" name="accred_org_name"></li>
			<li>Number of Units: <input type="Number" name="num_units"></li>
			<li>Grade Level: <select name="grade_level">
								<option value="Elementary">Elementary</option>
								<option value="Middle">Middle</option>
								<option value="High school">High School</option>
								<option value="College">College</option>
							</select></li>
			<li>Internal Notes: <textarea rows="4" cols="50" name="int_notes"></textarea></li>
		</ul>
	</li>		
</ul><!-- /Class Details -->
<ul id="accordion">
	<li><a href="javascript:;">Links and Images</a></li>
	<li>
		<ul>
			<li>Area: <input type="text" size="50" name="ar_ea"></li>
			<li>Image 1: <input type="text" size="50" name="img1"></li>
			<li>Image 2: <input type="text" size="50" name="img2"></li>
			<li>Image 3: <input type="text" size="50" name="img3"></li>
			<li>External Link 1: <input type="text" size="50" name="extLink1"></li>
			<li>External Link 2: <input type="text" size="50" name="extLink2"></li>
			<li>External Link 3: <input type="text" size="50" name="extLink3"></li>
			<li>UND 1: <input type="text" size="50" name="und1"></li>
			<li>UND 2: <input type="text" size="50" name="und2"></li>
			<li>UND 3: <input type="text" size="50" name="und3"></li>
			<li>UND 4: <input type="text" size="50" name="und4"></li>
			<li>UND 5: <input type="text" size="50" name="und5"></li>
			<li>UND 6: <input type="text" size="50" name="und6"></li>
			<li>UND 7: <input type="text" size="50" name="und7"></li>
			<li>UND 8: <input type="text" size="50" name="und8"></li>
			<li>UND 9: <input type="text" size="50" name="und9"></li>
			<li>UND 10: <input type="text" size="50" name="und10"></li>
		</ul>
	</li>		
</ul><!-- /Links and Images -->
<input type="submit">
</form>
</body>
</html>