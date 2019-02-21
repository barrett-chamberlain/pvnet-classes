<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//check for returning actions
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class deleted.</p><br /><br />
</div>
<?php } 
if (isset($_GET['edited'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class edited.  <a href=viewclass.php?id=<?php echo $_GET['edited'] ?>>View class</a></p><br /><br />
</div>
<?php } 
if (isset($_GET['inserted'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class inserted.  <a href=viewclass.php?id=<?php echo $_GET['inserted'] ?>>View class</a></p><br /><br />
</div> 
<?php }
if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class duplicated.  <a href=viewclass.php?id=<?php echo $_GET['duplicated'] ?>>View class</a></p><br /><br />
</div>
<?php } ?>
<h3>CLASS ADMINISTRATION<br />
==============
</h3>
<p>
<a href="selectclasstoview.php">View a class</a><br /><br />
<a href="insertclass.php">Insert a new class</a><br /><br />
<a href="selectclasstoedit.php">Edit a class</a><br /><br />
<a href="selectclasstodelete.php">Delete a class</a><br /><br />
<a href="selectclasstoduplicate.php">Duplicate a class</a><br /><br />
<a href="generate_spreadsheet.php">Generate spreadsheet of all class data</a>
</p>


</body>