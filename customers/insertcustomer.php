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
<a href="../index.php">Go back</a><br /><br />
<form action="processinsertedcustomer.php" method="post">
First Name: <input required="required" size="50" type="text" name="firstname"><br />
Last Name: <input required="required" size="50" type="text" name="lastname"><br />
Address Line 1: <input size="50" type="text" name="addr1"><br />
Address Line 2: <input size="50" type="text" name="addr2"><br />
City: <input size="50" type="text" name="city"><br />
State: <select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>

<br />
Zip Code: <input size="50" type="number" name="zipcode"><br />
Phone 1: <input size="50" type="number" name="phone1"><br />
Phone 2: <input size="50" type="number" name="phone2"><br />
Email Address: <input size="50" type="email" name="email"><br />
Employer Name: <input size="50" type="text" name="employer_name"><br />
Position Title: <input size="50" type="text" name="position_title"><br />
Department: <input size="50" type="text" name="department"><br />
Area of Expertise: <input size="50" type="text" name="area_of_expertise"><br />
Work Address: <input size="50" type="text" name="work_address"><br />
Work City: <input size="50" type="text" name="work_city"><br />
Work State: <select name="work_state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select><br />
Work Zip Code: <input size="50" type="number" name="work_zip"><br />
Work Phone: <input size="50" type="number" name="work_phone"><br />
Work Email: <input size="50" type="email" name="work_email"><br />
Work Notes: <textarea rows="4" cols="50" name="work_notes"></textarea><br />
Willingness to Volunteer: <select name="willing_to_volunteer">
	<option value="yes">Yes</option>
	<option value="no">No</option>
	<option value="possibly">Possibly</option>
	<option value="contact_me">Contact Me</option>
</select>
<br />


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