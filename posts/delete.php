<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    if(deletePost($id)){
        header("location: index.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
?>
