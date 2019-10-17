<body style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
<style>
	.underline {text-decoration: underline;}
	.icon {margin-right: 5px; border:1px solid black;}
	.dialogue {float: left; margin-right: 10px; margin-top: 10px; border: 1px solid black; padding: 10px;}
</style>
<?php
//password auth
require('../protect-this.php'); ?>
<h3>Download a spreadsheet</h3>
<div class="dialogue">
	<h3>Class History</h3>
	<a href="generate_spreadsheet_class_history.php">Class history info</a><br /><br />
	<a href="generate_spreadsheet_class_history_order_by_class.php">Class history ordered by classes</a><br /><br />
	<a href="generate_spreadsheet_class_history_order_by_student.php">Class history ordered by students</a><br /><br />
</div>
<div class="dialogue">
	<h3>Customers</h3>
	<a href="generate_spreadsheet_customers.php">Customer info</a><br /><br />
	<a href="generate_spreadsheet_customers_order_by_last_name.php">Customer info ordered by last name</a><br /><br />
	<a href="generate_spreadsheet_customers_order_by_created.php">Customer info ordered by date created descending</a><br /><br />
</div>
<div class="dialogue">
	<h3>Students</h3>
	<a href="generate_spreadsheet_students.php">Student info</a><br /><br />
	<a href="generate_spreadsheet_students_order_by_last_name.php">Student info ordered by last name</a><br /><br />
	<a href="generate_spreadsheet_students_order_by_created.php">Student info ordered by date created descending</a><br /><br />
</div>
<div class="dialogue">
	<h3>Classes</h3>
	<a href="generate_spreadsheet_classes.php">Class info</a><br /><br />
</div>
<div class="dialogue">
	<h3>Transactions</h3>
	<a href="generate_spreadsheet_transactions.php">Transaction info</a><br /><br />
</div>
</body>