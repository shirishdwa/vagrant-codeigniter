<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
</head>
<body>
	<?php
 
    echo form_open('main/login_validation');
    
    echo validation_errors();
    
	echo "<p>Mail address: ";
	echo form_input('mail_address');
	echo "</p>";

	echo "<p>Password:   ";
	echo form_password('password');
	echo "</p>";
	
	echo "<p>";
	echo form_submit('login_submit','Login');	
	echo "</p>";
	
	echo( '<a href="main/reg">Register here</a>' );
    
    echo form_close();
	?>

</body>
</html>