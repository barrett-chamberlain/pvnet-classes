<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('protect-this.php');

//connect to db
include('connect.php');

?>
<h3>DOWNLOAD SPREADSHEET<br />
==============
</h3>
<form action="generate_spreadsheet.php">
<input type="submit" value="Download Spreadsheet">
</form>
<br /><br />
<a href="index.php">Go back</a>
</body>