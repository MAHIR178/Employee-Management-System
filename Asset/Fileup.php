<?php

if (isset($_FILES['myfile'])) {
    $src = $_FILES['myfile']['tmp_name'];

    // Get file extension safely
    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);

    // Create a unique filename
    $fileName = 'uploaded_' . time() . '.' . $ext;

    // Absolute path to the upload directory
    $uploadDir =  'C:/xampp/htdocs/Employee-Management-System/Asset/upload/';
;

    // Ensure the upload directory exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Define destination path AFTER setting $fileName and $uploadDir
    $des = $uploadDir . $fileName;

    // Now move the uploaded file
    if (move_uploaded_file($src, $des)) {
        echo "Success: File uploaded as $fileName";
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "No file uploaded.";
}
?>
