<style type="text/css">
.controlSpacer {
    float: left;
    wIDth: 15%;
}
.sortRecord {
    wIDth: 8%;
    padding-left: 1%;
    float: left;
}
.sortID {
    float: left;
    wIDth: 13%;
    padding-left: 1%;
}
.sortName {
    float: left;
    padding-left: 1%;
    wIDth: 60%;
}
.sortOptions {
    float: left;
    wIDth: 100%;
    border-top: 1px solID black;
    padding: 5px 0 5px 5px;
    font-size: 12px;
}
.classRow {
	float: left;
    wIDth: 100%;
    border-top: 1px solID black;
    padding: 5px 0 5px 5px;
}
.classRow.lav {
    background-color: lavender;
}
.classOptions {
    float: left;
    wIDth: 15%;
    border-right: 1px solID black;
}
.classRecord {
	float: left;
    wIDth: 8%;
    padding-left: 1%;
    border-right: 1px solID black;
}
.classID {
    float: left;
    padding-left: 1%;
    border-right: 1px solID black;
    wIDth: 13%;
}
.className {
    float: left;
    padding-left: 1%;
    border-right: 1px solID black;
    wIDth: 40%;
}
.amountDue {
    float: left;
    padding-left: 1%;
    border-right: 1px solID black;
    wIDth: 8%;
}
.amountPaid {
    float: left;
    padding-left: 1%;
    wIDth: 8%;
}
</style>
<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<?php
//password auth
require('../protect-this.php');

//connect to db
include('../_includes/connect.php');

//class deleted notification
if ($_GET['deleted'] == 1) { ?>
<div style="outline: 1px solID green; padding: 5px;
    margin-bottom: 10px;">
	<img style="float: left" src="../images/checkmark.png" />
	<p style="float: left; margin: 0px 5px;">Transaction deleted.</p><br /><br />
</div>
<?php } ?>
<?php
// column sorting
$sql = "SELECT * FROM " . $table_transactions . " order by ID asc";
$result = $mysqli->query($sql); ?>
<h3>SELECT A TRANSACTION TO MANAGE<br />
==============
</h3>
<a href="../index.php">Go back</a><br /><br />
<div class="classRow">
    <div class="classOptions">
        <p>&nbsp;</p>
    </div>
    <div class="classRecord">
        <p>Trans ID</p>
    </div>
    <div class="classID">
        <p>Student Name</p>
    </div>
    <div class="className">
        <p>Class Name</p>
    </div>
    <div class="amountDue">
        <p>Amount Due</p>
    </div>
    <div class="amountPaid">
        <p>Amount Paid</p>
    </div>
</div>
</div>
<?php
$i = 1;
while ($trans = $result->fetch_assoc()) {
    if($i % 2 == 0) {
    	echo '<div class="classRow">';
    } else {
    	echo '<div class="classRow lav">';
    }
$sql2 = "SELECT * FROM " . $table_student . " where id = " . $trans['StudentID'] . "";
$result2 = $mysqli->query($sql2);
$student = $result2->fetch_assoc(); 
$sql3 = "SELECT * FROM " . $table_classes . " where id = " . $trans['ClassID'] . "";
$result3 = $mysqli->query($sql3);
$class = $result3->fetch_assoc(); 
?>
<div class="classOptions">
<?php echo '<a href=viewtransactions.php?ID=' . $trans['ID'] .'>VU</a>' . ' | ' . '<a href=edittransaction.php?ID=' . $trans['ID'] .'>ED</a>' . ' | ' . '<a href=duplicatetransaction.php?ID=' . $trans['ID'] .'>DUP</a>' . ' | ' . '<a href=confirmdelete.php?ID=' . $trans['ID'] .'>DEL</a></div><div class="classRecord">' . ' # ' . $trans['ID'] . '</div><div class="classID">' . $student['fname'] . ' ' . $student['lname'] . '</div><div class="className">' . $class['Class_Name'] . '</div><div class="amountDue">$' . $trans['AmountDue'] . '</div><div class="amountPaid">$' . $trans['AmountPaid'] . '</div></div>';
$i++;
}
?>
</div><!-- .classRow -->
</body>