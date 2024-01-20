<?php
	session_start();
	include_once('ketnoi.php');
	if(isset($_SESSION['tk'])){
		$id_sp = $_GET['id_sp'];
		$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
		$sql = "DELETE FROM sanpham WHERE id_sp = $id_sp";
		$result = $conn->query($sql);
		header('location:quantri.php?page_layout=danhsachsp');
		if (isset($_GET['id_sp'])) {
			$id_sp = $_GET['id_sp'];
		
			// Kiểm tra xem người dùng đã xác nhận xóa chưa
			if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
				// Thực hiện xóa sản phẩm ở đây
				// ...
				// Sau khi xóa xong, bạn có thể chuyển họ trở lại trang danh sách sản phẩm hoặc thực hiện các thao tác khác
			} else {
				// Hiển thị hộp thoại xác nhận lần nữa nếu họ chưa xác nhận
				echo "Bạn có chắc chắn muốn xóa sản phẩm này?";
				echo "<br>";
				echo "<a href='xoasp.php?id_sp=$id_sp&confirm=yes'>Xác nhận</a> | <a href='danhmucsp.php'>Hủy bỏ</a>";
			}
		}		
	}else{
		header('location:index.php');
	}
	
?>