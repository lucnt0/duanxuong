<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_POST['submit'])) {
    // Bẫy lỗi để trống trường dữ liệu trong Form
    // Tên Sản phẩm
    if ($_POST['ten_sp'] == '') {
        $error_ten_sp = '<span style="color:red;">(*)<span>';
    } else {
        $ten_sp = $_POST['ten_sp'];
    }
    // Giá Sản phẩm
    if ($_POST['gia_sp'] == '') {
        $error_gia_sp = '<span style="color:red;">(*)<span>';
    } else {
        $gia_sp = $_POST['gia_sp'];
    }
    // Khuyến mãi
    if ($_POST['khuyen_mai'] == '') {
        $khuyen_mai = '';
    } else {
        $khuyen_mai = $_POST['khuyen_mai'];
    }
    // Chi tiết Sản phẩm
    if ($_POST['chi_tiet_sp'] == '') {
        $error_chi_tiet_sp = '<span style="color:red;">(*)<span>';
    } else {
        $chi_tiet_sp = $_POST['chi_tiet_sp'];
    }
    // Ảnh mô tả Sản phẩm
    if ($_FILES['anh_sp']['name'] != '') {
        $anh_sp = time() . '_' . $_FILES['anh_sp']['name'];
        $tmp = $_FILES['anh_sp']['tmp_name'];
    }
    // Ảnh mô tả số 1
    if ($_FILES['anh_sp_min_1']['name'] != '') {
        $anh_sp_min_1 = time() . '_' . $_FILES['anh_sp_min_1']['name'];
        $tmp_anh_sp_min_1 = $_FILES['anh_sp_min_1']['tmp_name'];
    }
    // Ảnh mô tả số 2
    if ($_FILES['anh_sp_min_2']['name'] != '') {
        $anh_sp_min_2 = time() . '_' . $_FILES['anh_sp_min_2']['name'];
        $tmp_anh_sp_min_2 = $_FILES['anh_sp_min_2']['tmp_name'];
    }     
    // Danh mục Sản phẩm
    if ($_POST['id_dm'] == 'unselect') {
        $error_id_dm = '<span style="color:red;">(*)<span>';
    } else {
        $id_dm = $_POST['id_dm'];
    }
    // Tác giả
    if ($_POST['id_tg'] == 'unselect') {
        $error_id_tg = '<span style="color:red;">(*)<span>';
    } else {
        $id_tg = $_POST['id_tg'];
    }
    // tinh trang
    if ($_POST['tinh_trang'] == 'unselect') {
        $error_tinh_trang = '<span style="color:red;">(*)<span>';
    } else {
        $tinh_trang = $_POST['tinh_trang'];
    }
    // số trang
    if ($_POST['so_trang'] == '') {
        $so_trang = '';
    } else {
        $so_trang = $_POST['so_trang'];
    }
    // Nhà xuất bản
    if ($_POST['nha_xuat_ban'] == '') {
        $nha_xuat_ban = '';
    } else {
        $nha_xuat_ban = $_POST['nha_xuat_ban'];
    }
    // ngày xuất bản
    if ($_POST['ngay_xuat_ban'] == '') {
        $ngay_xuat_ban = '';
    } else {
        $ngay_xuat_ban = $_POST['ngay_xuat_ban'];
    }
    // dich_gia
    if ($_POST['dich_gia'] == '') {
        $dich_gia = '';
    } else {
        $dich_gia = $_POST['dich_gia'];
    }
    // Công ty phát hành
    if ($_POST['cty_phat_hanh'] == '') {
        $cty_phat_hanh = '';
    } else {
        $cty_phat_hanh = $_POST['cty_phat_hanh'];
    }
    // Sản phẩm Đặc biệt
    $dac_biet = $_POST['dac_biet'];

    if (
        isset($ten_sp) && isset($gia_sp) &&
        isset($khuyen_mai) && isset($chi_tiet_sp) &&
        isset($anh_sp) && isset($id_dm) && isset($id_tg) && isset($dac_biet) && isset($anh_sp_min_1) 
        && isset($anh_sp_min_2) && isset($tinh_trang) && isset($so_trang) && isset($nha_xuat_ban)
        && isset($ngay_xuat_ban) && isset($dich_gia) && isset($cty_phat_hanh)
    ) {
        // Đường dẫn lưu trữ ảnh
        $upload_dir = 'anh/';

        // Di chuyển và lưu trữ các tệp ảnh
        if (!empty($anh_sp)) {
            move_uploaded_file($tmp, $upload_dir . $anh_sp);
        }
        if (!empty($anh_sp_min_1)) {
            move_uploaded_file($tmp_anh_chi_tiet_sp, $upload_dir . $anh_chi_tiet_sp);
        }
        if (!empty($anh_sp_min_2)) {
            move_uploaded_file($tmp_anh_chi_tiet_sp, $upload_dir . $anh_chi_tiet_sp);
        }
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        // Đảm bảo chuẩn bị truy vấn an toàn
        $ten_sp = $conn->real_escape_string($ten_sp);
        $gia_sp = $conn->real_escape_string($gia_sp);
        $khuyen_mai = $conn->real_escape_string($khuyen_mai);
        $chi_tiet_sp = $conn->real_escape_string($chi_tiet_sp);
        $anh_sp = $conn->real_escape_string($anh_sp);
        $id_dm = $conn->real_escape_string($id_dm);
        $id_tg = $conn->real_escape_string($id_tg);
        $dac_biet = $conn->real_escape_string($dac_biet);
        $anh_sp_min_1 = $conn->real_escape_string($anh_sp_min_1);
        $anh_sp_min_2 = $conn->real_escape_string($anh_sp_min_2);
        $tinh_trang = $conn->real_escape_string($tinh_trang);
        $so_trang = $conn->real_escape_string($so_trang);
        $nha_xuat_ban = $conn->real_escape_string($nha_xuat_ban);
        $ngay_xuat_ban = $conn->real_escape_string($ngay_xuat_ban);
        $dich_gia = $conn->real_escape_string($dich_gia);
        $cty_phat_hanh = $conn->real_escape_string($cty_phat_hanh);

        $sql = "INSERT INTO sanpham (
        ten_sp, gia_sp, khuyen_mai, chi_tiet_sp, anh_sp, id_dm, id_tg, dac_biet, anh_sp_min_1, 
        anh_sp_min_2, tinh_trang, so_trang, nha_xuat_ban, ngay_xuat_ban, dich_gia, cty_phat_hanh) VALUES 
        ('$ten_sp', '$gia_sp', '$khuyen_mai', '$chi_tiet_sp', '$anh_sp', '$id_dm', '$id_tg', '$dac_biet', 
        '$anh_sp_min_1', '$anh_sp_min_2', '$tinh_trang', '$so_trang', '$nha_xuat_ban', '$ngay_xuat_ban', '$dich_gia', '$cty_phat_hanh'
        )";
        
        if ($conn->query($sql) === TRUE) {
            header('location:quantri.php?page_layout=danhsachsp');
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>thêm mới sản phẩm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Tên sách</label><br /><input type="text" name="ten_sp" /><?php if (isset($error_ten_sp)) {
                                                                                                echo $error_ten_sp;
                                                                                            } ?></td>
            </tr>
            <tr>
                <td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><?php if (isset($error_anh_sp)) {
                                                                                                echo $error_anh_sp;
                                                                                            } ?></td>
            </tr>
            <tr>
            <td><label>Ảnh mô tả số 1</label><br /><input type="file" name="anh_sp_min_1" /></td>
            </tr>
            <tr>
                <td><?php if (isset($error_anh_sp_min_1)) { echo $error_anh_sp_min_1; } ?></td>
            </tr>
            <tr>
                <td><label>Ảnh mô tả số 2</label><br /><input type="file" name="anh_sp_min_2" /></td>
            </tr>
            <tr>
                <td><?php if (isset($error_anh_sp_min_2)) { echo $error_anh_sp_min_2; } ?></td>
            </tr>
            <tr>
                <td><label>Danh mục</label><br />
                <select name="id_dm">
                    <option value="unselect">Chọn danh mục</option>
                    <?php
                    $sql_dm = "SELECT id_dm, ten_dm FROM dmsanpham";
                    $result_dm = $conn->query($sql_dm);

                    if ($result_dm->num_rows > 0) {
                        while ($row_dm = $result_dm->fetch_assoc()) {
                            echo '<option value="' . $row_dm['id_dm'] . '">' . $row_dm['ten_dm'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <?php if (isset($error_id_dm)) {
                    echo $error_id_dm;
                } ?>
                </td>
            </tr>

            <tr>
                <td><label>Nhà xuất bản</label><br />
                    <select name="id_tg">
                        <option value="unselect">Chọn tác giả</option>
                        <?php
                        $sql_tg = "SELECT id_tg, ten_tg FROM tacgia";
                        $result_tg = $conn->query($sql_tg);

                        if ($result_tg->num_rows > 0) {
                            while ($row_tg = $result_tg->fetch_assoc()) {
                                echo '<option value="' . $row_tg['id_tg'] . '">' . $row_tg['ten_tg'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <?php if (isset($error_id_tg)) {
                        echo $error_id_tg;
                    } ?>
                </td>
            </tr>
            <tr>
                <td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" /> VNĐ <?php if (isset($error_gia_sp)) {
                                                                                                        echo $error_gia_sp;
                                                                                                    } ?></td>
            </tr>
            <tr>
                <td><label>Giá thị trường</label><br /><input type="text" name="khuyen_mai" value="" placeholder=""/>VNĐ<?php if (isset($error_khuyen_mai)) {
                                                                                                    echo $error_khuyen_mai;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="Còn hàng" placeholder=""/><?php if (isset($error_tinh_trang)) {
                                                                                                    echo $error_tinh_trang;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Số trang</label><br /><input type="text" name="so_trang" value="" placeholder=""/><?php if (isset($error_so_trang)) {
                                                                                                    echo $error_so_trang;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Tác giả</label><br /><input type="text" name="nha_xuat_ban" value="" placeholder=""/><?php if (isset($error_nha_xuat_ban)) {
                                                                                                    echo $error_nha_xuat_ban;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Ngày xuất bản</label><br /><input type="date" name="ngay_xuat_ban" value="" placeholder=""/><?php if (isset($error_ngay_xuat_ban)) {
                                                                                                    echo $error_ngay_xuat_ban;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Dịch giả</label><br /><input type="text" name="dich_gia" value="" placeholder=""/><?php if (isset($error_dich_gia)) {
                                                                                                    echo $error_dich_gia;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Công ty phát hành</label><br /><input type="text" name="cty_phat_hanh" value="" placeholder=""/><?php if (isset($error_cty_phat_hanh)) {
                                                                                                    echo $error_cty_phat_hanh;
                                                                                                } ?></td>
            </tr>
            <tr>
                <td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 /> Không <input checked="checked" type="radio" name="dac_biet" value=0 /></td>
            </tr>
            <tr>
                <td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"></textarea><?php if (isset($error_chi_tiet_sp)) {
                                                                                                                                    echo $error_chi_tiet_sp;
                                                                                                                                } ?></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>
