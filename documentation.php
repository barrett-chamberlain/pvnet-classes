<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<a href="index.php">Go back</a>
<style type="text/css">
    .roleBox {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
    .header {
        text-decoration: underline;
    }
    .bold {
        font-weight: bold;
    }
    .italic {
        font-style: italic;
    }
</style>
<?php
//password auth
require('protect-this.php');
//connect to db
include('./_includes/connect.php');
?>
<h3 class="header">Application Overview</h3>
<p>This application is for managing all aspects of data involved in the administration of classes, customers, students, and the enrollment history of students.  All of the above besides class history are made editable by this application.  This is because we would like to maintain an untouched history of who has enrolled and all the pertinent information of that transaction.  As such, the class history table takes all information at the time of enrollment for the student enrolled, customer who paid for it, and the class they decided to enroll in.  Data is taken on a per-student basis.</p>
<h3 class="header">Explanation of Index Page</h3>
<p>Below is a listing of the different menu options you will find on the index page, along with an explanation of what each menu option does.</p>
<ul>
<li class="bold">Manage classes</li><p>This page allows for the management of the different columns that comprise the data we track for classes.  The VU link allows for classes to be viewed.  ED allows classes to be edited.  DUP duplicates a class and brings you to the editing page for it.  DEL brings you to a confirmation page for deleting a class, showing the disabled form fields for confirmation.  ROS displays a list of all students currently enrolled in the class.  Clicking on the sort buttons will allow you to sort by each column by either ascending or descending order.</p>
<li class="bold">Insert a new class</li><p>Creates a new class.  Brings you to a form which has all form inputs to create the new class.</p>
<li class="bold">Insert a new customer</li><p>Creates a new customer.  Brings you to a form which has all form inputs to create the new customer.</p>
<li class="bold">Manage customers</li><p>This page allows for the management of the different columns that comprise the data we track for customers.  The VU link allows for customers to be viewed.  ED allows customers to be edited.  DUP duplicates a customer and brings you to the editing page for it.  DEL brings you to a confirmation page for deleting a customers, showing the disabled form fields for confirmation.  Clicking on the sort buttons will allow you to sort by each column by either ascending or descending order.</p>
<li class="bold">Insert a new student</li><p>Creates a new student.  Brings you to a form which has all form inputs to create the new student.</p>
<li class="bold">Manage students</li><p>This page allows for the management of the different columns that comprise the data we track for students.  The VU link allows for students to be viewed.  ED allows students to be edited.  DUP duplicates a student and brings you to the editing page for it.  DEL brings you to a confirmation page for deleting a student, showing the disabled form fields for confirmation.  Clicking on the sort buttons will allow you to sort by each column by either ascending or descending order.</p>
<!-- <li class="bold">Enroll student in a class</li><p>This link will allow you to choose a student and then class.  This will enroll the student in the class, effectively taking a "snapshot" of the class, student, and customer involved in the transaction.  Once a student is enrolled, the column tracking the amount of students that can enroll in the class will be deducted appropriately.</p> -->
<!-- <li class="bold">View class registration history</li><p>This page allows you to view the enrollment history of all students.  The page will give you three different choices to display class history by - student, class, or customer.  Note that this page does not allow editing of these records as it is a requirement of this application that class history remains unedited.</p> -->
<li class="bold">Generate spreadsheet of all class data</li><p>As of right now, this option only generates a spreadsheet of the classes table.  Eventually this option will be able to export all tables.</p>
</ul>
<h3 class="header">Database Columns Key (Insert Fields Explained)</h3>
<p class="italic">Please note, a field value of 0 is equivalent to "off/no" and a value of 1 is equivalent to "on/yes"</p>
<p><span class="header">Students</span></p>
<p>
<?php
// comments echoing
$sql = "select column_name, column_comment from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'classes';";
$result = $mysqli->query($sql);
while ($classColumnComments = $result->fetch_assoc()) {
echo '<span class="bold">' . $classColumnComments['column_name'] . ':</span> ' . $classColumnComments['column_comment'] . '<br />'; } ?>
</p>
</body>