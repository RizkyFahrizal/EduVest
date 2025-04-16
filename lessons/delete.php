<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM lessons WHERE id_lesson=$id";
    
    $db->runSQL($sql);
    header("location:/eduvest/lessons/select.php");
    }
?>