<?php
    session_start();
    include_once('ketnoi.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang quản trị - SÁCH HAY</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />
</head>
<body>
<div id="wrapper">
            <div id="user-info">
                <p>Xin chào <span><?php echo $_SESSION['tk'];?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
	<div id="header">
    	<div id="navbar">  
        	<ul>
            	<li id="admin-home"><a href="quantri.php">trang chủ</a></li>
                <li><a href="quantri.php?page_layout=thanhvien">Thanh viên</a></li>
                <li><a href="quantri.php?page_layout=donhang">Đơn hàng</a></li>
                <li><a href="quantri.php?page_layout=binhluan">Bình luận</a></li>
                <li><a href="quantri.php?page_layout=nhaxuatban">Nhà xuất bản</a></li>
                <li><a href="quantri.php?page_layout=danhmucsp">danh mục sản phẩm</a></li>
                <li><a href="quantri.php?page_layout=danhsachsp">sản phẩm</a></li>
                <li><a target="_blank" href="http://localhost/duan1/index.php">xem website</a></li>
            </ul>
        </div>
        <div id="banner">
        	<div id="logo"><a href="quantri.php">Sách hay</a></div>
        </div>
    </div>
    <div id="body">
       <?php
      if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
           case 'binhluan': include_once('binhluan.php');break;
           case 'danhmucsp': include_once('danhmucsp.php');break;
           case 'nhaxuatban': include_once('tacgia.php');break;
           case 'themtg': include_once('themtg.php');break;
           case 'suatg': include_once('suatg.php');break;
           case 'themdm': include_once('themdm.php');break;
           case 'themsp': include_once('themsp.php');break;
           case 'suasp': include_once('suasp.php');break;
           case 'themdm': include_once('themdm.php');break;
           case 'suadm': include_once('suadm.php');break;
           case 'danhsachsp': include_once('danhsachsp.php');break;
           case 'dotuoi': include_once('dotuoi.php');break;
           case 'themdotuoi': include_once('themdotuoi.php');break;
           case 'suadotuoi': include_once('suadotuoi.php');break;
           case 'thanhvien': include_once('thanhvien.php');break;

           default: include_once('gioithieu.php'); break;
        }
    }else{
        include_once('gioithieu.php');
    }
       ?>	
    </div>
    <div id="footer">
    	<div id="footer-info">
        <div id="footer-info">
        	<h4>Trang quản trị website Sách hay</h4>
            <p><span>Địa chỉ:</span> ... | <span>Phone</span> (04) 3537 6697</p>
            <p><span>Trụ sở 2:</span> ... | <span>Hotline</span> 0968 511 155</p>
            <p>Bản quyền thuộc PQM</p>
        </div>
        </div>
    </div>
</div>
</body>
</html>
