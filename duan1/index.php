<?php
    ob_start();
    session_start();
    include_once('cauhinh/ketnoi.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Sách hay</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <script src="https://kit.fontawesome.com/c9f5871d83.js"  crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php 
        include_once('chucnang/header/Topbar.php');
            include_once('chucnang/header/Navbar.php');
    ?>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'danhsachsp':include_once('chucnang/sanpham/danhsachsp.php');break;
                case 'CuaHang':include_once('chucnang/sanpham/shop.php');break;
                case 'lienhe':include_once('chucnang/main/lienhe.php');break;
                case 'giohang':include_once('chucnang/giohang/giohang.php');break;
                case 'muahang':include_once('chucnang/giohang/muahang.php');break;
                case 'kiemtra':include_once('chucnang/giohang/kiemtra.php');break;
                case 'dangnhap':include_once('chucnang/taikhoan/dangnhap.php');break;
                case 'dangki':include_once('chucnang/taikhoan/dangki.php');break;
                case 'chitietsp':include_once('chucnang/sanpham/chitietsp.php');break;
                case 'danhsachtimkiem':include_once('chucnang/timkiem/danhsachtimkiem.php');break;
                case 'taikhoan':include_once('chucnang/taikhoan/taikhoan.php');break;
                case 'dangxuat':include_once('chucnang/taikhoan/dangxuat.php');break;
                
                default:
            }
        }else{
                include_once('chucnang/header/Carousel.php');
                include_once('chucnang/header/Featured.php');
                include_once('chucnang/header/Categories.php');
                include_once('chucnang/sanpham/Products-phobien.php');
                include_once('chucnang/header/Offer.php');
                include_once('chucnang/sanpham/Products-new.php');
                include_once('chucnang/footer/Vendor.php');
                include_once('chucnang/footer/Footer.php');
        }
    ?>
    <?php
        include_once('chucnang/footer/Footer.php');
    ?>
           <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>