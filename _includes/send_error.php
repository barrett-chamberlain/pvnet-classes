<?php 
	$url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $filepath = $_SERVER['SCRIPT_NAME'];
    $to      = 'wiredchamberlain@gmail.com';
    $subject = 'File error';
    $message = "Error from $url on file " . $filepath . "\n" . "Errno: " . $mysqli->errno . "\n" . "Error: " . $mysqli->error . "\n";
    $headers = 'From: admin@pvnet.com' . "\r\n" .
       'Reply-To: admin@pvnet.com';
    
    mail($to, $subject, $message, $headers);
    ?> <h3>An error has occurred</h3>
    <p>An error has occurred. The system administrator has been notified via email.
    <br /><br /><a href="<?php echo $home_link ?>">Go back</a></p> <?php