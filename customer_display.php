<div class="type">
<h2 class="subheader">Customers</h2>
<p>Number of customers: <?php echo $cd_cust['COUNT(*)'] ?></p>
<p>Number verified: <?php echo $cd_cust_verified['COUNT(*)'] ?></p>
<ul id="first">
    <li class="firstTab"><a href="javascript:;">Roles</a></li>
    <li>
        <ul>
            <li>Parents: <?php echo $cd_cust_parents['COUNT(*)'] ?></li>
            <li>Student adults: <?php echo $cd_cust_student_adult['COUNT(*)'] ?></li>
            <li>Student minors: <?php echo $cd_cust_student_minor['COUNT(*)'] ?></li>
            <li>Relatives: <?php echo $cd_cust_relative['COUNT(*)'] ?></li>
            <li>Siblings: <?php echo $cd_cust_sibling['COUNT(*)'] ?></li>
            <li>Instructors: <?php echo $cd_cust_instructor['COUNT(*)'] ?></li>
            <li>Volunteer adults: <?php echo $cd_cust_vol_adult['COUNT(*)'] ?></li>
            <li>Volunteer minors: <?php echo $cd_cust_vol_minor['COUNT(*)'] ?></li>
            <li>Sponsors: <?php echo $cd_cust_sponsor['COUNT(*)'] ?></li>
            <li>Alumni: <?php echo $cd_cust_alumni['COUNT(*)'] ?></li>
        </ul>
    </li>       
</ul><!-- /roles -->
<ul id="first">
    <li class="firstTab"><a href="javascript:;">Home Environment</a></li>
    <li>
        <ul>
            <li>Electronic: <?php echo $cd_cust_electronic['COUNT(*)'] ?></li>
            <li>Computer Science: <?php echo $cd_cust_compsci['COUNT(*)'] ?></li>
            <li>Mechanical Engineering: <?php echo $cd_cust_mecheng['COUNT(*)'] ?></li>
        </ul>
    </li>       
</ul><!-- /home env -->
</div><!-- /.type -->