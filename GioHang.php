<?php
    if(!isset($_SESSION)) {
        session_start();
    } 

    include_once "cauhinh.php";
    include_once "thuvien.php";

	// tạo mảng giỏ hàng mới
	if(!isset($_SESSION['giohang']))
	{
		$_SESSION['giohang'] = [];
	}

    // Nếu người dùng nhấn nút "Thêm vào giỏ hàng"
    if(isset($_POST['addGioHang']) && ($_POST['addGioHang'])) {
        $Idsp = $_POST['id_sp'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $soluong = 1;
        $hinhanh = $_POST['hinhanh'];

		$sp = [$Idsp, $tensp, $gia, $soluong, $hinhanh];
		
        $fl = 0; 
		foreach($_SESSION['giohang'] as $key => $item) {
			if($item[0] == $Idsp) { 
				$fl = 1;
				$soluongnew = $item[3] + $soluong; 
				$_SESSION['giohang'][$key][3] = $soluongnew; 
				break; 
			}
		}

        if($fl == 0) {
			array_push($_SESSION['giohang'],$sp);
        }
    }
?>

<table border="1" cellspacing="0" width="750" align="center" valign="top">
	<?php
		$stt = 1;
		// Kiểm tra nếu có sản phẩm trong giỏ hàng
		if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
			foreach ($_SESSION['giohang'] as $card) {
				echo "<tr>";
				echo "<td>" . $stt . "</td>";
				echo "<td>" . $card[1] . "</td>"; // Tên sản phẩm
				echo "<td>" . $card[2] . "</td>"; // Đơn giá
				echo "<td>" . $card[3] . "</td>"; // Số lượng
				echo "<td><img src='" . $card[4] . "' width='100' /></td>"; // Hình ảnh
				echo "<td align='center'><a href='GioHang_xoa.php?id=" . $card[0] . "'>Xóa</a></td>"; // Hành động xóa
				echo "</tr>";
				$stt++;

			}
		} else {
			echo "<tr><td colspan='6'>Không có sản phẩm trong giỏ hàng.</td></tr>";
		}
	?>
</table>

<form action="index.php?do=GioHang_Dat" method="post">
	<table class="Form">
		<tr>
			<td>Họ và Tên</td>
			<td><input type="text" name="HovatenKhach" /></td>
		</tr>
		<tr>
			<td>Số điện thoại</td>
			<td><input type="text" name="sdt" /></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input type="text" name="address"></td>
		</tr>
	</table>
	
	<input type="submit" name="ChapNhan" value="Chấp nhận đặt hàng" />
</form>
 