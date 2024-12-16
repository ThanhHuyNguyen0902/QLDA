<?php
    include_once "cauhinh.php"; 

	$sql = "SELECT * FROM tbl_dondathang";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
?>


<h3>Danh sách Đơn Hàng</h3>
<table class="DanhSach">
    <tr>
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Mã Sản phẩm</th>
        <th>Số Lượng</th>
        <th>Đơn giá</th>
        <th>Hành động</th>  
    </tr>
    <?php
        $stt = 1;
        while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) {   
            echo "<tr>";
                echo "<td>" . $stt . "</td>";
                echo "<td>" . $dong['IdDonHang'] . "</td>";
                echo "<td>" . $dong['TenKhachHang'] . "</td>";
                echo "<td>" . $dong['SoDienThoai'] . "</td>";
                echo "<td>" . $dong['DiaChi'] . "</td>";
                echo "<td>" . $dong['IdSanPham'] . "</td>"; 

                echo "<td>" . $dong['SoLuong'] . "</td>";
                echo "<td>" . $dong['DonGia'] . "</td>";

                echo "<td align='center'>";
                if($dong['TrangThai'] == 0) {
                    echo "<a href='index.php?do=DonHang_Xuli&id=" . $dong['IdDonHang'] . "'><img src='images/nhandon.jpg' /></a>";
                    
                } else{
                    echo "<img src='images/hoanhthanh.jpg' />";
                }
                echo "</td>";
            echo "</tr>";
            $stt++;
        }
    ?>
</table>