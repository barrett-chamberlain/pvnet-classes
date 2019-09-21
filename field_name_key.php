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
<h3 class="header">Database Columns Key (Insert Fields Explained)</h3>
<p class="italic">Please note, a field value of 0 is equivalent to "off/no" and a value of 1 is equivalent to "on/yes"</p>
<h4><span class="header">Classes</span></h4>
<p>
<?php
// comments echoing
$sql = "select column_name, column_comment from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'classes';";
$result = $mysqli->query($sql);
while ($classColumnComments = $result->fetch_assoc()) {
echo '<span class="bold">' . $classColumnComments['column_name'] . ':</span> ' . $classColumnComments['column_comment'] . '<br />'; } ?>
</p>
</body>