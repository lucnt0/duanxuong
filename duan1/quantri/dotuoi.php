<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>Tác giả</h2>
<div id="main">
    <p id="add-prd"><a style="color: #000;" href="quantri.php?page_layout=themdotuoi"><span>Thêm độ tuổi mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="47%">Độ tuổi</td>
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

        $sql = "SELECT * FROM dotuoi";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><span><?php echo $row['id_dotuoi']; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['do_tuoi']; ?></a></td>
                <td><a href="quantri.php?page_layout=suadotuoi&id_dotuoi=<?php echo $row['id_dotuoi']; ?>"><span>Sửa</span></a></td>
                <td><a href="xoatg.php?id_dotuoi=<?php echo $row['id_dotuoi']; ?>"><span>Xóa</span></a></td>
            </tr>
        <?php
        }
        ?>
    </table>