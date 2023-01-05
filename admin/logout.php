<?php
session_start();
if($_SESSION['name']){
    session_unset();
    header('location: signin.php');
}

?>