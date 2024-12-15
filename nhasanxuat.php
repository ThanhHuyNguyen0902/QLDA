<?php
	$sql = "select * from`tbl_nhasanxuat` WHERE 1";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
?>
<h3>Danh sách chủ đề</h3>
<table class="DanhSach">
	<tr>
		<th width="30%">ID nhà sản xuất</th>
		<th width="55%">Tên nhà sản xuất</th>
		<th width="15%" colspan="2">Hành động</th>
	</tr>
	<?php
		while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) {		
			echo "<tr  bgcolor='#ffffff' onmouseover='this.style.background=\"#dee3e7\"' onmouseout='this.style.background=\"#ffffff\"'>";
				echo "<td>" . $dong["IdNhaSanXuat"] . "</td>";
				echo "<td>" . $dong["TenNhaSanXuat"] . "</td>";
				echo "<td align='center'><a href='index.php?do=nhasanxuat_sua&id=" . $dong["IdNhaSanXuat"] . "'><img src='images/edit.png' /></a></td>";
				echo "<td align='center'><a href='index.php?do=nhasanxuat_xoa&id=" . $dong["IdNhaSanXuat"] . "' onclick='return confirm(\"Bạn có muốn xóa chủ đề " . $dong['TenNhaSanXuat'] . " không?\")'><img src='images/delete.png' /></a></td>";
			echo "</tr>";
		}
	?>
</table>
	
<a href="index.php?do=nhasanxuat_them">Thêm mới nhà sản xuất</a>
</form>