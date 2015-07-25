<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .msg.error {background:url("/admin/design/ico-delete.gif") 10px 50% no-repeat;}
    </style>
	<title>Login Page</title>
</head>

<body>
	<h1>Login</h1>
    <?= form_open('login/login_validation') ?>
    <?= validation_errors() ?>
    <table>
      <tr>
        <td>Mail address</td>
        <td><?= form_input('mail_address', $this->input->post('mail_address')) ?></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><?= form_password('password') ?></td>
      </tr>
    </table>
    <p><?= form_submit('login_submit','Login') ?></p>
    <a href="/main/sign_up">Sign up here</a>
    <?= form_close(); ?>
</body>
</html>
