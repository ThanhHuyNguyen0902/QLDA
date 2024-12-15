<?php
    include_once "cauhinh.php"; 
   
    if(isset($_GET['id']) && ($_GET['id'])) {
        $idDonHang = $_GET['id'];
        $sqlUpdate = "UPDATE tbl_dondathang SET TrangThai = 1 WHERE IdDonHang = $idDonHang";
        $updateResult = $connect->query($sqlUpdate);

        $sql1 = "SELECT SoLuong, IdSanPham FROM tbl_dondathang WHERE IdDonHang = $idDonHang";
        $result1 = $connect->query($sql1);

        if ($result1 && $result1->num_rows > 0) {
            $row = $result1->fetch_assoc();
            $IdSp_DonHang = $row['IdSanPham'];
            $SoLuong_DonHang = $row['SoLuong'];
        }
        
      


        $sql2 = "SELECT SoLuong FROM tbl_sanpham WHERE IdSanPham = $IdSp_DonHang";
        $result2 = $connect->query($sql2);

        if ($result2 && $result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            $SoLuong_Kho = $row2['SoLuong'];

            $SoLuong_CapNhat = $SoLuong_Kho - $SoLuong_DonHang;

            $sql3 = "UPDATE tbl_sanpham SET SoLuong = '$SoLuong_CapNhat' WHERE IdSanPham = '$IdSp_DonHang'";
            $updateResult = $connect->query($sql3);
            if($updateResult) {
                $connect->close();
                header("Location: index.php?do=DanhSachDonHang");
                exit(); 
            }
        }
    }
?>
