<?php
    $id = $_GET["key"];
    if(isset($_POST['songUpdate'])){
        header("location: songchuyen.php");
    }
    if(isset($_POST['songDelete'])){
        header("location: songxoa.php");
    }

?>