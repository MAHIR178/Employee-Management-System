<?php

if (isset($_FILES['myfile'])) {
    $src = $_FILES['myfile']['tmp_name'];

<<<<<<< HEAD

    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);

   
=======
  
    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);

>>>>>>> 567ba8d9e94b9d666e2b1b616894aac6d44d2bf4
    $fileName = 'uploaded_' . time() . '.' . $ext;

    
    $uploadDir =  'C:/xampp/htdocs/Employee-Management-System/Asset/upload/';
;

<<<<<<< HEAD
    
=======

>>>>>>> 567ba8d9e94b9d666e2b1b616894aac6d44d2bf4
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

<<<<<<< HEAD
    
    $des = $uploadDir . $fileName;

=======
   
    $des = $uploadDir . $fileName;

  
>>>>>>> 567ba8d9e94b9d666e2b1b616894aac6d44d2bf4
    if (move_uploaded_file($src, $des)) {
        echo "Success: File uploaded as $fileName";
    } else {
        echo "Error: Unable to upload the file.";
    }
} else {
    echo "No file uploaded.";
}
?>
