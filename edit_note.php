<?php
    if(!empty($_GET['id']))
    {
        include 'database.php';

        $id = $_GET['id'];
        $date_time = $_POST['date-time'];
        $color_id = $_POST['color'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        $date = substr($date_time,0,10);
        $date = strtotime($date);
        $date = date('Y-m-d', $date);

        $time = substr($date_time,11,strlen($date_time));
        $time = strtotime($time);
        $time1 = date('H:i:a', $time);
        $meridiem = substr($time1,6,strlen($time1));
        $time = date('H:i:s', $time);
        /*if($meridiem == 'PM' || $meridiem == 'pm')
        {
            $hour = (int)date('H', $time);
            if($hour != 12)
            {
                $hour += 12;  
                $hour = (string)$hour;
            }
            else
                $hour = "00";
            
            
            $minute = date('i', $time);
            $time1 = $hour.":".$minute;
            var_dump($minute,$time1,$hour);
        }*/
        
        $db->query("UPDATE notes SET title = '$title', date = '$date', time = '$time', text = '$text', color = '$color_id' WHERE id = '$id'");

    }
    header("Location:index.php");
?>
