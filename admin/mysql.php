<?php

    function connectdb() {
        $user = "root";
        $pass = "";
        $conn = new PDO('mysql:host=localhost:3308; dbname=lab5', $user , $pass);
        return $conn;
    }

    function checkUser($user, $pass) {
        $conn = connectdb ();
        $stmt = $conn -> prepare("SELECT * FROM user WHERE email= '".$user."' AND pass = '".$pass."'");
        $stmt -> execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if(count($kq)>0) {
            return $kq[0]['role'];
        } else return 2;
    }

    function checkName ($user, $pass) {
        $conn = connectdb();
        $stmt = $conn -> prepare ("SELECT * FROM user Where email = '".$user."' AND pass = '".$pass."'");
        $stmt -> execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        return $kq[0]['ten'];
    }

    function getUserEmail($email) {
        $conn = connectdb();
        $stmt = $conn -> prepare ("SELECT * FROM user Where email = '$email'");
        $stmt -> execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if($result){
            return $result;
        } else {
            echo "<h4 style = 'color:red;'>Not available!</h4>";
        }
    }

    function forgetPass($pass, $email) {
        $conn = connectdb();
        $stmt = $conn -> prepare ("UPDATE  user SET pass = '$pass' WHERE email = '$email'");
        $stmt -> execute();
    }

?>