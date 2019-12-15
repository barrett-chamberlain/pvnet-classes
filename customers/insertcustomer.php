<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/prettify.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<style type="text/css">
    .roleBox {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
</style>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/prettify.js"></script>
<script type="text/javascript" src="../js/jquery.collapsible-menus.min.js"></script>
<script type="text/javascript" src="../js/site.js"></script>
<title>Insert Customer</title>
</head>
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
<ul id="first">
    <li><a href="javascript:;">Contact Info</a></li>
    <li>
        <ul>
            <li>First Name: <input size="50"  required="required" type="text" name="firstname"></li>
            <li>Last Name: <input size="50"  required="required" type="text" name="lastname"></li>
            <li>Address Line 1: <input size="50" type="text" name="addr1"></li>
            <li>Address Line 2: <input size="50" type="text" name="addr2"></li>
            <li>City: <input size="50" type="text" name="city"></li>
            <li>State: 
            	<select name="state">
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
			</li>
            <li>Zip Code: <input size="50" type="number" name="zipcode"></li>
            <li>Phone 1: <input size="50" type="number" name="phone1"></li>
            <li>Phone 2: <input size="50" type="number" name="phone2"></li>
            <li>Email Address: <input size="50"  type="email" name="email"></li>
        </ul>
    </li>       
</ul><!-- /Contact info -->
<ul id="accordion">
    <li><a href="javascript:;">Work Info</a></li>
    <li>
        <ul>
            <li>Employer Name: <input size="50" type="text" name="employer_name"></li>
            <li>Position Title: <input size="50" type="text" name="position_title"></li>
            <li>Department: <input size="50" type="text" name="department"></li>
            <li>Area of Expertise: <input size="50" type="text" name="area_of_expertise"></li>
            <li>Work Address: <input size="50" type="text" name="work_address"></li>
            <li>Work City: <input size="50" type="text" name="work_city"></li>
            <li>Work State: 
            	<select name="work_state">
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
			</li>
            <li>Work Zip Code: <input size="50" type="number" name="work_zip"></li>
            <li>Work Phone: <input size="50" type="number" name="work_phone"></li>
            <li>Work Email: <input size="50" type="email" name="work_email"></li>
            <li>Work Notes: <textarea rows="4" cols="50" name="work_notes"></textarea>
        </ul>
    </li>       
</ul><!-- /Work Info -->
<ul id="accordion">
    <li><a href="javascript:;">Customer Details</a></li>
    <li>
        <ul>
            <li>
                <div class="roleBox">
					Customer is a...<br /><br />
					Parent: <input type="checkbox" name="is_parent"><br />
					Adult Student: <input type="checkbox" name="is_student_adult"><br />
					Minor Student: <input type="checkbox" name="is_student_minor"><br />
					Relative: <input type="checkbox" name="is_relative"><br />
					Sibling: <input type="checkbox" name="is_sibling"><br />
					Instructor: <input type="checkbox" name="is_instructor"><br />
					Adult Volunteer: <input type="checkbox" name="is_vol_adult"><br />
					Sponsor: <input type="checkbox" name="is_sponsor"><br />
					Alumni: <input type="checkbox" name="is_alumni"><br />
				</div>
            </li>
            <li>
                <div class="roleBox">
					Home Environment is...<br /><br />
					Electronic: <input type="checkbox" name="h_env_electronic"><br />
					Computer Science: <input type="checkbox" name="h_env_compsci"><br />
					Mechanical Engineering: <input type="checkbox" name="h_env_mecheng"><br />
				</div>
            </li>
            <li>Password: <input size="50" type="text" name="password"></li>
            <li>Referral Method: 
            	<select name="referral">
					<option value="friend">Friend</option>
					<option value="advertisement">Advertisement</option>
					<option value="internet">Internet</option>
					<option value="other">Other</option>
				</select>
            </li>
            <li>Referral Other: <textarea rows="4" cols="50" name="referral_other"></textarea></li>
            <li>Willingness to Volunteer: 
            	<select name="willing_to_volunteer">
					<option value="yes">Yes</option>
					<option value="no">No</option>
					<option value="possibly">Possibly</option>
					<option value="contact_me">Contact Me</option>
				</select>
            </li>
        </ul>
    </li>       
</ul><!-- /Customer Details -->
<input type="submit"><br />
</form>
</body>
</html>