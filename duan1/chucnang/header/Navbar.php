<style>
    #bg-dark{
        background-color: #2196F3;
    }
</style>
<div id="bg-dark" class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Thể loại sách</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <!-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tác giả <i class="fa fa-angle-right float-right mt-1"></i></a> -->
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
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
                                        <a href="index.php?page_layout=tacgia&id_tg=<?php echo $row['id_tg'] ?>&ten_tg=<?php echo $row['ten_tg'] ?>" class="dropdown-item"><?php echo $row['ten_tg'] ?></a>
                                <?php
                                    }

                                    // Đóng kết nối
                                    $conn->close();
                                ?>
                            </div>
                        </div>
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
                                <a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm'] ?>&ten_dm=<?php echo $row['ten_dm'] ?>" class="nav-item nav-link"> <?php echo $row['ten_dm'] ?></a>
                        <?php
                            }

                            // Đóng kết nối
                            $conn->close();
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav id="bg-dark" class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">SÁCH</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">HAY</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="index.php?page_layout=CuaHang" class="nav-item nav-link">Cửa hàng</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="index.php?page_layout=giohang" class="dropdown-item">Giỏ hàng</a>
                                    <a href="index.php?page_layout=kiemtra" class="dropdown-item">Kiểm tra đơn hàng</a>
                                </div>
                            </div>
                            <a href="index.php?page_layout=lienhe" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!-- <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a> -->
                            <a href="index.php?page_layout=giohang" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                    <?php
                                    if(isset($_SESSION['giohang'])){
                                        echo count($_SESSION['giohang']);
                                    }else{
                                        echo 0;
                                    }
                                    ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>