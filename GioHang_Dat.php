<?php
   include_once "cauhinh.php";
   include_once "thuvien.php";

   if(isset($_POST['ChapNhan']) && ($_POST['ChapNhan']))
   {
      $HoTen = $_POST['HovatenKhach'];
      $SDT = $_POST['sdt'];
      $DiaChi = $_POST['address'];
   }

   if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
      $giohang = $_SESSION['giohang']; 
      $count = count($giohang);
      $i = 0;
      while($i < $count) {
         $card = $giohang[$i];
         $id_sp = $card[0]; 
         $ten_sp = $card[1]; 
         $gia_sp = $card[2]; 
         $so_luong = $card[3]; 

         $sql = "INSERT INTO `tbl_dondathang` (`IdSanPham`, `TenSanPham`, `TenKhachHang`, `SoDienThoai`, `DiaChi`, `SoLuong`, `DonGia`, `TrangThai`) 
                 VALUES ('$id_sp', '$ten_sp', '$HoTen', '$SDT', '$DiaChi', '$so_luong', '$gia_sp', 0)";

         $kq = $connect->query($sql); 
            $i++;
      }
  }

  unset($_SESSION['giohang']);
  echo"Đặt hàng thành công - Cảm ơn đã mua hàng";

?>