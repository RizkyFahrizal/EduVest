<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM categories WHERE id_category=$id";
    
    $db->runSQL($sql);
    header("location:/eduvest/categories/select.php");
    }
?>