<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
</head>
<body>
	<?php
    
    echo form_open('main/reg_validation');
    
	echo "<p>Name: ";
	echo form_input('user_name');
	echo "</p>";
	
	echo "<p>Mail address: ";
	echo form_input('mail_address');
	echo "</p>";

	echo "<p>Password: ";
	echo form_password('password');
	echo "</p>";
	
	echo "<p>";
	echo form_submit('login_submit','Register');
	echo "</p>";
	
    echo form_close();
	?>


</body>
</html>