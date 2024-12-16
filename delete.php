<?php
$id = $_GET["id"];
if(isset($id)) {
    $conn = mysqli_connect("localhost", "root", "vertrigo", "qlsv");
    $sql = "delete from lop where id=" . $id;
    if(mysqli_query($conn, $sql))
        header("Location:index.php");
    else
        echo "Lỗi";
}

?>


