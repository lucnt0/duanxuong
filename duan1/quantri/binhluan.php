<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<script>function confirm(){return confirm("Bạn có chắc chắn muốn xoá không ?");}</script>
<h2>Thành viên</h2>
<div id="main">
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">stt</td>
            <td width="5%">id_sp</td>
            <td width="15%">Tên </td>
            <td width="15%">điện thoại </td>
            <td width="30">Bình luận</td>
            <td width="15%">ngày giờ</td>
        </tr>
        <?php
        // Kết nối cơ sở dữ liệu bằng MySQLi
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM blsanpham";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><span><?php $i= 0; echo $i++; ?></span></td>
                <td class="l5"><a href="#"><?php echo $row['id_sp']; ?></a></td>
                <td class="l5"><a href="#"><?php echo $row['ten']; ?></a></td>
                <td class="l5"><a href="#"><?php echo $row['dien_thoai']; ?></a></td>
                <td class="l5"><a href="#"><?php echo $row['binh_luan']; ?></a></td>
                <td class="l5"><a href="#"><?php echo $row['ngay_gio']; ?></a></td>    
            </tr>
        <?php
        }
        ?>
    </table>