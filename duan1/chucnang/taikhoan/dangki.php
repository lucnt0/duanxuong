<?php
ob_start();
$error = NULL;
if (isset($_POST['submit'])) {
    if ($_POST['tk'] == "" || $_POST['mk'] == "") {
        $error = "Vui lòng nhập đủ thông tin";
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
        $stmt = $conn->prepare("INSERT INTO thanhvien (email, mat_khau, quyen_truy_cap) VALUES (?, ?, 0)");
        $stmt->bind_param("ss", $tk, $mk);
        
        if ($stmt->execute()) {
            $error = 'Đăng ký thành công, vui lòng đăng nhập.';
        } else {
            $error = 'Đăng ký thất bại. Tài khoản có thể đã tồn tại.';
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
        <form method="post">
            <div id="form-login">
                <h2>Đăng kí tài khoản</h2>
                <center><span style="color:red;"><?php echo $error; ?></span></center>
                <ul>
                    <li><label>Tài khoản</label><input type="text" name="tk" /></li>
                    <li><label>Mật khẩu</label><input type="password" name="mk" /></li>
                    <li><label>Ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
                    <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
                    <li>Bạn đã có tài khoản? <a href="index.php?page_layout=dangnhap"><b>Đăng nhập</b></a></li>
                </ul>
            </div>
        </form>
</body>
</html>
