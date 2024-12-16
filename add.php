<?php
$lop = $_POST["txtlop"];
$mota = $_POST["txtmota"];

$conn = mysqli_connect("localhost", "root", "vertrigo", "qlsv");
$sql = "insert into lop(lop, mota) values('" . $lop . "', '" . $mota . "')";
if(mysqli_query($conn, $sql))
    header("Location:index.php");
else
    echo "Lỗi";
?>

