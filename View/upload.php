<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['myfile'])) {
        $src = $_FILES['myfile']['tmp_name'];
        $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $newName = 'profile_' . time() . '.' . $ext;
        $des = 'upload/' . $newName;

        if (move_uploaded_file($src, $des)) {
            echo "Profile updated successfully.<br>";
            echo "Image uploaded to: $des<br>";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded.";
    }
 else {
    echo "Invalid request method.";
}
?>
