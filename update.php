<?php
$id = $_POST["txtid"];
$lop = $_POST["txtlop"];
$mota = $_POST["txtmota"];

$conn = new mysqli("localhost", "root", "vertrigo", "qlsv");
$sql = "update lop set lop='$lop', mota='$mota' where id=$id";
if(mysqli_query($conn, $sql))
    header("Location:index.php");
else
    echo "Lỗi";
?>


