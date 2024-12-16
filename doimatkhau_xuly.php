<?php
	include_once "cauhinh.php"; 

	if(isset($_POST['MaNguoiDung'], $_POST['MatKhauCu'], $_POST['MatKhauMoi'], $_POST['XacNhanMatKhauMoi'])) {
		$id = $_POST['MaNguoiDung'];
		$matKhauCu = $_POST['MatKhauCu'];
		$matKhauMoi = $_POST['MatKhauMoi'];
		$xacNhanMatKhauMoi = $_POST['XacNhanMatKhauMoi'];

		$newmatkhau = md5($matKhauMoi);
		$oldmatkhau = md5($matKhauCu);

		$sql = "SELECT MatKhau FROM tbl_nguoidung WHERE MaNguoiDung = $id";
		$kq = $connect->query($sql);
		if($kq && $kq->num_rows > 0){
			$row = $kq->fetch_assoc();
			$MatKhau = $row['MatKhau'];
			if($oldmatkhau === $MatKhau){
				if($matKhauMoi === $xacNhanMatKhauMoi)
				{
					$sql_update = "UPDATE `tbl_nguoidung` SET `MatKhau` = '$newmatkhau' WHERE `MaNguoiDung` = $id";
					$update_result = $connect->query($sql_update);
				}
			}
		}
		if($update_result)
		{
			echo"Đã cập nhật thành công mật khẩu mới";
		}
		else echo "Lỗi";
	}
?>