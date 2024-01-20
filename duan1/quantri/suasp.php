<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_GET['id_sp'])) {
    $id_sp = $_GET['id_sp'];
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
    $query = $conn->query($sql);
    $product = $query->fetch_assoc();
    $conn->close();
}
if (isset($_POST['submit'])) {
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $ten_sp = $_POST['ten_sp'];
    $gia_sp = $_POST['gia_sp'];
    $khuyen_mai = $_POST['khuyen_mai'];
    $chi_tiet_sp = $_POST['chi_tiet_sp'];
    $dac_biet = isset($_POST['dac_biet']) ? $_POST['dac_biet'] : 0;
    $id_dm = $_POST['id_dm']; // Lấy ID của danh mục sản phẩm
    $id_tg = $_POST['id_tg']; // Lấy ID của danh mục sản phẩm

    // Xử lý cập nhật ảnh sản phẩm nếu có
    if ($_FILES['anh_sp']['error'] === 0) {
        $uploadDir = 'anh/';
        $uniqueName = uniqid() . '_' . $_FILES['anh_sp']['name'];
        $uploadFile = $uploadDir . $uniqueName;
        if (move_uploaded_file($_FILES['anh_sp']['tmp_name'], $uploadFile)) {
            // Cập nhật ảnh sản phẩm trong cơ sở dữ liệu
            $sqlUpdateImage = "UPDATE sanpham SET anh_sp = '$uniqueName' WHERE id_sp = $id_sp";
            mysqli_query($conn, $sqlUpdateImage);
        } else {
            $error = "Có lỗi xảy ra khi tải lên ảnh sản phẩm.";
        }
    }
    // Xử lý cập nhật ảnh mô tả số 1 nếu có
    if ($_FILES['anh_sp_min_1']['error'] === 0) {
        $uploadDirMin1 = 'anh/';
        $uniqueNameMin1 = uniqid() . '_' . $_FILES['anh_sp_min_1']['name'];
        $uploadFileMin1 = $uploadDirMin1 . $uniqueNameMin1;
        if (move_uploaded_file($_FILES['anh_sp_min_1']['tmp_name'], $uploadFileMin1)) {
            // Cập nhật ảnh mô tả số 1 trong cơ sở dữ liệu
            $sqlUpdateImageMin1 = "UPDATE sanpham SET anh_sp_min_1 = '$uniqueNameMin1' WHERE id_sp = $id_sp";
            mysqli_query($conn, $sqlUpdateImageMin1);
        } else {
            $error = "Có lỗi xảy ra khi tải lên ảnh mô tả số 1.";
        }
    }

    // Xử lý cập nhật ảnh mô tả số 2 nếu có
    if ($_FILES['anh_sp_min_2']['error'] === 0) {
        $uploadDirMin2 = 'anh/';
        $uniqueNameMin2 = uniqid() . '_' . $_FILES['anh_sp_min_2']['name'];
        $uploadFileMin2 = $uploadDirMin2 . $uniqueNameMin2;
        if (move_uploaded_file($_FILES['anh_sp_min_2']['tmp_name'], $uploadFileMin2)) {
            // Cập nhật ảnh mô tả số 2 trong cơ sở dữ liệu
            $sqlUpdateImageMin2 = "UPDATE sanpham SET anh_sp_min_2 = '$uniqueNameMin2' WHERE id_sp = $id_sp";
            mysqli_query($conn, $sqlUpdateImageMin2);
        } else {
            $error = "Có lỗi xảy ra khi tải lên ảnh mô tả số 2.";
        }
    }

    // Sử dụng prepared statement để cập nhật thông tin sản phẩm
    $sqlUpdate = "UPDATE sanpham SET
        ten_sp = '$ten_sp',
        gia_sp = '$gia_sp',
        khuyen_mai = '$khuyen_mai',
        chi_tiet_sp = '$chi_tiet_sp',
        dac_biet = $dac_biet,
        id_dm = $id_dm,
        id_tg = $id_tg
        WHERE id_sp = $id_sp";

    if (mysqli_query($conn, $sqlUpdate)) {
        header("Location: quantri.php?page_layout=danhsachsp");
        exit();
    } else {
        $error = "Có lỗi xảy ra khi cập nhật sản phẩm: " . $conn->error;
    }
    $conn->close();
}
?>


<!-- Your HTML form here -->

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Sửa thông tin sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php echo $product['ten_sp']; ?>" /></td>
            </tr>
            <!-- <tr>
                <td><label>Màu sắc</label><br /><input type="text" name="mau_sac" value="<?php echo $product['mau_sac']; ?>" /></td>
            </tr> -->
            <tr>
                <td>
                    <label>Ảnh sản phẩm</label><br/>
                    <img src="anh/<?php echo $product['anh_sp']; ?>" alt="" width="150" height="150">
                    <input type="file" name="anh_sp"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Ảnh mô tả số 1</label><br/>
                    <img src="anh/<?php echo $product['anh_sp_min_1']; ?>" alt="" width="150" height="150">
                    <input type="file" name="anh_sp_min_1"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Ảnh mô tả số 2</label><br/>
                    <img src="anh/<?php echo $product['anh_sp_min_2']; ?>" alt="" width="150" height="150">
                    <input type="file" name="anh_sp_min_2"/>
                </td>
            </tr>
            <tr>
                <td><label>Loại ấn phẩm</label><br />
                <select name="id_dm">
                    <option value=hidden><?php echo $product['id_dm']; ?></option>
                    <option value=1>Ấn phẩm văn Phòng</option>
                    <option value=3>Ấn phẩm tiếp thị</option>
                    <option value=4>Ấn phẩm bao bì</option>
                    <option value=6>Ấn phẩm khác</option>
                    <option value=7>Lịch tết</option>
                    <option value=8>In nhanh</option>
                </select>
                </td>
            </tr>
            <tr>
                <td><label>Nhà xuất bản</label><br />
                <select name="id_tg">
                    <option value=hidden><?php echo $product['id_tg']; ?></option>
                    <option value=1>Ấn phẩm văn Phòng</option>
                    <option value=3>Ấn phẩm tiếp thị</option>
                    <option value=4>Ấn phẩm bao bì</option>
                    <option value=6>Ấn phẩm khác</option>
                    <option value=7>Lịch tết</option>
                    <option value=8>In nhanh</option>
                </select>
                </td>
            </tr>
            <tr>
                <td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 /> Không <input checked="checked" type="radio" name="dac_biet" value=0 /></td>
            </tr>
            <tr>
                <td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php echo $product['gia_sp']; ?>" /> VNĐ</td>
            </tr>
            <tr>
                <td><label>Khuyến mãi</label><br /><input type="text" name="khuyen_mai" value="<?php echo $product['khuyen_mai']; ?>" />VNĐ</td>
            </tr>
            <tr>
                <td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"><?php echo $product['chi_tiet_sp']; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>