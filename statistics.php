<html>
<head>
<title>Statistics</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="./css/bootstrap.css" rel="stylesheet">
<link href="./css/prettify.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/prettify.js"></script>
<script type="text/javascript" src="./js/jquery.collapsible-menus.min.js"></script>
<script type="text/javascript" src="./js/site.js"></script>
<style type="text/css">
body {
    font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
    padding: 20px;
}
.subheader {
    text-decoration: underline;
}
.type {
    width: 33%;
    float: left;
}
.back {
    float: left;
    clear: left;
    margin: 20px 0;
}
</style>
</head>
<body style="">
<?php
//password auth
require('protect-this.php');

//connect to db
include('./_includes/connect.php');
// get stats from db
include 'customer_queries.php';
include 'student_queries.php';
$c_class_sql = "SELECT COUNT(*) FROM " . $table_classes;
$c_class = $mysqli->query($c_class_sql);
$cd_class = $c_class->fetch_assoc(); 
$c_class_activated_sql = "SELECT COUNT(*) FROM " . $table_classes . " where activate = 1";
$c_class_activated = $mysqli->query($c_class_activated_sql);
$cd_class_activated = $c_class_activated->fetch_assoc(); 
$c_class_accred_sql = "SELECT COUNT(*) FROM " . $table_classes . " where accred_status = 1";
$c_class_accred = $mysqli->query($c_class_accred_sql);
$cd_class_accred = $c_class_accred->fetch_assoc(); 
$c_class_group_sql = "SELECT COUNT(*) FROM " . $table_classes . " where GroupBased = 1";
$c_class_group = $mysqli->query($c_class_group_sql);
$cd_class_group = $c_class_group->fetch_assoc(); 
$c_class_workshop_sql = "SELECT COUNT(*) FROM " . $table_classes . " where Workshop = 1";
$c_class_workshop = $mysqli->query($c_class_workshop_sql);
$cd_class_workshop = $c_class_workshop->fetch_assoc(); 
$c_class_monday_sql = "SELECT COUNT(*) FROM " . $table_classes . " where M = 1";
$c_class_monday = $mysqli->query($c_class_monday_sql);
$cd_class_monday = $c_class_monday->fetch_assoc(); 
$c_class_tuesday_sql = "SELECT COUNT(*) FROM " . $table_classes . " where T = 1";
$c_class_tuesday = $mysqli->query($c_class_tuesday_sql);
$cd_class_tuesday = $c_class_tuesday->fetch_assoc(); 
$c_class_wednesday_sql = "SELECT COUNT(*) FROM " . $table_classes . " where W = 1";
$c_class_wednesday = $mysqli->query($c_class_wednesday_sql);
$cd_class_wednesday = $c_class_wednesday->fetch_assoc(); 
$c_class_thursday_sql = "SELECT COUNT(*) FROM " . $table_classes . " where TH = 1";
$c_class_thursday = $mysqli->query($c_class_thursday_sql);
$cd_class_thursday = $c_class_thursday->fetch_assoc();
$c_class_friday_sql = "SELECT COUNT(*) FROM " . $table_classes . " where F = 1";
$c_class_friday = $mysqli->query($c_class_friday_sql);
$cd_class_friday = $c_class_friday->fetch_assoc();
$c_class_sat_sql = "SELECT COUNT(*) FROM " . $table_classes . " where Sat = 1";
$c_class_sat = $mysqli->query($c_class_sat_sql);
$cd_class_sat = $c_class_sat->fetch_assoc();
$c_class_sun_sql = "SELECT COUNT(*) FROM " . $table_classes . " where Sun = 1";
$c_class_sun = $mysqli->query($c_class_sun_sql);
$cd_class_sun = $c_class_sun->fetch_assoc();
?>

<h1>STATISTICS<br />
==============
</h1>
<a href="index.php">Go back</a>
<br /><br />
<?php include 'customer_display.php'; ?>
<div class="type">
<h2 class="subheader">Students</h2>
<p>Number of students: <?php echo $cd_stud['COUNT(*)'] ?></p>
<p>Number verified: <?php echo $cd_stud_verified['COUNT(*)'] ?></p>

<ul id="first">
    <li><a href="javascript:;">Roles</a></li>
    <li>
        <ul>
            <li>Parents: <?php echo $cd_stud_parents['COUNT(*)'] ?></li>
            <li>Student adults: <?php echo $cd_stud_student_adult['COUNT(*)'] ?></li>
            <li>Student minors: <?php echo $cd_stud_student_minor['COUNT(*)'] ?></li>
            <li>Relatives: <?php echo $cd_stud_relative['COUNT(*)'] ?></li>
            <li>Siblings: <?php echo $cd_stud_sibling['COUNT(*)'] ?></li>
            <li>Instructors: <?php echo $cd_stud_instructor['COUNT(*)'] ?></li>
            <li>Volunteer adults: <?php echo $cd_stud_vol_adult['COUNT(*)'] ?></li>
            <li>Volunteer minors: <?php echo $cd_stud_vol_minor['COUNT(*)'] ?></li>
            <li>Sponsors: <?php echo $cd_stud_sponsor['COUNT(*)'] ?></li>
        </ul>
    </li>       
</ul><!-- /.first -->
</div><!-- /.type -->
<div class="type">
<h2 class="subheader">Classes</h2>
<p>Number of classes: <?php echo $cd_class['COUNT(*)'] ?></p>
<p>Number activated: <?php echo $cd_class_activated['COUNT(*)'] ?></p>
<p>Number accredited: <?php echo $cd_class_accred['COUNT(*)'] ?></p>
<p>Group based: <?php echo $cd_class_group['COUNT(*)'] ?></p>
<p>Workshop: <?php echo $cd_class_workshop['COUNT(*)'] ?></p>
<ul id="first">
    <li><a href="javascript:;">Classes On Days of the Week</a></li>
    <li>
        <ul>
            <li>Monday: <?php echo $cd_class_monday['COUNT(*)'] ?></li>
            <li>Tuesday: <?php echo $cd_class_tuesday['COUNT(*)'] ?></li>
            <li>Wednesday: <?php echo $cd_class_wednesday['COUNT(*)'] ?></li>
            <li>Thursday: <?php echo $cd_class_thursday['COUNT(*)'] ?></li>
            <li>Friday: <?php echo $cd_class_friday['COUNT(*)'] ?></li>
            <li>Saturday: <?php echo $cd_class_sat['COUNT(*)'] ?></li>
            <li>Sunday: <?php echo $cd_class_sun['COUNT(*)'] ?></li>
        </ul>
    </li>       
</ul><!-- /.first -->

</div><!-- /.type -->
<br /><br  />
<div class="back">
<a href="index.php">Go back</a>
</div><!-- .back -->
</body>
</html>