<?php 
//interpret checkboxes into numbers
if($_POST["is_parent"] == 'on') {
	$is_parent = 1;
} else {
	$is_parent = 0;
}
if($_POST["is_student_adult"] == 'on') {
	$is_student_adult = 1;
} else {
	$is_student_adult = 0;
}
if($_POST["is_student_minor"] == 'on') {
	$is_student_minor = 1;
} else {
	$is_student_minor = 0;
}
if($_POST["is_relative"] == 'on') {
	$is_relative = 1;
} else {
	$is_relative = 0;
}
if($_POST["is_sibling"] == 'on') {
	$is_sibling = 1;
} else {
	$is_sibling = 0;
}
if($_POST["is_instructor"] == 'on') {
	$is_instructor = 1;
} else {
	$is_instructor = 0;
}
if($_POST["is_vol_adult"] == 'on') {
	$is_vol_adult = 1;
} else {
	$is_vol_adult = 0;
}
if($_POST["is_vol_minor"] == 'on') {
	$is_vol_minor = 1;
} else {
	$is_vol_minor = 0;
}
if($_POST["h_env_electronic"] == 'on') {
	$h_env_electronic = 1;
} else {
	$h_env_electronic = 0;
}
if($_POST["h_env_compsci"] == 'on') {
	$h_env_compsci = 1;
} else {
	$h_env_compsci = 0;
}
if($_POST["h_env_mecheng"] == 'on') {
	$h_env_mecheng = 1;
} else {
	$h_env_mecheng = 0;
}
if($_POST["is_sponsor"] == 'on') {
	$is_sponsor = 1;
} else {
	$is_sponsor = 0;
}
if($_POST["is_alumni"] == 'on') {
	$is_alumni = 1;
} else {
	$is_alumni = 0;
}
?>