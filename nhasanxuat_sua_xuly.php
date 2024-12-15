<?php
	// Lấy thông tin từ FORM
	$IdNhaSanXuat = $_POST['IdNhaSanXuat'];
	$TenNhaSanXuat = $_POST['TenNhaSanXuat'];
	
	// Kiểm tra
	if(trim($TenNhaSanXuat) == "")
		ThongBaoLoi("Tên nhà sản xuất không được bỏ trống!");
	else
	{
		$sql = "update `tbl_nhasanxuat` SET `TenNhaSanXuat` = '$TenNhaSanXuat' WHERE `IdNhaSanXuat` = $IdNhaSanXuat";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			header("Location: index.php?do=nhasanxuat");
		}
		
		
	}
?>