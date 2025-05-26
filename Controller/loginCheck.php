<?php
    session_start();

    // Read JSON from AJAX
    if (isset($_POST['json'])) {
        $data = json_decode($_POST['json'], true);
        $username = trim($data['username']);
        $password = trim($data['password']);

        // DB connection
        $con = mysqli_connect('127.0.0.1', 'root', '', 'wabtech');

        // Validate inputs
        if ($username == "" || $password == "") {
            echo "Null username/password!";
        } else {
            $sql = "select * from users where username='{$username}' and password='{$password}'";
            $result = mysqli_query($con, $sql);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                setcookie('status', 'true', time() + 3000, '/');
                echo "success";
            } else {
                echo "Invalid user!";
            }
        }
    } else {
        echo "Invalid request!";
    }
?>
