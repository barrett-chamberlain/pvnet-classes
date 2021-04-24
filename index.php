<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<style>
	.underline {text-decoration: underline;}
	.icon {margin-right: 5px; border:1px solid black;}
	.dialogue {float: left; margin-right: 10px; margin-top: 10px; border: 1px solid black; padding: 10px;}
</style>
<?php
//password auth
require('protect-this.php');

//check for returning actions
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class deleted.</p><br /><br />
</div>
<?php } 
if (isset($_GET['studentenrolled'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Student enrolled.</p><a href=classhistory/view.php?id=<?php echo $_GET['studentenrolled'] ?>>View record</a><br /><br />
</div>
<?php } 
if (isset($_GET['edited'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class edited.  <a href=classes/editclass.php?id=<?php echo $_GET['edited'] ?>>Edit class</a></p><br /><br />
</div>
<?php } 
if (isset($_GET['inserted'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class inserted.  <a href=classes/editclass.php?id=<?php echo $_GET['inserted'] ?>>Edit class</a></p><br /><br />
</div> 
<?php }
if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class duplicated.  <a href=classes/editclass.php?id=<?php echo $_GET['duplicated'] ?>>Edit class</a></p><br /><br />
</div>
<?php } 
if (isset($_GET['custinserted'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Customer inserted.  <a href=customers/editcustomer.php?id=<?php echo $_GET['custinserted'] ?>>Edit customer</a></p><br /><br />
</div>
<?php }
if (isset($_GET['studentinserted'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Student inserted.  <a href=students/editstudent.php?id=<?php echo $_GET['studentinserted'] ?>>Edit student</a></p><br /><br />
</div>
<?php } ?>
<p>Welcome to Class Administration</p>
<div class="dialogue">
<p><h3 class="underline">Classes</h3>
<a href="classes/insertclass.php"><img class="icon" src="images/insert.png" height="32" width="32" />Insert a new class</a><br /><br />
<a href="classes/selectclasstoedit.php"><img class="icon" src="images/manage.png" height="32" width="32" />Manage classes</a><br /><br />
</p>
</div>
<div class="dialogue">
<h3 class="underline">Customers</h3>
<p>
<a href="customers/insertcustomer.php"><img class="icon" src="images/insert.png" height="32" width="32" />Insert a new customer</a><br /><br />
<a href="customers/selectcustomertoedit.php"><img class="icon" src="images/manage.png" height="32" width="32" />Manage customers</a><br /><br />
<a href="instructors/selectinstructortoedit.php"><img class="icon" src="images/manage.png" height="32" width="32" />Manage instructors</a><br /><br />
</p>
</div>
<div class="dialogue">
<h3 class="underline">Students</h3>
<p>
<a href="students/selectcustomertolink.php"><img class="icon" src="images/insert.png" height="32" width="32" />Insert a new student</a><br /><br />
<a href="students/selectstudenttoedit.php"><img class="icon" src="images/manage.png" height="32" width="32" />Manage students</a><br /><br />
<a href="students/selectstudenttoenroll.php"><img class="icon" src="images/enroll.png" height="32" width="32" />Enroll student in a class</a><br /><br />
</p>
</div>
<div class="dialogue">
<h3 class="underline">Transactions</h3>
<p>
<a href="transactions/selectcustomertolink.php"><img class="icon" src="images/insert.png" height="32" width="32" />Insert transaction</a><br /><br />
<a href="transactions/selecttransactiontoedit.php"><img class="icon" src="images/manage.png" height="32" width="32" />Manage transactions</a><br /><br />
</p>
</div>
<div class="dialogue">
<h3 class="underline">Other Functions</h3>
<p>
<a href="classhistory/index.php"><img class="icon" src="images/history.png" height="32" width="32" />View class registration history</a><br /><br />

<a href="spreadsheet/index.php"><img class="icon" src="images/spread.jpg" height="32" width="32" />Generate spreadsheets</a><br /><br />
<a href="statistics.php"><img class="icon" src="images/statistics.png" height="32" width="32" />View Statistics</a><br /><br />
<a href="field_name_key.php"><img class="icon" src="images/dict.png" height="32" width="32" />Field Name Key</a><br /><br />
<a href="documentation.php"><img class="icon" src="images/doc.png" height="32" width="32" />Documentation</a>
</p>
</div>


</body>