<?php
    include 'database.php';
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $db->query("DELETE FROM notes WHERE id = '$id'");
    }
    header("Location:index.php");

?>