<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>quản lý sản phẩm</h2>
<div id="main">
    <p id="add-prd"><a style="color: #000;" href="quantri.php?page_layout=themdm"><span>thêm Danh mục mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="40%">Tên danh mục</td>
            <td width="20">Tình trạng</td>
            <td width="15">Ảnh danh mục</td>
            <td width="10%">sửa</td>
            <td width="10%">xoá</td>
        </tr>
        <?php
        // Kết nối cơ sở dữ liệu bằng MySQLi
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM dmsanpham";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr id="prd-bar-s">
                <td><span><?php echo $row['id_dm']; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['ten_dm']; ?></a></td>
                <td class="l5"><a href="#"><?php echo $row['tinh_trang']; ?></a></td>
                <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_dm']; ?>" /></span></td>
                <td><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoadm.php?id_dm=<?php echo $row['id_dm']; ?>"><span>Xóa</span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>