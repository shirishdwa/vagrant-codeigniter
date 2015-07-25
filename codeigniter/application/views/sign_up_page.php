<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up Page</title>
</head>
<body>
	<h1>Sign up</h1>
    <?= form_open('signup/signup_validation') ?>
    <?= validation_errors() ?>
    <table>
      <tr>
        <td>Name</td>
        <td><?= form_input('user_name', $this->input->post('user_name')) ?></td>
      </tr>
      <tr>
        <td>Mail address</td>
        <td><?= form_input('mail_address', $this->input->post('mail_address')) ?></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><?= form_password('password') ?></td>
      </tr>
      <tr>
        <td>Re-enter Password</td>
        <td><?= form_password('password_confirm') ?></td>
      </tr>
    </table>
    <?= form_submit('sign_up_submit','Sign up') ?>
    <?= form_close() ?>
</body>
</html>