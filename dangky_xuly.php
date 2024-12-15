<?php
	// Lấy thông tin từ FORM
	$HoVaTen = $_POST['HoVaTen'];
	$TenDangNhap = $_POST['TenDangNhap'];
	$MatKhau = $_POST['MatKhau'];
	$XacNhanMatKhau = $_POST['XacNhanMatKhau'];
	
	// Kiểm tra
	if(trim($HoVaTen) == "")
		ThongBaoLoi("Họ và tên không được bỏ trống!");
	elseif(trim($TenDangNhap) == "")
		ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
	elseif(trim($MatKhau) == "")
		ThongBaoLoi("Mật khẩu không được bỏ trống!");
	elseif($MatKhau != $XacNhanMatKhau)
		ThongBaoLoi("Xác nhận mật khẩu không đúng!");
	else
	{
		// Kiểm tra người dùng đã tồn tại chưa
		$sql_kiemtra = "SELECT * FROM tbl_nguoidung WHERE TenDangNhap = '$TenDangNhap'";
		
		$danhsach = $connect->query($sql_kiemtra);
		
		if($danhsach)
		{
			 // Lấy ID
			$sql_CotID = "SELECT MaNguoiDung FROM tbl_nguoidung;";
			$sql_ID = $connect->query($sql_CotID);
			if ($sql_ID->num_rows > 0) {

				$values = array();
				
				// Lặp qua các dòng kết quả và lưu trữ giá trị vào mảng
				while ($row = $sql_ID->fetch_assoc()) {
					$values[] = $row['MaNguoiDung'];
				}
				

				$ID = max($values);
			} else {
				$ID = 0;
			}

			$MaNguoiDung  = $ID + 1;



			// Mã hóa mật khẩu
			$MatKhau = md5($MatKhau);
			
			$sql_them = "INSERT INTO `tbl_nguoidung`(`MaNguoiDung`,`TenNguoiDung`, `TenDangNhap`, `MatKhau`, `QuyenHan`, `Khoa`)
					VALUES ('$MaNguoiDung','$HoVaTen', '$TenDangNhap', '$MatKhau', 2, 0);";
			$themnd = $connect->query($sql_them);
			
			if($themnd)
				ThongBao("Đăng ký thành công!");
			else
				ThongBaoLoi("Đăng ký thất bại");
		}
		else
		{
			ThongBaoLoi("Người dùng với tên đăng nhập đã được sử dụng!");
		}
	}
?>