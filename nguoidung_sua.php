<?php
if(isset($_GET['do']) && $_GET['do'] == 'nguoidung_sua' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql_select = "SELECT * FROM `tbl_nguoidung` WHERE `MaNguoiDung` = $id";
    $result = $connect->query($sql_select);

	$user = $result->fetch_assoc();
	
	$HoVaTen = $user['TenNguoiDung'];
	$TenDangNhap = $user['TenDangNhap'];

	if(isset($_POST['submit'])) {
		$newHoVaTen = $_POST['HoVaTen'];
		$newTenDangNhap = $_POST['TenDangNhap'];

		$sql_update = "UPDATE `tbl_nguoidung` SET `TenNguoiDung` = '$newHoVaTen', `TenDangNhap` = '$newTenDangNhap' WHERE `MaNguoiDung` = $id";
		$update_result = $connect->query($sql_update);

		if($update_result)
		{
			header("Location: index.php?do=nguoidung");
		}
		else
		{
			echo "Không cập nhật được" . $connect->error;
		}

	}

}
?>

	<h3>Sửa thông tin người dùng</h3>
	<form action="" method="post">
	<table class="Form">
		<tr>
			<td>Tên đăng nhập:</td>
			<td><input type="text" name="TenDangNhap" value="<?php echo $TenDangNhap; ?>"/></td>
		</tr>
		<tr>
			<td>Họ và tên:</td>
			<td><input type="text" name="HoVaTen" value="<?php echo $HoVaTen; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Lưu" /></td>
		</tr>
	</table>
	</form>