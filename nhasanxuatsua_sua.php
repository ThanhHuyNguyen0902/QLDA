<?php
	// Lấy chủ đề cần sửa "đổ" vào form
	$sql = "select * from `tbl_nhasanxuat` where IdNhaSanXuat = " . $_GET['id'];
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	echo $sql;
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>
<h3>Sửa nhà sản xuất</h3>
<form action="index.php?do=nhasanxuat_sua_xuly" method="post">
	<table class="Form">
		<input type="hidden" name="MaChuDe" value="<?php echo $dong['IdNhaSanXuat']; ?>" />
		<tr>
			<td>Tên nhà sản xuất:</td>
			<td><input type="text" name="TenNhaSanXuat" value="<?php echo $dong['TenNhaSanXuat']; ?>" /></td>
		</tr>
	</table>
	
	<input type="submit" value="Cập nhật" />
</form>