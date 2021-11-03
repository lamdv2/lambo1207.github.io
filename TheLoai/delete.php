<?php
include("connect.php");
$idTL = $_GET["key"];
$sql="delete from theloai where idTL=" . $idTL  ;

if(mysqli_query($conn, $sql))
{
echo "<script language='javascript'>alert('Xoá thành công');";
echo "location.href='list.php';</script>";
}
?>