<?php
session_start();
include_once('ketnoi.php');
if(isset($_SESSION['tk'])){
    if (isset($_GET['id_dotuoi'])) {
        $id_dotuoi = $_GET['id_dotuoi'];
        
        // Kiểm tra xem người dùng đã xác nhận xóa chưa
        if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
            // Thực hiện xóa danh mục sản phẩm ở đây
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $sql = "DELETE FROM dotuoi WHERE id_dotuoi = $id_dotuoi";
            $result = $conn->query($sql);

            // Sau khi xóa xong, bạn có thể chuyển họ trở lại trang danh sách sản phẩm hoặc thực hiện các thao tác khác
            header('location:quantri.php?page_layout=dotuoi');
        } else {
            // Hiển thị hộp thoại xác nhận lần nữa nếu họ chưa xác nhận
            echo "<span>Bạn có chắc chắn muốn xóa danh mục sản phẩm này?</span>";
            echo "<br>";
            echo "<a href='xoadm.php?id_dotuoi=$id_dotuoi&confirm=yes'>Xác nhận</a> | <a href='danhmucsp.php'>Hủy bỏ</a>";
        }
    }    
}else{
    header('location:quantri.php?page_layout=dotuoi');
}
?>
