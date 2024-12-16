<?php
	$IdSanPham = $_GET['id_sp'];
	
	$sql = "SELECT *
			FROM tbl_sanpham A, tbl_nhasanxuat B
			WHERE A.IdNhaSanXuat = B.IdNhaSanXuat AND A.IdSanPham = $IdSanPham";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
	
	// Tăng lượt xem
	$sql = "UPDATE tbl_sanpham SET LuotXem = LuotXem + 1 WHERE IdSanPham = $IdSanPham";
	$truyvan_luotxem = $connect->query($sql);
	
	
?>
<table>
	<tr> 
		<td>
			<h3><?php echo $dong['TenSanPham']; ?></h3>
			<p class="TomTat">Nhà sản xuất: <?php echo $dong['TenNhaSanXuat']; ?></p>
			<p class="TomTat">Đơn giá: <?php echo $dong['DonGia']; ?></p>
			<p class="TomTat">Số lượng: <?php echo $dong['SoLuong']; ?></p>
			<p class="TomTat">Tỉ lệ giảm giá: <?php echo $dong['TiLeGiamGia']; ?></p>
			<p><?php echo    "<img width=\"400\" src=" . $dong["HinhAnh"] . ">"; ?></p>			
		</td>
		<td>

		</td>
		<tr>
			<td colspan="2">
				<h4 >Mô Tả:</h4>
				<p class="NoiDung"><?php echo $dong['MoTa']; ?></p>
			</td>
		</tr>
	</tr>
</table>

<p>..................................................................................................</p>
<h3>Sản phẩm cùng nhà sản xuất </h3>
<?php  

	include "sanpham_nhasanxuat.php";
?>