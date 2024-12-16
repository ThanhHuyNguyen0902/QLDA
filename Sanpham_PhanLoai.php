<?php
    $phan_loai = $_GET['phan_loai'];



    $sql = "select * from tbl_sanpham where PhanLoai like '%$phan_loai%'";


    $danhsach = $connect->query($sql);
    //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
    if (!$danhsach) {
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
        exit();
    }
    // Đếm số dòng trả về trong sql.
    $num = mysqli_num_rows($danhsach);

    // Nếu $search rỗng thì báo lỗi tức là người dùng chưa
    //nhập liệu mà đã nhấn submit.
    if (empty($phan_loai)) {
        echo "Hãy nhập dữ liệu vào ô tìm kiếm";
    } else {
        // Ngược lại nếu người dùng nhập liệu thì tiến hành xứ lý show dữ liệu.
        // Nếu $num > 0 hoặc $search khác rỗng tức 
        //là có dữ liệu mối show ra nhé, ngược lại thì báo lỗi.
        if ($num > 0 && $phan_loai != "") {

            // Dùng $num để đếm số dòng trả về.
  
            // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ 
            //dữ liệu có trong table và trả về dữ liệu ở dạng array.
            
            while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
            {				
                $giaban = $row['DonGia'] - (($row['TiLeGiamGia'] /100) * $row['DonGia']);
                echo "<div class='khungsanpham'>";
                    echo "<div class='card'>";					
                        echo "<a href='index.php?do=sanpham_chitiet&id_sp=" . $row['IdSanPham'] . "&id_nsx=" . $row['IdNhaSanXuat'] . "'>";
                            echo "<img class='hinhanhphim' src=" . $row["HinhAnh"] . "  style='width: 190px; height: 140px;'>";
                            echo "<span class='tenphim' ></span> <br />";
                        echo "</a>";
                        echo "<span class=\"giaban\">". number_format($giaban)." đ </span>";
                        echo "<span class=\"luotxem\"></span><span class=\"dongia\">". number_format($row['DonGia'])." đ</span>";
    
                        echo "<form action='index.php?do=GioHang' method='post'>";
                        echo "<span class=\"luotxem\">". $row['LuotXem'] ." lượt xem </span>";
                        echo "<input type='hidden' name='id_sp' value='" . $row['IdSanPham'] . "'>";
                        echo "<input type='submit' name='addGioHang' value='Thêm vào giỏ'>";
                        echo "<input type='hidden' name='tensp' value='" . $row['TenSanPham'] . "'>";
                        echo "<input type='hidden' name='gia' value='" . $giaban . "'>";
                        echo "<input type='hidden' name='soluong' value='" . $row['SoLuong'] . "'>";
                        echo "<input type='hidden' name='hinhanh' value='" . $row['HinhAnh'] . "'>";
                        echo"</form>";
                    
    
                    echo "</div>";
                    echo "<p><a  href='index.php?do=sanpham_chitiet&id_sp=" . $row['IdSanPham'] . "&id_nsx=" . $row['IdNhaSanXuat'] . "'>" . $row['TenSanPham'] . "</a></p>";
                echo "</div>";
    
                
            }

        } else 
            echo "Không tìm thấy kết quả!";
        }
    
?>