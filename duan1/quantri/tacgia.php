<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>Tác giả</h2>
<div id="main">
span>Thêm mới</span></a></p>
    <table id="prds" border="0" cellp    <p id="add-prd"><a style="color: #000;" href="quantri.php?page_layout=themtg"><adding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="47%">Tên tác giả</td>
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

        $sql = "SELECT * FROM tacgia";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr id="prd-bar-s">
                <td><span><?php echo $row['id_tg']; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['ten_tg']; ?></a></td>
                <td><a class="btn" href="quantri.php?page_layout=suatg&id_tg=<?php echo $row['id_tg']; ?>"><span>Sửa</span></a></td>
                <td><a class="btn" href="xoatg.php?id_tg=<?php echo $row['id_tg']; ?>"><span>Xóa</span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>