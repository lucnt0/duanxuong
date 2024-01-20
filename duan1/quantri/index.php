<?php
ob_start();
session_start();
include_once('ketnoi.php');

$error = NULL;
if (isset($_POST['submit'])) {
    if ($_POST['tk'] == "" || $_POST['mk'] == "") {
        $error = "Vui lòng nhập tài khoản và mật khẩu";
    } else {
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];

        // Kết nối cơ sở dữ liệu
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Sử dụng Prepared Statements để ngăn chặn SQL Injection
        $stmt = $conn->prepare("SELECT * FROM thanhvien WHERE email = ? AND mat_khau = ?");
        $stmt->bind_param("ss", $tk, $mk);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows <= 0) {
            $error = 'Tài khoản hoặc mật khẩu chưa đúng';
        } else {
            $user = $result->fetch_assoc();
        
            if ($user['quyen_truy_cap'] == 1) {
                // Người dùng có quyền truy cập
                $_SESSION['tk'] = $tk;
                $_SESSION['mk'] = $mk;
                header('location: quantri.php');
            } else {
                // Người dùng không có quyền truy cập
                $error = 'Bạn không có quyền truy cập';
            }
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css" />
</head>
<body>
    <?php
    if (!isset($_SESSION['tk'])) {
    ?>
        <form method="post">
            <div id="form-login">
                <h2>đăng nhập hệ thống quản trị</h2>
                <center><span style="color:red;"><?php echo $error; ?></span></center>
                <ul>
                    <li><label>tài khoản</label><input type="text" name="tk" /></li>
                    <li><label>mật khẩu</label><input type="password" name="mk" /></li>
                    <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
                    <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
                </ul>
            </div>
        </form>
    <?php
    } else {
        header('location: quantri.php');
    }
    ?>
</body>
</html>
