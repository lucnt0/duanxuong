<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
           
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    
                    <tbody class="align-middle">
                        <tr>
                        <?php
                        if (isset($_SESSION['giohang'])) {
                            if (isset($_POST['sl'])) {
                                foreach ($_POST['sl'] as $id_sp => $sl) {
                                    // Nếu số lượng nhập vào là 0 thì unset sản phẩm đó
                                    if ($sl == 0) {
                                        unset($_SESSION['giohang'][$id_sp]);
                                    } else {
                                        // Nếu số khác 0 thì gán ngược lại.
                                        $_SESSION['giohang'][$id_sp] = $sl;
                                    }
                                }
                            }

                            $arrId = array();
                            // Lấy ra id sản phẩm từ mảng session
                            foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                                $arrId[] = $id_sp;
                            }
                            // Tách mảng arrId thành 1 chuỗi và ngăn cách bởi dấu ,
                            $strID = implode(',', $arrId);
                            
                            // Kiểm tra xem có sản phẩm trong giỏ hàng không
                            if (!empty($arrId)) {
                                // Sử dụng MySQLi thay vì MySQL
                                $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
                                
                                if ($conn->connect_error) {
                                    die("Kết nối thất bại: " . $conn->connect_error);
                                }
                                
                                $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                                $result = $conn->query($sql);
                                $totalPriceAll = 0;
                    ?>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $totalPrice = 0;
                            // Kiểm tra xem $_SESSION['giohang'][$row['id_sp']] đã được định nghĩa và có giá trị là số hay không
                            if (isset($_SESSION['giohang'][$row['id_sp']]) && is_numeric($_SESSION['giohang'][$row['id_sp']])) {
                                $gia_sp = floatval($row['gia_sp']); // Chuyển giá sản phẩm thành số thực
                                $totalPrice = $_SESSION['giohang'][$row['id_sp']] * $gia_sp;
                            }
                        ?>
                            <td class="align-middle"><img src="quantri/anh/<?php echo $row['anh_sp'] ?>" alt="" style="width: 50px;"> <?php echo $row['ten_sp'] ?></td>
                            <td class="align-middle"><?php echo $row['gia_sp'] ?> đ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="sl[<?php echo $row['id_sp'] ?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']] ?>" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $totalPrice ?> đ</td>
                            <td class="align-middle">
                                <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp'] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>
                            </td>
                            <?php
                            $totalPriceAll += $totalPrice;
                        }
                        ?>
                <?php
                    } else {
                        
                        echo '<span id="gio-rong">Giỏ hàng rỗng <i class="fa-solid fa-dolphin"></i></span>';
                    }
                } else {
                    echo '<span id="gio-rong">Giỏ hàng rỗng <i class="fa-solid fa-dolphin"></i></span>';
                }
                ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Voucher</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng giá trị giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng phụ</h6>
                            <h6><?php echo $totalPrice ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí giao hàng</h6>
                            <h6 class="font-weight-medium">50 đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5><?php echo $totalPriceAll ?></h5>
                        </div>
                        <a href="index.php?page_layout=muahang"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến hành đặt mua</button></a>
                    </div>

                </div>

        </div>

    </div>

</div>

    <!-- Cart End -->