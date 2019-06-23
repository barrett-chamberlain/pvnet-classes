<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//connect to db
include('./_includes/connect.php');
$custIdEscaped = mysqli_real_escape_string($mysqli,$_GET["customerid"]);
$sql = "select * from customers where custuuid = '" . $custIdEscaped . "'";
echo $sql;
// $result = $mysqli->query($sql);
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why:" . "<br />";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "<br />";
    echo "Error: " . $mysqli->error . "<br />";
    exit;
}
?>
<h3>create account<br />
==============
</h3>
<a href="index.php?customerid=12676b99-3bf3-11e9-9d11-06959b4340fe">test it</a><br />
<p>Please check your account details and edit them if necessary</p><br />
<?php while ($customer = $result->fetch_assoc()) { ?>
First Name: <input required="required" type="text" name="className" size="50" value="<?php echo $customer['firstname']?>"><br />
Last Name: <input required="required" type="text" name="className" size="50" value="<?php echo $customer['lastname']?>"><br />
<?php } ?>
</body>