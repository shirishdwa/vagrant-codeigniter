<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tweet page</title>
</head>
<body>
	<?php
	
	   echo "<p>Tweets</p>";
	   
       form_open();
       
       echo "<p>";
       $data = array(
              'name'        => 'tweet',
              'id'          => 'tweet',
              'value'       => 'Write something',
              'maxlength'   => '140',
              'size'        => '50',
              'style'       => 'width:30%',
            );
	   echo form_input($data);
	   echo "</p>";
       	
   	   echo "<p>";
	   echo form_submit('login_submit','Tweet');
	   echo "</p>";
       
       form_close();
       
       $this->db->where('user_info_id','info_id');
            
       $query = $this->db->get('tweets');
       $num_tweets = $query->num_rows;
       if($num_tweets == 0)
       {
           echo "<p>No tweets to display</p>";
       }
       else
       {
           for ($i=0;$i<$num_tweets;$i++)
           {
               //Display tweets 
           }
       }
        
    ?>
    
    <a href='<?php echo base_url()."main/logout" ?>'>Logout</a> 
	


</body>
</html>