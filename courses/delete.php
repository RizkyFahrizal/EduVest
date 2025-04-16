<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM courses WHERE id_course=$id";
    
    $db->runSQL($sql);
    header("location:/eduvest/courses/select.php");
    }
?>