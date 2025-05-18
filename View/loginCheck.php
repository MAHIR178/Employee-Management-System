<?php
    session_start();

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if($username == "" || $password == ""){
            echo "Null username/password!";
        } else if($username == $password){
            setcookie('status', 'true', time()+3000, '/');
            header('location: home.php');
        } else {
            echo "invalid user!";
        }
    } else {
        header('location: login.html');
    }
?>
