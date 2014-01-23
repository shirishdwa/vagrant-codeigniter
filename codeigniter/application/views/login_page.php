<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login</h1>
    <?php
        echo form_open('login/login_validation');
        echo validation_errors();
    	echo "<p>Mail address: ".form_input('mail_address', $this->input->post('mail_address'))."</p>";
    	echo "<p>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".form_password('password')."</p>";
    	echo "<p>".form_submit('login_submit','Login')."</p>";
    	echo( '<a href="/main/sign_up">Sign up here</a>' );
        echo form_close();
	?>
</body>
</html>