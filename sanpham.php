<?php
	$sql = "select *
			from tbl_sanpham A, tbl_nhasanxuat B
			where A.IdNhaSanXuat = B.IdNhaSanXuat ORDER by `IdSanPham` DESC";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
?>
<h3>Danh sách sản phẩm</h3>
<table class="DanhSach">
	<tr>
		<th>STT</th>
		<th>Mã sản phẩm</th>
		<th>Tên sản phẩm</th>
		<th>Nhà sản xuất</th>
		<th>Hình ảnh</th>
		<th colspan="2">Hành động</th>
	</tr>
	<?php
		$stt = 1;
		while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) {	
			echo "<tr>";
				echo "<td>" . $stt . "</td>";
				echo "<td>" . $dong['MaSanPham'] . "</td>";
				echo "<td><a href='index.php?do=sanpham_chitiet&id=" . $dong['MaSanPham'] . "'>" . $dong['TenSanPham'] . "</a></td>";
				echo "<td>" . $dong['TenNhaSanXuat'] . "</td>";
				echo "<td><img src='".$dong['HinhAnh']."' width='100'/></td>";

				echo "<td align='center'><a href='index.php?do=sanpham_sua&id=" . $dong['MaSanPham'] . "'><img src='images/edit.png' /></a></td>";
				echo "<td align='center'><a href='index.php?do=sanpham_xoa&id=" . $dong['MaSanPham'] . "' onclick='return confirm(\"Bạn có muốn xóa bài viết " . $dong['TenSanPham'] . " không?\")'><img src='images/delete.png' /></a></td>";
			echo "</tr>";
			$stt++;
		}
	?>
</table>

<a href="index.php?do=sanpham_them">Thêm sản phẩm</a>