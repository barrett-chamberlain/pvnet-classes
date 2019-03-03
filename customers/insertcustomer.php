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
<h3>INSERT NEW CUSTOMER<br />
==============
</h3>
<a href="index.php">Go back</a><br /><br />
<form action="processinsertedcustomer.php" method="post">
First Name: <input required="required" size="50" type="text" name="firstname"><br />
Last Name: <input required="required" size="50" type="text" name="lastname"><br />
Address Line 1: <input size="50" type="text" name="addr1"><br />
Address Line 2: <input size="50" type="text" name="addr2"><br />
City: <input size="50" type="text" name="city"><br />
State: <input size="50" type="text" name="state"><br />
Zip Code: <input size="50" type="number" name="zipcode"><br />
Phone 1: <input size="50" type="text" name="phone1"><br />
Phone 2: <input size="50" type="text" name="phone2"><br />
Email Address: <input size="50" type="email" name="email"><br />

<div class="roleBox">
	Customer is a...<br /><br />
	Parent: <input type="checkbox" name="is_parent"><br />
	Adult Student: <input type="checkbox" name="is_student_adult"><br />
	Minor Student: <input type="checkbox" name="is_student_minor"><br />
	Relative: <input type="checkbox" name="is_relative"><br />
	Sibling: <input type="checkbox" name="is_sibling"><br />
	Instructor: <input type="checkbox" name="is_instructor"><br />
	Adult Volunteer: <input type="checkbox" name="is_vol_adult"><br />
	Minor Volunteer: <input type="checkbox" name="is_vol_minor"><br />
</div>

<input type="submit">
</form>
</body>