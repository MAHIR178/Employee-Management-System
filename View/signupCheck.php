<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if 'json' is sent
    if (!isset($_POST['json'])) {
        echo "Invalid request.";
        exit;
    }

    // Decode JSON input
    $data = json_decode($_POST['json']);

    if (!$data) {
        echo "Invalid JSON data.";
        exit;
    }

    // Extract and validate fields
    $fname = trim($data->fname ?? '');
    $lname = trim($data->lname ?? '');
    $id = trim($data->id ?? '');
    $email = trim($data->email ?? '');
    $gender = trim($data->gender ?? '');
    $dept = trim($data->dept ?? '');

    if ($fname === '' || $lname === '' || $id === '' || $email === '' || $gender === '' || $dept === '') {
        echo "All fields are required.";
        exit;
    }

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'webtech'); // Change DB name if needed

    if (!$conn) {
        echo "DB connection error.";
        exit;
    }

    // Check if ID or email already exists
    $check = "SELECT * FROM users WHERE id='$id' OR email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "User with this ID or email already exists.";
        mysqli_close($conn);
        exit;
    }

    // Insert user
    $sql = "INSERT INTO users (id, fname, lname, email, gender, dept) 
            VALUES ('$id', '$fname', '$lname', '$email', '$gender', '$dept')";

    if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
    } else {
        echo "Failed to sign up.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
