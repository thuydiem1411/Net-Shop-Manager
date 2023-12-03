<?php
if (!isset($_SESSION['taikhoan']) || $_SESSION['taikhoan'] == "")
  header("Location: ./dangnhap.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styleDatatable.css">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://hotrolaptrinh.github.io/js/tech/tech.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</head>
<body>
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-9 d-flex align-items-center">
                    <!-- <h1><a href="admin.php">N3NET</a></h1> -->
                    <a href="admin.php"><h1>N3NET</h1></a>
                    <nav class="nav-menu d-none d-lg-block">
                        <ul id="menuHeader">
                            <li><a href="./admin.php" data="admin">Trang chủ</a></li>
                            <li><a href="./ql-khachhang.php" data="ql-khachhang">QL khách hàng</a></li>
                            <li><a href="./ql-maytinh.php" data="ql-maytinh">QL máy tính</a></li>
                            <li><a href="./ql-giatien.php" data="ql-giatien">QL giá tiền</a></li>
                            <li><a href="./ql-taikhoan.php" data="ql-taikhoan">QL tài khoản</a></li>
                            <li class="drop-down"><a href="javascript:void(0);" data="thongkedoanhthu thongkekhachhang">Thống kê</a>
                                <ul>
                                    <li><a href="./thongkedoanhthu.php">Thống kê doanh thu</a></li>
                                    <li><a href="./thongkekhachhang.php">Thống kê khách hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <a href="dangxuat.php" class="get-started-btn scrollto">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>

    <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $title ?></h2>
          <ol>
            <li><a href="admin.php">Trang chủ</a></li>
            <li><?= $title ?></li>
          </ol>
        </div>

      </div>
    </section>
    <!-- End Breadcrumbs -->
    <section class="inner-page">
      <div class="container">
</body>
</html>