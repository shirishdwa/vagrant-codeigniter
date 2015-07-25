<?php
    foreach ($latest_tweets as $row)
    {
        echo $row->tweets.'<br>'.$row->datetime_created.'<br><br>';
    }
?>