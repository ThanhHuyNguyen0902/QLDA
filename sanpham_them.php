<h3>Thêm Sản Phẩm Mới</h3>
<form enctype="multipart/form-data"  action="index.php?do=sanpham_them_xuly" method="post">
	<table class="FormDangBaiViet">
		<tr>
			<td>
				<span class="MyFormLabel">Mã sản phẩm:</span>
				<input type="text" name="MaSanPham" size = " 60" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Tên sản phẩm:</span>
				<input type="text" name="TenSanPham" size = " 60" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Nhà Sản Xuất:</span>
				<select name="IdNhaSanXuat">
					<option value="">-- Chọn --</option>
					<?php
						$sql = "SELECT * FROM `tbl_nhasanxuat` WHERE 1 ORDER BY TenNhaSanXuat";
						$danhsach = $connect->query($sql);
						//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
						if (!$danhsach) {
							die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
							exit();
						}

						
						while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) 
						{
							echo "<option value='" . $dong['IdNhaSanXuat'] . "'>" 
							.$dong['TenNhaSanXuat'] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel"> Phân Loại:</span>
				<textarea name="PhanLoai" cols="50"></textarea>
			</td>
		</tr>
		<tr>        
			<td>Hình ảnh<input type="file" name="HinhAnh"></td>
		</tr>		
		
		<tr>
       
			<td>Đơn Giá<input type="text" name="DonGia" size="50"></td>
		</tr>
		<tr>
       
			<td>Số Lượng<input type="text" name="SoLuong" size="50"></td>
		</tr>
		<tr>
       
			<td>Tỉ Lệ Giảm Giá<input type="text" name="TiLeGiamGia" size="50"></td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Mô Tả:</span>
				
				<textarea name="MoTa" id="MoTa"></textarea>				
				<script>CKEDITOR.replace('MoTa');</script>
				
			</td>
		</tr>
		    

	</table>
	
	<input type="submit" value="Đăng bài" />
</form>