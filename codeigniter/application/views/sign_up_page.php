<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up Page</title>
</head>
<body>
	<h1>Sign up</h1>
    <?php
        echo form_open('signup/signup_validation');
        echo validation_errors();
    	echo "<p>Name: ".form_input('user_name', $this->input->post('user_name'))."</p>";
    	echo "<p>Mail address: ".form_input('mail_address', $this->input->post('mail_address'))."</p>";
    	echo "<p>Password: ".form_password('password')."</p>";
    	echo "<p>".form_submit('sign_up_submit','Sign up')."</p>";
        echo form_close();
	?>
</body>
</html>