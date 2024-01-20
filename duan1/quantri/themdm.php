<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_POST['submit'])) {
    if (isset($_POST['ten_dm']) && $_POST['ten_dm'] == '') {
        $error_ten_dm = '<span style="color:red;">(*)<span>';
    } else {
        $ten_dm = $_POST['ten_dm'];
    }
    if (isset($_POST['tinh_trang']) && $_POST['tinh_trang'] == '') {
        $error_tinh_trang = '<span style="color:red;">(*)<span>';
    } else {
        $tinh_trang = $_POST['tinh_trang'];
    }
    // Ảnh mô tả Sản phẩm
    if ($_FILES['anh_dm']['name'] != '') {
        $anh_dm = time() . '_' . $_FILES['anh_dm']['name'];
        $tmp = $_FILES['anh_dm']['tmp_name'];
    }
    
    if(isset($ten_dm) && isset($tinh_trang) && isset($anh_dm)){ 
        // Đường dẫn lưu trữ ảnh
        $upload_dir = 'anh/';

        // Di chuyển và lưu trữ các tệp ảnh
        if (!empty($anh_dm)) {
            move_uploaded_file($tmp, $upload_dir . $anh_dm);
        }  
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $ten_dm = $conn->real_escape_string($ten_dm);
        $sql = "INSERT INTO dmsanpham (ten_dm, tinh_trang, anh_dm) VALUES ('$ten_dm', '$tinh_trang', '$anh_dm')";

            if ($conn->query($sql) === TRUE) {
                header('location:quantri.php?page_layout=danhmucsp');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>thêm danh mục mới</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data"> 
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" /><?php if (isset($error_ten_dm)) {
                                                                                                echo $error_ten_dm;
                                                                                            } ?></td>
            </tr>
            <tr>
                <td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="Còn hàng" /><?php if (isset($error_tinh_trang)) {
                                                                                                echo $error_tinh_trang;
                                                                                            } ?></td>
            </tr>
            <tr>
                <td><label>Ảnh danh mục</label><br /><input type="file" name="anh_dm" /><?php if (isset($anh_dm)) {
                                                                                                echo $anh_dm;
                                                                                            } ?></td>
            </tr>s
            <tr>
                <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>
