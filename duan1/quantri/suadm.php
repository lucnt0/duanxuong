<?php
include_once('ketnoi.php');
$error = NULL;

if (isset($_GET['id_dm'])) {
    $id_dm = $_GET['id_dm'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM dmsanpham WHERE id_dm = $id_dm";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        $category = $query->fetch_assoc();
        $ten_dm = $category['ten_dm'];
        $tinh_trang = $category['tinh_trang'];
    } else {
        echo "Danh mục không tồn tại.";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $ten_dm = $_POST['ten_dm'];
    $tinh_trang = $_POST['tinh_trang'];

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý cập nhật ảnh sản phẩm nếu có
    if ($_FILES['anh_dm']['error'] === 0) {
        $uploadDir = 'anh/';
        $uniqueName = uniqid() . '_' . $_FILES['anh_dm']['name'];
        $uploadFile = $uploadDir . $uniqueName;
        if (move_uploaded_file($_FILES['anh_dm']['tmp_name'], $uploadFile)) {
            // Cập nhật ảnh sản phẩm trong cơ sở dữ liệu
            $sqlUpdateImage = "UPDATE dmsanpham SET anh_dm = '$uniqueName' WHERE id_dm = $id_dm";
            mysqli_query($conn, $sqlUpdateImage);
        } else {
            $error = "Có lỗi xảy ra khi tải lên ảnh sản phẩm.";
        }
    }

    $ten_dm = $conn->real_escape_string($ten_dm);
    $sqlUpdate = "UPDATE dmsanpham SET ten_dm = '$ten_dm', tinh_trang = '$tinh_trang' WHERE id_dm = $id_dm";

    if ($conn->query($sqlUpdate)) {
        header("Location: quantri.php?page_layout=danhmucsp");
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
                <input type="text" name="ten_dm" value="<?php echo $ten_dm; ?>" /></td>
            </tr>
            <tr>
                <td><label>Tình trạng</label><br />
                <input type="text" name="tinh_trang" value="<?php echo $tinh_trang; ?>" /></td>
            </tr>
            <tr>
                <td>
                    <label>Ảnh danh mục</label><br/>
                    <img src="anh/<?php echo $product['anh_dm']; ?>" alt="" width="150" height="150">
                    <input type="file" name="anh_dm"/>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name "reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>