<?php 
    $id = $_POST['id'];

    session_destroy();
    header("location: index.php");
?>