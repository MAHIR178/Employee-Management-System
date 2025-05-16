<?php

if (isset($_FILES['myfile'])) {
    $src = $_FILES['myfile']['tmp_name'];
    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
    $fileName = 'uploaded_' . time() . '.' . $ext;

    $uploadDir = "C:/xampp/htdocs/Employee-Management-System/Upload/";

    // Make sure the 'upload' directory exists
    if (!file_exists('upload')) {
        mkdir('upload', 0777, true);
    }

    if (move_uploaded_file($src, $des)) {
        echo "Success";
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "No file uploaded.";
}
?>
