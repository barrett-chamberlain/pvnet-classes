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
	<p style="float: left; margin: 0px 5px;">Class edited.  <a href=editclass.php?id=<?php echo $_GET['edited'] ?>>Edit class</a></p><br /><br />
</div>
<?php } 
if (isset($_GET['inserted'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class inserted.  <a href=editclass.php?id=<?php echo $_GET['inserted'] ?>>Edit class</a></p><br /><br />
</div> 
<?php }
if (isset($_GET['duplicated'])) { ?>
<div style="outline: 1px solid green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Class duplicated.  <a href=editclass.php?id=<?php echo $_GET['duplicated'] ?>>Edit class</a></p><br /><br />
</div>
<?php } ?>
<h3>CLASS ADMINISTRATION<br />
==============
</h3>
<p>
<a href="selectclasstoedit.php">Manage classes</a><br /><br />
<a href="insertclass.php">Insert a new class</a><br /><br />
<a href="generate_spreadsheet.php">Generate spreadsheet of all class data</a>
</p>


</body>