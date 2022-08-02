<?php
    $db = new mysqli("localhost","id19275153_farzad","|_2-]?58x/Q!e(IR","id19275153_keep_notes");
    //$db = new mysqli("localhost","root","","keepnote");
    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        $db->query("SET CHARACTER SET utf8");
    }
?>