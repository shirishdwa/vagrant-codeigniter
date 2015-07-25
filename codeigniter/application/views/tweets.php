<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tweet page</title>
</head>
<body>
    <div id="tweet_post">
    <?php echo $this->session->userdata('user_name'); ?>
    <a href='<?php echo base_url()."main/logout" ?>'>Logout</a>
    <h1>Tweets</h1>
    
    <?php
        echo form_open('tweet/tweet_validation', array('id' => 'tweet_form'));
        echo validation_errors();
        $tweet = array(
            'name'        => 'tweet',
            'id'          => 'tweet',
            'placeholder' => 'Write something',
            'maxlength'   => '140',
            'size'        => '50',
            'style'       => 'width:30%',
        );
        echo "<p>".form_input($tweet)."</p>";
        echo "<p>".form_submit('tweet_submit','Tweet')."</p>";
        echo form_close();
    ?>
    </div>
    <div id="tweet_content">        
    <?php
        if ($num_tweets == 0) {
            echo "<p>No tweets to display</p>";
        } else {
            $this->load->view('get_tweets');
        }
    ?>
    </div>
    
    <div id="more_button">
        <u><font color = "blue">Show more</font></u>
    </div>
    
    <script src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.7.1");
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var loaded_tweets = 0;
            $('#tweet_form').submit(function(e){
                e.preventDefault();
                console.log($('#tweet_form').serialize());
                $.ajax({
                    type: "POST",
                    url: "/tweet/tweet_validation",
                    data: $('#tweet_form').serialize(),
                    success: function(msg){
                        if (msg == "true") {
                            $.get("/tweet/get_latest_tweet/", function(data){
                                $("#tweet_content").prepend(data);
                                loaded_tweets++;
                            });
                        }
                    } 
                });
            });
        //})
    
        //$(document).ready(function(){
            var num_tweets = <?=$num_tweets?>;  
            var page_limit = <?=$page_limit?>;
            //var loaded_tweets = 0;
            $("#more_button").click(function(){
                loaded_tweets += page_limit;
                $.get("/tweet/get_tweets/" + loaded_tweets, function(data){
                    $("#tweet_content").append(data);
                });
                if (loaded_tweets >= num_tweets - page_limit)
                {
                    $("#more_button").hide();
                    //alert('hide');
                }
            })
    	})
    </script>
</body>
</html>