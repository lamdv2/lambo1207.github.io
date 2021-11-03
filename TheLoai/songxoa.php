<?php
include("config.php");
    $id = $_GET["key"];
    $sql="delete from music where id=" . $id  ;

    if(mysqli_query($conn, $sql))
    {
        echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='index.php';</script>";
    }
    else{
        echo "<script language='javascript'>alert('Xoá thành không công');";
        echo "location.href='#';</script>";
    }
?>