<?php
include_once('ketnoi.php');
$error = NULL;
if (isset($_POST['submit'])) {
    if (isset($_POST['do_tuoi']) && $_POST['do_tuoi'] == '') {
        $error_do_tuoi = '<span style="color:red;">(*)<span>';
    } else {
        $do_tuoi = $_POST['do_tuoi'];
    }
    if(isset($do_tuoi)){     
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $do_tuoi = $conn->real_escape_string($do_tuoi);
        $sql = "INSERT INTO dotuoi (do_tuoi) VALUES ('$do_tuoi')";

            if ($conn->query($sql) === TRUE) {
                header('location:quantri.php?page_layout=dotuoi');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm độ tuổi mới</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data"> 
        <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td><label>Độ tuổi</label><br /><input type="text" name="do_tuoi" /><?php if (isset($error_do_tuoi)) {
                                                                                                echo $error_do_tuoi;
                                                                                            } ?></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
            </tr>
        </table>
    </form>
</div>
