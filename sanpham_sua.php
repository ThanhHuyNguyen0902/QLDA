<?php
	$MaSP = $_GET['id'];
	
	$sql = "select * from `tbl_sanpham` where MaSanPham = '$MaSP'";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC)
?>
<h3>Sửa sản phẩm</h3>
<form action="index.php?do=sanpham_sua_xuly" method="post">
	<table class="FormDangBaiViet">
		
		<input type="hidden" name="IdSanPham" value="<?php echo $dong['IdSanPham']; ?>" />
		<tr>
			<td>
				<span class="MyFormLabel">Mã sản phẩm:</span>
				<input type="text" name="MaSanPham" value="<?php echo $dong['MaSanPham']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Tên sản phẩm:</span>
				<input type="text" name="TenSanPham" value="<?php echo $dong['TenSanPham']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Nhà sản xuất:</span>
				<select name="IdNhaSanXuat">
					<option value="">-- Chọn --</option>
					<?php
						$sql = "select * from `tbl_nhasanxuat` where 1 ORDER BY TenNhaSanXuat";
						$danhsach = $connect->query($sql);
						//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
						if (!$danhsach) {
							die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
							exit();
						}
						
						while($dong_nsx = $danhsach->fetch_array(MYSQLI_ASSOC))
						{
							if($dong['IdNhaSanXuat'] == $dong_nsx['IdNhaSanXuat'])
								echo "<option value='" . $dong_nsx['IdNhaSanXuat'] . "' selected='selected'>" . $dong_nsx['TenNhaSanXuat'] . "</option>";
							else
								echo "<option value='" . $dong_nsx['IdNhaSanXuat'] . "'>" . $dong_nsx['TenNhaSanXuat'] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Phân Loại:</span>
				<textarea name="PhanLoai"><?php echo $dong['PhanLoai']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Đơn giá</span>
				<input type="text" name="DonGia" value="<?php echo $dong['DonGia']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Số lượng</span>
				<input type="text" name="SoLuong" value="<?php echo $dong['SoLuong']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Tỉ lệ giảm giá</span>
				<input type="text" name="TiLeGiamGia" value="<?php echo $dong['TiLeGiamGia']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Mô tả:</span>
				<textarea name="MoTa" id="MoTa"><?php echo $dong['MoTa']; ?></textarea>
				<script type="text/javascript">
					var editor = CKEDITOR.replace('MoTa');
					
					CKFinder.setupCKEditor(editor, '/trangtin_v0.6/scripts/ckfinder/');
				</script>
			</td>
		</tr>
	</table>
	
	<input type="submit" value="Cập nhật" />
</form>