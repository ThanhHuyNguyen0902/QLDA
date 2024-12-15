<?php
	// Lấy thông tin từ FORM
	$TenNhaSanXuat = $_POST['TenNhaSanXuat'];
	
	// Kiểm tra
	if(trim($TenNhaSanXuat) == "")
		ThongBaoLoi("Tên nhà sản xuất không được bỏ trống!");
	else
	{
		$sql = "INSERT INTO `tbl_nhasanxuat`(`TenNhaSanXuat`) VALUES ('$TenNhaSanXuat')";
		$danhsach = $connect->query($sql);
		echo $sql;
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