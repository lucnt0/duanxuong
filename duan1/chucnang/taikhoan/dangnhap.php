<?php
// Initialize $error_login
$error_login = NULL;

// Chức năng đăng nhập
if (isset($_POST['login'])) {
    $tk_login = $_POST['tk_login'];
    $mk_login = $_POST['mk_login'];

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $stmt_login = $conn->prepare("SELECT * FROM thanhvien WHERE email = ? AND mat_khau = ?");
    $stmt_login->bind_param("ss", $tk_login, $mk_login);
    $stmt_login->execute();
    $result_login = $stmt_login->get_result();

    if ($result_login->num_rows > 0) {
        $user = $result_login->fetch_assoc();
        $_SESSION['tk'] = $tk_login;
        $_SESSION['mk'] = $mk_login;
        $_SESSION['quyen_truy_cap'] = $user['quyen_truy_cap'];
    
        header('location: index.php?page_layout=taikhoan');
        exit();
    } else {
        $error_login = 'Tài khoản hoặc mật khẩu chưa đúng';
    }

    $stmt_login->close();
    $conn->close();
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
            <h2>Đăng nhập tài khoản</h2>
            <center><span style="color:red;"><?php echo $error_login; ?></span></center>
            <ul>
                <li><label>Tài khoản</label><input type="text" name="tk_login" /></li>
                <li><label>Mật khẩu</label><input type="password" name="mk_login" /></li>
                <li><label>Ghi nhớ</label><input type="checkbox" name="check_login" checked="checked" /></li>
                <li><input type="submit" name="login" value="Đăng nhập" /> <input type="reset" name="reset_login" value="Làm mới" /></li>
                <li>Bạn mới biết đến Sách Hay và chưa có tài khoản? <a href="index.php?page_layout=dangki"><b>Đăng kí</b></a></li>
            </ul>
        </div>
    </form>
</body>
</html>
