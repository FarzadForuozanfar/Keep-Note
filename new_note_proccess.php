<?php
    
    if(isset($_POST['title-note']))
    {
        include 'database.php';
        $date_time = $_POST['date-note'];
        $color_id = $_POST['color'];
        $title = $_POST['title-note'];
        $text = $_POST['text-note'];

        $date = substr($date_time,0,10);
        $date = strtotime($date);
        $date = date('Y-m-d', $date);

        $time = substr($date_time,11,strlen($date_time));
        $time = strtotime($time);
        $time = date('H:i:s', $time);
        $db->query("INSERT INTO notes(title, date, time, text, color) VALUES('$title', '$date', '$time', '$text', '$color_id')");
    }
    header("Location:index.php");
?>