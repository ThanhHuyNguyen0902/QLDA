<?php
include_once "cauhinh.php"; 

if(isset($_POST['HoVaTen'], $_POST['MaNguoiDung'])) {
    $newHoVaTen = $_POST['HoVaTen'];
    $newTenDangNhap = $_POST['TenDangNhap']; 
    $id = $_POST['MaNguoiDung'];

    $sql_update = "UPDATE `tbl_nguoidung` SET `TenNguoiDung` = '$newHoVaTen' WHERE `MaNguoiDung` = $id";
    $update_result = $connect->query($sql_update);

    if($update_result) {
        echo "Cập nhật thành công ";
        exit(); 
    } else {
        echo "Không cập nhật được: " . $connect->error;
    }
} else {
    echo "Dữ liệu không hợp lệ"; 
}
?>