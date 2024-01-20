<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>Thành viên</h2>
<div id="main">
    <p id="add-prd"><a style="color: #000;" href="quantri.php?page_layout=themthanh_vien"><span>Thêm tác giả mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="47%">Email</td>
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

        $sql = "SELECT * FROM thanhvien";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><span><?php echo $row['id_thanh_vien']; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['email']; ?></a></td>
                <td><a href="quantri.php?page_layout=suathanh_vien&id_thanh_vien=<?php echo $row['id_thanh_vien']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoathanh_vien.php?id_thanh_vien=<?php echo $row['id_thanh_vien']; ?>"><span>Xóa</span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>