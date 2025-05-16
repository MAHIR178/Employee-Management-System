<?php

$src = $_FILES['myfile']['tmp_name'];
$ext = explode('.', $_FILES['myfile']['name']);
$des = 'upload/'.'Myfiles.'.$ext[1];

if(move_uploaded_file($src, $des)){
    echo "Success";
}else{
    echo "Error";
}

?>
