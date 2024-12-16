<?php
	// Lấy thông tin từ FORM
	$MaSanPham = $_POST['MaSanPham'];
	$TenSanPham = $_POST['TenSanPham'];
	$IdNhaSanXuat = $_POST['IdNhaSanXuat'];
	$PhanLoai = $_POST['PhanLoai'];	
	$DonGia = $_POST['DonGia'];
	$SoLuong = $_POST['SoLuong'];
	$TiLeGiamGia = $_POST['TiLeGiamGia'];
	$MoTa = $_POST['MoTa'];
	
	
	// Kiểm tra
	if(trim($MaSanPham) == "")
		ThongBaoLoi("Mã sản phẩm không được bỏ trống!");
	elseif(trim($IdNhaSanXuat) == "")
		ThongBaoLoi("Chưa chọn nhà sản xuất!");
	elseif(trim($TenSanPham) == "")
		ThongBaoLoi("Tên sản phẩm không được bỏ trống!");
	elseif(trim($PhanLoai) == "")
		ThongBaoLoi("Phân Loại không được bỏ trống!");
	elseif(trim($MoTa) == "")
		ThongBaoLoi("Mô tả không được bỏ trống!");
	elseif(trim($TiLeGiamGia) == "" || !(is_numeric($TiLeGiamGia)))
		ThongBaoLoi("Tỉ lệ giảm giá không được bỏ trống và phải là số!");
	elseif(trim($DonGia) == "" || !(is_numeric($DonGia)))
		ThongBaoLoi("Đơn giá không được bỏ trống và phải là số!");
	elseif(trim($SoLuong) == "" || !(is_numeric($SoLuong)))
		ThongBaoLoi("Số lượng không được bỏ trống và phải là số!");
	
	else
	{
		//Lưu tập tin upload vào thư mục hinhanh
		$target_path = "images/";
		$target_path1 = "../TrangTin/images/";
		 
		$target_path = $target_path . basename($_FILES['HinhAnh']['name']);
		$target_path1 = $target_path1 . basename($_FILES['HinhAnh']['name']);
		
		
		if (move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $target_path))
		{
			echo "";
			//echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";			
		}
			
		else
			echo "Tập tin upload không thành công.<br/>";		
		
		copy($target_path, $target_path1);
		

		$MaNguoiDung = $_SESSION['MaND'];
				
		
		$sql = "insert into `tbl_sanpham`(`MaSanPham`, `TenSanPham`, `IdNhaSanXuat`, `HinhAnh`, `DonGia`, `PhanLoai`, `SoLuong`, `TiLeGiamGia`, `MoTa`, `LuotXem`)
				VALUES ('$MaSanPham', '$TenSanPham', $IdNhaSanXuat,'$target_path', $DonGia, '$PhanLoai', $SoLuong, $TiLeGiamGia, '$MoTa', 0)";
		
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			ThongBao("Thêm sản phẩm thành công!");
		}
		
		
		
	}
?>