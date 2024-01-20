<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_POST['submit'])) {
    if (isset($_POST['ten_tg']) && $_POST['ten_tg'] == '') {
        $error_ten_tg = '<span style="color:red;">(*)<span>';
    } else {
        $ten_tg = $_POST['ten_tg'];
    }
    if(isset($ten_tg)){     
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $ten_tg = $conn->real_escape_string($ten_tg);
        $sql = "INSERT INTO tacgia (ten_tg) VALUES ('$ten_tg')";

            if ($conn->query($sql) === TRUE) {
                header('location:quantri.php?page_layout=nhaxuatban');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm tác giả mới</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data"> 
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên Tác giả</label><br /><input type="text" name="ten_tg" /><?php if (isset($error_ten_tg)) {
                                                                                                echo $error_ten_tg;
                                                                                            } ?></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>
