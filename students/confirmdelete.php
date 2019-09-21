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


$sql = "SELECT * FROM " . $table_student . " where id = '" . $cleanedID . "'";

$result = $mysqli->query($sql);

while ($studentToEdit = $result->fetch_assoc()) { ?>
<p style="font-weight: bold; color: red;">Are you sure you wish to delete this student?</p>
<h3>Student: #<?php echo $studentToEdit['id']?></h3>
<form>
<input disabled type="hidden" name="dbid" value="<?php echo $studentToEdit['id']?>">
First Name: <input size="50" disabled type="text" name="firstname" value="<?php echo $studentToEdit['fname']?>"><br />
Last Name: <input size="50" disabled type="text" name="lastname" value="<?php echo $studentToEdit['lname']?>"><br />
Date of Birth: <input disabled type="date" name="dob" value="<?php echo $studentToEdit['dob']?>"><br />
Grade Level: <input size="50" disabled type="text" name="gradelevel" value="<?php echo $studentToEdit['gradelevel']?>"><br />
Grade Level Date: <input disabled type="date" name="gradeleveldate" value="<?php echo $studentToEdit['gradeleveldate']?>"><br />
School: <input size="50" disabled type="text" name="school" value="<?php echo $studentToEdit['school']?>"><br />
Gender: <input size="50" disabled type="text" name="gender" value="<?php echo $studentToEdit['gender']?>"><br />
Cell Phone: <input size="50" disabled type="number" name="cell_phone" value="<?php echo $studentToEdit['cell_phone']?>"><br />
Email Address: <input size="50" disabled type="email" name="email" value="<?php echo $studentToEdit['email']?>"><br />
Linked Customer: <input size="50" disabled type="number" name="linkedcustomer" value="<?php echo $studentToEdit['linkedcustomer']?>"><br />
Internship Start Date: <input disabled type="date" name="internship_start_date" value="<?php echo $studentToEdit['internship_start_date']?>"><br />
Internship End Date: <input disabled type="date" name="internship_end_date" value="<?php echo $studentToEdit['internship_end_date']?>"><br />
<div class="roleBox">
    Student is a...<br /><br />
    Parent: <input disabled type="checkbox" <?php if($studentToEdit['is_parent'] == 1){echo "checked";}?> name="is_parent"><br />
    Adult Student: <input disabled type="checkbox" <?php if($studentToEdit['is_student_adult'] == 1){echo "checked";}?> name="is_student_adult"><br />
    Minor Student: <input disabled type="checkbox" <?php if($studentToEdit['is_student_minor'] == 1){echo "checked";}?> name="is_student_minor"><br />
    Relative: <input disabled type="checkbox" <?php if($studentToEdit['is_relative'] == 1){echo "checked";}?> name="is_relative"><br />
    Sibling: <input disabled type="checkbox" <?php if($studentToEdit['is_sibling'] == 1){echo "checked";}?> name="is_sibling"><br />
    Instructor: <input disabled type="checkbox" <?php if($studentToEdit['is_instructor'] == 1){echo "checked";}?> name="is_instructor"><br />
    Adult Volunteer: <input disabled type="checkbox" <?php if($studentToEdit['is_vol_adult'] == 1){echo "checked";}?> name="is_vol_adult"><br />
    Minor Volunteer: <input disabled type="checkbox" <?php if($studentToEdit['is_vol_minor'] == 1){echo "checked";}?> name="is_vol_minor"><br />
    Intern: <input disabled type="checkbox" <?php if($studentToEdit['is_Intern'] == 1){echo "checked";}?> name="is_Intern"><br />
</div>
<?php } ?>
</form>
<a href="deletestudent.php?id=<?php echo $cleanedID ?>">Yes, delete this student</a><br /><br />

<a href="../index.php">Go back</a><br /><br />

</body>