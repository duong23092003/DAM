<?php
    $id=$_GET['id'];
    include_once('db.php');
    $sql = "DELETE FROM sanpham WHERE id_sp=$id";
    $conn->exec($sql);
    header("location: admin.php");

?>
