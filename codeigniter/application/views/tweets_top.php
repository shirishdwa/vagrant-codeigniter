<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tweet page</title>
</head>
<body>
    <?php echo $this->session->userdata('user_name'); ?>
    <a href='<?php echo base_url()."main/logout" ?>'>Logout</a>
    <h1>Tweets</h1>
    <?php
        echo form_open('tweet/tweet_validation');
        echo validation_errors();
        $tweet = array(
            'name'        => 'tweet',
            'id'          => 'tweet',
            'value'       => 'Write something',
            'maxlength'   => '140',
            'size'        => '50',
            'style'       => 'width:30%',
        );
        echo "<p>".form_input($tweet)."</p>";
        echo "<p>".form_submit('login_submit','Tweet')."</p>";
        echo form_close();
    ?>
</body>
</html>