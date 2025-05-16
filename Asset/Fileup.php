<?php

if (isset($_FILES['myfile'])) {
    $src = $_FILES['myfile']['tmp_name'];
    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
    $fileName = 'uploaded_' . time() . '.' . $ext; // Ensure proper file name

    $uploadDir = "C:/xampp/htdocs/Employee-Management-System/Asset/";
    $des = $uploadDir . $fileName; // Set destination path

    // Make sure the 'upload' directory exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($src, $des)) {
        echo "Success: File uploaded as $fileName";
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "No file uploaded.";
}
?>
