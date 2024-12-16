<?php 
session_start();
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");
require("../model/giohang.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$mh = new MATHANG();
$mathangxemnhieu = $mh->laymathangxemnhieu();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null": 	
    	$mathang = $mh->laymathang();	
        include("main.php");
        break;
    case "group": 
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "detail": 
        if(isset($_GET["id"])){
            $mahang = $_GET["id"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;
	case "chovaogio":    
        if(isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if(isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = 1;

        if(isset($_SESSION['giohang'][$id])){ // nếu đã có trong giỏ thi tăng số lượng
            $soluong += $_SESSION['giohang'][$id];
            $_SESSION['giohang'][$id] = $soluong;
        }
        else{       // nếu chưa thì thêm vào giỏ
            themhangvaogio($id, $soluong);
        }

        //themhangvaogio($_REQUEST["id"], $soluong);

        $giohang = laygiohang();   
        include("cart.php");
        break;
    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
    case "capnhatgio":
        if(isset($_REQUEST["mh"])){
            $mh = $_REQUEST["mh"];
            foreach($mh as $id => $soluong) {
                if($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
    case "luudonhang":  
        $diachi = $_POST["txtdiachi"]; 
        if(!isset($_SESSION["khachhang"])){ 
            $email = $_POST["txtemail"]; 
            $hoten = $_POST["txthoten"]; 
            $sodienthoai = $_POST["txtsodienthoai"]; 
             
            // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa) 
            // xử lý thêm... 
            $kh = new KHACHHANG(); 
            $khachhang_id = $kh->themkhachhang($email,$sodienthoai,$hoten); 
             
             
        } 
        else{ 
            $khachhang_id = $_SESSION["khachhang"]["id"]; 
             
            //$dc = new DIACHI(); 
            //$diachi = $dc->laydiachikhachhang($khachhang_id);             
            //$diachi_id = $diachi["id"]; 
        } 
        // lưu địa chỉ giao hàng // cần xử lý địa chỉ cho 2 trường hợp if... else bên trên 
            $dc = new DIACHI(); 
            $diachi_id = $dc->themdiachi($khachhang_id,$diachi); 
 
        // lưu đơn hàng 
        $dh = new DONHANG(); 
        $tongtien = tinhtiengiohang(); 
        $donhang_id = $dh->themdonhang($khachhang_id,$diachi_id,$tongtien); 
         
        // lưu chi tiết đơn hàng 
        $ct = new DONHANGCT();       
        $giohang = laygiohang(); 
        foreach($giohang as $id => $mh){ 
            $dongia = $mh["giaban"]; 
            $soluong = $mh["soluong"]; 
            $thanhtien = $mh["thanhtien"]; 
            $ct->themchitietdonhang($donhang_id,$id,$dongia,$soluong,$thanhtien); 
            $mh = new MATHANG(); 
            $mh->capnhatsoluong($id, $soluong); 
        } 
        // xóa giỏ hàng 
        xoagiohang(); 
        // chuyển đến trang cảm ơn 
        include("message.php"); 
        break;
    default:
        break;
}
?>
