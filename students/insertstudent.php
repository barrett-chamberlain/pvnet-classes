<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<style type="text/css">
	.roleBox {
		border: 1px solid black;
    	margin: 5px;
    	padding: 5px;
	}
</style>
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');
?>
<h3>INSERT NEW STUDENT<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<form action="processinsertedstudent.php" method="post">
First Name: <input required="required" size="50" type="text" name="firstname"><br />
Last Name: <input required="required" size="50" type="text" name="lastname"><br />
Date of Birth: <input type="date" name="dob"><br />
Grade Level: <input size="50" type="text" name="gradelevel"><br />
Grade Level Date: <input type="date" name="gradeleveldate"><br />
School: <input size="50" type="text" name="school"><br />
Gender: <input size="50" type="text" name="gender"><br />
Cell Phone: <input size="50" type="number" name="cell_phone"><br />
Email Address: <input size="50" type="email" name="email"><br />
Internship Start Date: <input type="date" name="internship_start_date"><br />
Internship End Date: <input type="date" name="internship_end_date"><br />
<div class="roleBox">
	Student is a(n)...<br /><br />
	Parent: <input type="checkbox" name="is_parent"><br />
	Adult Student: <input type="checkbox" name="is_student_adult"><br />
	Minor Student: <input type="checkbox" name="is_student_minor"><br />
	Relative: <input type="checkbox" name="is_relative"><br />
	Sibling: <input type="checkbox" name="is_sibling"><br />
	Instructor: <input type="checkbox" name="is_instructor"><br />
	Adult Volunteer: <input type="checkbox" name="is_vol_adult"><br />
	Minor Volunteer: <input type="checkbox" name="is_vol_minor"><br />
	Intern: <input type="checkbox" name="is_Intern"><br />
</div>
<input type="hidden" name="id" value="<?php echo $cleanedID ?>">
<input type="submit">
</form>
</body>