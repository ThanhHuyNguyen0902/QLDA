<?php

if(isset($_GET['do']) && $_GET['do'] == 'nguoidung_xoa' && isset($_GET['id'])) {
    // Lấy ID của người dùng cần xóa từ tham số GET
    $id = $_GET['id'];

    // Xây dựng câu lệnh SQL để xóa người dùng
    $sql_delete = "DELETE FROM `tbl_nguoidung` WHERE `MaNguoiDung` = $id";

    // Thực thi câu lệnh SQL
    $result = $connect->query($sql_delete);

    // Kiểm tra kết quả thực thi
    if($result) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách người dùng
        header("Location: index.php?do=nguoidung");
        exit; // Kết thúc kịch bản
    } else {
        // Nếu có lỗi, hiển thị thông báo lỗi
        echo "Không thể xóa người dùng: " . $connect->error;
    }
}
?>