<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_GET['id_dotuoi'])) {
    $id_dotuoi = $_GET['id_dotuoi'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM dotuoi WHERE id_dotuoi = $id_dotuoi";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        $category = $query->fetch_assoc();
        $do_tuoi = $category['do_tuoi']; // Lấy tên danh mục từ cơ sở dữ liệu
    } else {
        echo "Danh mục không tồn tại.";
        exit;
    }
    $conn->close();
}
if (isset($_POST['submit'])) {
    $do_tuoi = $_POST['do_tuoi'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $do_tuoi = $conn->real_escape_string($do_tuoi);
    $sqlUpdate = "UPDATE dotuoi SET do_tuoi = '$do_tuoi' WHERE id_dotuoi = $id_dotuoi";
    if ($conn->query($sqlUpdate)) {
        header("Location: quantri.php?page_layout=dotuoi");
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
                <input type="text" name="do_tuoi" value="<?php echo $do_tuoi; ?>" /></td>
            </tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name "reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>