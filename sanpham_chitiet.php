<?php
	$MaSP = $_GET['id'];
	
	$sql = "SELECT *
			FROM tbl_sanpham A, tbl_nhasanxuat B
			WHERE A.IdNhaSanXuat = B.IdNhaSanXuat AND A.MaSanPham = '$MaSP'";

	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
	
	// Tăng lượt xem
	$sql = "update tbl_sanpham set LuotXem = LuotXem + 1 WHERE MaSanPham = '$MaSP'";
	$truyvan_luotxem = $connect->query($sql);
	
	
?>
<h3><?php echo $dong['TenSanPham']; ?></h3>

<p class="TomTat">Nhà sản xuất: <?php echo $dong['TenNhaSanXuat']; ?></p>
<p class="TomTat">Đơn giá: <?php echo $dong['DonGia']; ?></p>
<p class="TomTat">Số lượng: <?php echo $dong['SoLuong']; ?></p>
<p class="TomTat">Tỉ lệ giảm giá: <?php echo $dong['TiLeGiamGia']; ?></p>
<p><?php echo    "<td colspan=\"2\"><img width=\"200\" src=" . $dong["HinhAnh"] . "></td>"; ?></p>
<h4 >Mô Tả:</h4>
<p class="NoiDung"><?php echo $dong['MoTa']; ?></p>




