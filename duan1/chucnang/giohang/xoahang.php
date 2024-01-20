<?php
	session_start();
	$id_sp = $_GET['id_sp'];
	if (isset($_SESSION['giohang'])) {
		if ($id_sp == 0) {
			unset($_SESSION['giohang']);
		} else {
			unset($_SESSION['giohang'][$id_sp]);
		}
	
		// Kiểm tra nếu không còn sản phẩm trong giỏ hàng -> Xóa giỏ hàng
		if (count($_SESSION['giohang']) == 0) {
			unset($_SESSION['giohang']);
		}
	}
	header('location:../../index.php?page_layout=giohang');
?>