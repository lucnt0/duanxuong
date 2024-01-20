 <!-- Topbar Start -->
 <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <!-- <a class="text-body mr-3" href="">Trang chủ</a> -->
                    <a class="text-body mr-3" href="">Liên hệ</a>
                    <a class="text-body mr-3" href="">Giúp đỡ</a>
                    <a class="text-body mr-3" href="">Hỏi đáp</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                <?php
                // Kiểm tra trạng thái đăng nhập
                if (isset($_SESSION['tk'])) {
                    // Đã đăng nhập
                ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> <i style="color: #747D84; border: 1px solid #747D84;" class="fa-solid fa-user"></i> Quang Minh</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="index.php?page_layout=taikhoan"><button class="dropdown-item" type="button">Tài khoản của tôi</button></a>
                            <a href="index.php?page_layout=donmua"><button class="dropdown-item" type="button">Đơn mua</button></a>
                            <a href="index.php?page_layout=dangxuat"><button class="dropdown-item" type="button">Đăng xuất</button></a>
                        </div>
                    </div>
                <?php
                } else {
                    // Chưa đăng nhập
                ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="index.php?page_layout=dangnhap"><button class="dropdown-item" type="button">Đăng nhập</button></a>
                            <a href="index.php?page_layout=dangki"><button class="dropdown-item" type="button">Đăng kí</button></a>
                        </div>
                    </div>
                <?php
                }
                ?>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Đơn vị</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Ngôn ngữ</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">SÁCH</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">HAY</span>
                </a>
            </div>
            <?php
                include_once('chucnang/timkiem/timkiem.php');
            ?>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Dịch vụ khách hàng</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->