-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2024 lúc 06:48 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopgiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dondathang`
--

CREATE TABLE `tbl_dondathang` (
  `IdDonHang` int(10) NOT NULL,
  `IdSanPham` int(10) NOT NULL,
  `TenSanPham` varchar(250) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `DiaChi` varchar(250) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(20) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dondathang`
--

INSERT INTO `tbl_dondathang` (`IdDonHang`, `IdSanPham`, `TenSanPham`, `TenKhachHang`, `SoDienThoai`, `DiaChi`, `SoLuong`, `DonGia`, `TrangThai`) VALUES
(14, 46, 'SUPERSTAR ADIDAS ORIGINALS X HELLO KITTY AND FRIENDS (Trẻ em)', 'Vu truong', '01254', 'seo trom', 1, 1862000, 1),
(15, 50, 'Giày Thời Trang Unisex Converse Chuck 70 Vintage Canvas - Đen', 'Vu truong', '01254', 'seo trom', 1, 980000, 1),
(16, 52, 'Giày Thời Trang Unisex Converse Chuck Taylor All Star - Trắng', 'Vu truong', '01254', 'seo trom', 1, 1015000, 1),
(17, 59, 'Giày Sneaker Unisex Fila Targa Classic X Dragon - Trắng', 'Nguyễn Hải Hà', '0979613905', '192/9 , Trần Hưng Đạo , Mỹ Bình .', 2, 2200000, 0),
(18, 53, 'Giày Thời Trang Nam Converse Chuck Taylor All Star Cx Explore - Xanh Navy', 'Nguyễn Hải Hà', '0979613905', '192/9 , Trần Hưng Đạo , Mỹ Bình .', 3, 1820000, 0),
(19, 60, 'Giày Leo Núi Nam Columbia Plateau™ Waterproof - Đen', 'Nguyễn Hải Hà', '0979613905', '192/9 , Trần Hưng Đạo , Mỹ Bình .', 1, 1499500, 0),
(20, 59, 'Giày Sneaker Unisex Fila Targa Classic X Dragon - Trắng', 'Lê Trường Vũ ', '08751264888', '6 Hà Hoàng Hổ , Long Xuyên , An Giang', 2, 2200000, 0),
(21, 58, 'Giày Thời Trang Trẻ Em Converse Chuck Taylor All Star 1V - Hồng', 'Lê Trường Vũ ', '08751264888', '6 Hà Hoàng Hổ , Long Xuyên , An Giang', 1, 980000, 0),
(22, 60, 'Giày Leo Núi Nam Columbia Plateau™ Waterproof - Đen', 'Lê Trường Vũ ', '08751264888', '6 Hà Hoàng Hổ , Long Xuyên , An Giang', 1, 1499500, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

CREATE TABLE `tbl_nguoidung` (
  `MaNguoiDung` int(10) NOT NULL,
  `TenNguoiDung` varchar(50) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `QuyenHan` tinyint(1) NOT NULL,
  `Khoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`MaNguoiDung`, `TenNguoiDung`, `TenDangNhap`, `MatKhau`, `QuyenHan`, `Khoa`) VALUES
(1, 'Trần Văn A', 'tva', 'e10adc3949ba59abbe56e057f20f883e', 2, 0),
(2, 'Nguyễn Văn Hùng', 'nvhung', 'e10adc3949ba59abbe56e057f20f883e 	', 2, 0),
(3, 'Nguễn Thị D', 'ntd', 'e10adc3949ba59abbe56e057f20f883e', 2, 0),
(4, 'Lê Trường Vũ', 'LTV001', 'e10adc3949ba59abbe56e057f20f883e', 2, 0),
(5, 'Võ Dương Thanh Lâm', 'admin', '4531e8924edde928f341f7df3ab36c70', 1, 0),
(7, 'QUẢN TRỊ VIÊN', 'lam123', '740273e48aa999a020df445d4e429517', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhasanxuat`
--

CREATE TABLE `tbl_nhasanxuat` (
  `IdNhaSanXuat` int(20) NOT NULL,
  `TenNhaSanXuat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhasanxuat`
--

INSERT INTO `tbl_nhasanxuat` (`IdNhaSanXuat`, `TenNhaSanXuat`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(7, 'Converse'),
(8, 'Fila'),
(9, 'Columbia'),
(10, 'Dép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `IdSanPham` int(10) NOT NULL,
  `MaSanPham` varchar(20) NOT NULL,
  `TenSanPham` varchar(200) NOT NULL,
  `IdNhaSanXuat` int(20) NOT NULL,
  `HinhAnh` varchar(200) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `PhanLoai` varchar(250) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `TiLeGiamGia` int(4) NOT NULL,
  `MoTa` varchar(300) NOT NULL,
  `LuotXem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`IdSanPham`, `MaSanPham`, `TenSanPham`, `IdNhaSanXuat`, `HinhAnh`, `DonGia`, `PhanLoai`, `SoLuong`, `TiLeGiamGia`, `MoTa`, `LuotXem`) VALUES
(46, 'Adidas1', 'SUPERSTAR ADIDAS ORIGINALS X HELLO KITTY AND FRIENDS (Trẻ em)', 1, 'images/Adidas1.jpg', 1900000, 'Trẻ em', 19, 2, '<p>Đ&Ocirc;I GI&Agrave;Y TƯƠI VUI C&Oacute; SỬ DỤNG CHẤT LIỆU T&Aacute;I CHẾ.</p>\r\n', 18),
(48, 'Adidas3', 'GIÀY ĐÁ BÓNG TURF PREDATOR 24 LEAGUE', 1, 'images/Adidas3.jpg', 2400000, 'Bóng đá', 20, 5, '<h3>CHINH PHỤC MỤC TI&Ecirc;U VỚI Đ&Ocirc;I GI&Agrave;Y Đ&Aacute; B&Oacute;NG D&Agrave;NH CHO S&Acirc;N CỎ NH&Acirc;N TẠO, C&Oacute; SỬ DỤNG CHẤT LIỆU T&Aacute;I CHẾ.</h3>\r\n', 3),
(49, 'Adidas4', 'GIÀY ĐÁ BÓNG TURF KHÔNG DÂY X CRAZYFAST LEAGUE', 1, 'images/Adidas4.jpg', 2400000, 'Bóng đá', 20, 5, '<h3>Đ&Ocirc;I GI&Agrave;Y Đ&Aacute; B&Oacute;NG SI&Ecirc;U NHẸ GI&Uacute;P BẠN BỨT TỐC THẦN SẦU, C&Oacute; SỬ DỤNG CHẤT LIỆU T&Aacute;I CHẾ.</h3>\r\n', 3),
(50, 'Converse1', 'Giày Thời Trang Unisex Converse Chuck 70 Vintage Canvas - Đen', 7, 'images/converse.webp', 1400000, 'Cổ cao', 29, 30, '<h4><strong>&nbsp;Một biểu tượng phong c&aacute;ch n&acirc;ng cao, sản phẩm trang bị th&ecirc;m đệm để giữ cho đ&ocirc;i ch&acirc;n của bạn tr&ocirc;ng - v&agrave; cảm gi&aacute;c - tốt cả ng&agrave;y.</strong></h4>\r\n', 4),
(51, 'Converse2', 'Giày Thời Trang Unisex Converse Chuck Taylor All Star - Đen', 7, 'images/converse2.jpg', 1450000, 'Cổ ngắn', 30, 30, '<p>Ra mắt lần đầu năm 1917 với tư c&aacute;ch l&agrave; một đ&ocirc;i gi&agrave;y b&oacute;ng rổ, gi&agrave;y Converse All Star ban đầu được bậc thầy b&oacute;ng rổ Chuck Taylor quảng b&aacute; cho sự linh hoạt v&agrave; lợi &iacute;ch tr&ecirc;n s&acirc;n b&oacute;ng.</p>\r\n', 7),
(52, 'Converse3', 'Giày Thời Trang Unisex Converse Chuck Taylor All Star - Trắng', 7, 'images/converse3.jpg', 1450000, 'Cổ ngắn', 19, 30, '<p><strong>Đ&ocirc;i gi&agrave;y thể thao với kiểu d&aacute;ng mang phong c&aacute;ch vượt thời gian v&agrave; logo đặc trưng ở mắt c&aacute; nổi tiếng y&ecirc;u th&iacute;ch v&agrave; mang biểu diễn tạo n&ecirc;n cơn sốt tr&ecirc;n to&agrave;n cầu.</strong></p>\r\n', 2),
(53, 'Converse4', 'Giày Thời Trang Nam Converse Chuck Taylor All Star Cx Explore - Xanh Navy', 7, 'images/converse4.jpg', 2600000, 'Cổ cao', 19, 30, '<p><strong>M&agrave;u sắc thể thao nổi bật kết hợp với thiết kế thoải m&aacute;i mang đến cho bạn sự hỗ trợ cả ng&agrave;y. Tận hưởng phong c&aacute;ch cổ điển trong khi vẫn thoải m&aacute;i để ho&agrave;n th&agrave;nh cuộc chơi của bạn.</strong></p>\r\n', 2),
(58, 'Converse5', 'Giày Thời Trang Trẻ Em Converse Chuck Taylor All Star 1V - Hồng', 7, 'images/converse5.jpg', 1400000, 'Trẻ em,Nữ,Cổ cao', 20, 30, '<p><strong>Được thu nhỏ lại về k&iacute;ch thước cho thế hệ tiếp theo, Converse Chuck Taylor All Star n&agrave;y vẫn giữ lại trọn vẹn kiểu d&aacute;ng nguy&ecirc;n bản mang t&iacute;nh biểu tượng với c&aacute;c chi tiết cổ điển tr&ecirc;n lớp vải thoải m&aacute;i.</strong></p>\r\n', 4),
(59, 'Fila1', 'Giày Sneaker Unisex Fila Targa Classic X Dragon - Trắng', 8, 'images/Fila1.jpg', 2200000, 'Nam/Nữ,Sneaker,Thời trang', 20, 0, '<p><strong>&nbsp;Chất liệu cao cấp đảm bảo thoải m&aacute;i v&agrave; bền bỉ. Chi tiết rồng độc đ&aacute;o l&agrave; điểm nhấn nổi bật chắc chắn sẽ biến bạn trở th&agrave;nh t&acirc;m điểm của đ&aacute;m đ&ocirc;ng.</strong></p>\r\n', 12),
(60, 'Columbia1', 'Giày Leo Núi Nam Columbia Plateau™ Waterproof - Đen', 9, 'images/Columbia1.jpg', 2999000, 'Nam,Leo núi', 100, 50, '<p><strong>Đ&ocirc;i gi&agrave;y sỏ hữu cấu tr&uacute;c phần tr&ecirc;n (upper) kh&ocirc;ng thấm nước, tho&aacute;ng kh&iacute; kết hợp với lớp đệm đế giữa ti&ecirc;n tiến v&agrave; lực k&eacute;o của đế ngo&agrave;i c&oacute; độ b&aacute;m cao để mang lại cảm gi&aacute;c thoải .</strong></p>\r\n', 12),
(61, 'Dp001', 'Dép HM Nam - Dép Quai Ngang Hermes quai da', 10, 'images/dep01.jpg', 100000, 'Dép', 20, 5, '<p>D&eacute;p HM Nam - D&eacute;p Quai Ngang Hermes quai da</p>\r\n\r\n<p>H&agrave;ng b&ecirc;n m&igrave;nh l&agrave; h&agrave;ng sẵn full size , c&aacute;c bạn c&oacute; thể cập nhật ở b&ecirc;n tr&ecirc;n m&igrave;nh c&oacute; up đ&oacute; - Shop m&igrave;nh nhập h&agrave;ng tận xưởng n&ecirc;n gi&aac', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  ADD PRIMARY KEY (`IdDonHang`);

--
-- Chỉ mục cho bảng `tbl_nhasanxuat`
--
ALTER TABLE `tbl_nhasanxuat`
  ADD PRIMARY KEY (`IdNhaSanXuat`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`IdSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  MODIFY `IdDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_nhasanxuat`
--
ALTER TABLE `tbl_nhasanxuat`
  MODIFY `IdNhaSanXuat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `IdSanPham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
