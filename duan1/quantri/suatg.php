<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_GET['id_tg'])) {
    $id_tg = $_GET['id_tg'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM tacgia WHERE id_tg = $id_tg";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        $category = $query->fetch_assoc();
        $ten_tg = $category['ten_tg']; // Lấy tên danh mục từ cơ sở dữ liệu
    } else {
        echo "Danh mục không tồn tại.";
        exit;
    }
    $conn->close();
}
if (isset($_POST['submit'])) {
    $ten_tg = $_POST['ten_tg'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $ten_tg = $conn->real_escape_string($ten_tg);
    $sqlUpdate = "UPDATE tacgia SET ten_tg = '$ten_tg' WHERE id_tg = $id_tg";
    if ($conn->query($sqlUpdate)) {
        header("Location: quantri.php?page_layout=nhaxuatban");
        exit;
    } else {
        $error = "Có lỗi xảy ra khi cập nhật danh mục: " . $conn->error;
    }
    $conn->close();
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Cập nhật danh mục</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data"> 
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên Danh mục</label><br />
                <input type="text" name="ten_tg" value="<?php echo $ten_tg; ?>" /></td>
            </tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name "reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>