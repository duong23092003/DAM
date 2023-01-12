<?php
    $id=$_GET['id'];
    include_once('db.php');
    $sql = "DELETE FROM user WHERE id=$id";
    $conn->exec($sql);
    header("location: nguoi.php");

?>