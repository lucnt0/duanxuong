<?php
include_once('ketnoi.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowsPerPage = 10;
$perRow = $page * $rowsPerPage - $rowsPerPage;

// Tạo kết nối MySQLi
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm INNER JOIN tacgia ON sanpham.id_tg = tacgia.id_tg LIMIT $perRow, $rowsPerPage";
$query = $conn->query($sql);

// Kiểm tra xem có sản phẩm nào không
if ($query->num_rows === 0) {
    echo "<p>Không có sản phẩm nào.</p>";
} else {
    // Hiển thị danh sách sản phẩm
    // ...
}

// Tính số trang và hiển thị phân trang
// ...
?>

<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>quản lý sản phẩm</h2>
<div id="main">
    <p id="add-prd"><a style="color: #000;" href="quantri.php?page_layout=themsp"><span>thêm sản phẩm mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="35%">Tên sản phẩm</td>
            <td width="10%">Giá</td>
            <td width="12%">Danh mục</td>
            <td width="12%">Nhà xuất bản</td>
            <td width="16%">Ảnh mô tả</td>
            <td width="16%">Xem bình luận</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
        <?php
        while ($row = $query->fetch_assoc()) {
        ?>
            <tr id="prd-bar-s">
                <td><span><?php echo $row['id_sp']; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['ten_sp']; ?></a></td>
                <td class="l5"><span class="price"><?php echo $row['gia_sp']; ?></span></td>
                <td class="l5"><?php echo $row['ten_dm'] ?></td>
                <td class="l5"><?php echo $row['ten_tg'] ?></td>
                <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp']; ?>" /></span></td>
                <td><a href="quantri.php?page_layout=binhluan"><span>Xem bình luận</span></a></td>
                <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoasp.php?id_sp=<?php echo  $row['id_sp']; ?>"><span>Xóa</span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    $totalRows = $conn->query("SELECT * FROM sanpham")->num_rows;
    $totalPage = ceil($totalRows / $rowsPerPage);
    $listPage = '';
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($i == $page) {
            $listPage .= " <span>" . $i . "</span> ";
        } else {
            $listPage .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page_layout=danhsachsp&page=' . $i . '">' . $i . '</a> ';
        }
    }
    ?>
    <p id="pagination"><?php echo $listPage; ?></p>
</div>
