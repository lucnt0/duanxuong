<?php
    session_start();
    // Kiểm tra xem id_sp có tồn tại và là số nguyên hợp lệ không
    if(isset($_GET['id_sp']) && is_numeric($_GET['id_sp'])) {
        $id_sp = $_GET['id_sp'];
        
        // Thêm sản phẩm vào giỏ hàng
        if(isset($_SESSION['giohang'][$id_sp])){
            $_SESSION['giohang'][$id_sp] += 1;
        } else {
            $_SESSION['giohang'][$id_sp] = 1;
        }
        
        // Điều hướng người dùng đến trang giỏ hàng
        header('location:../../index.php?page_layout=giohang');
    } else {
        // Xử lý lỗi nếu id_sp không hợp lệ
        echo "Sản phẩm không tồn tại hoặc không hợp lệ.";
    }
?>
