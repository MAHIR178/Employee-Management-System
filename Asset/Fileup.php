<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (
        empty($_POST['docTitle']) ||
        empty($_FILES['myfile']['name']) ||
        empty($_POST['permission']) ||
        empty($_POST['signatureName']) ||
        empty($_POST['retentionDate'])
    ) {
        die("Error: All fields are required.");
    }

    
    $docTitle = trim($_POST['docTitle']);
    $signatureName = trim($_POST['signatureName']);
    $permission = $_POST['permission'];
    $retentionDate = $_POST['retentionDate'];
    $file = $_FILES['myfile'];


    $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'png'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExtensions)) {
        die("Error: Invalid file type. Only PDF, DOC, DOCX, JPG, and PNG are allowed.");
    }

    $sanitizedTitle = preg_replace('/[^a-zA-Z0-9_-]/', '_', $docTitle);
    $sanitizedTitle = trim($sanitizedTitle, '_');
    if (empty($sanitizedTitle)) {
        die("Error: Invalid document title for file name.");
    }
    $fileName = $sanitizedTitle . '.' . $ext;

 
    $uploadDir = 'C:/xampp/htdocs/Employee-Management-System/Asset/upload/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

 
    $des = $uploadDir . $fileName;

   
    if (file_exists($des)) {
        die("Error: A file with the name '$fileName' already exists.");
    }


    if (move_uploaded_file($file['tmp_name'], $des)) {
        
        echo "Success: File uploaded as '$fileName'.";
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "Error: No file uploaded or invalid request.";
}
?>