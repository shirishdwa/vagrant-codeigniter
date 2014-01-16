<!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.3.2");
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var num_tweets = <?=$num_tweets?>;
            var loaded_tweets = 0;
            $("#more_button").click(function(){
                loaded_tweets += 10;
                $.get("/tweet/get_tweets/" + loaded_tweets, function(data){
	               $("#main_content").append(data);
                });
                if(loaded_tweets + 10 >= num_tweets - 10)
                {
	               $("#more_button").hide();
                   //alert('hide');
                }
            })
    	})
    </script>
</head>
<body>
    <div id="main_content">    
	<?php
        if($num_tweets == 0)
            echo "<p>No tweets to display</p>";
        else
            $this->load->view('get_tweets');
    ?>
    </div>
    
    <div id="more_button">
        Show more
    </div>
</body>
</html>