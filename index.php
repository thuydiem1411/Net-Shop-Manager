<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản Lý Tiệm Net";
require_once('./db_connect.php');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Quản Lý Tiệm Net
        </title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
       <header>
            <!-- <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label> -->
            <a href="#" class="logo">N3NET<span>.</span></a>
            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#contact">contact</a>
                <a href="#products">bookin</a>
            </nav>
        
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <div class="dropdown">   
                    <a href="#" class="fas fa-user"></a>                
                    <div class="dropdown-content">
                        <a href="./dangnhap.php" class="fa fa-sign-in"><span>Đăng nhập</span></a>
                    </div>
                </div>
            </div>
       </header>
       <section class="home" id="home">
           <div class="carousel slide container-fluid" data-bs-ride="carousel" id="demo">
                <!-- indicator/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                  </div>
                  <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="content">
                        <h3>N3NET</h3>
                        <span>Thoải mái & Vui vẻ</span>
                        <p>Dịch vụ tốt nhất dành cho bạn</p>
                        <a href="./dangnhap.php" class="btn">Đặt chỗ ngay bây giờ</a>
                    </div>
                    <div class="carousel-item item active">
                    <img src="https://cdn.nerdweek.com.br/uploads/2019/04/montar-ou-comprar-pc-gamer-1.jpg" alt="N3-image" class="d-block" style="width:100%; height:800px">
                    <div class="carousel-caption">
                        <h3>Welcome to NETROOM</h3>
                        <p>Enjoy your own space right now</p>
                      </div>
                    </div>
                    <div class="carousel-item item">
                    <img src="https://th.bing.com/th/id/R.331efb71267151262c12d0365b6fb1d4?rik=u0ZVXmrBkGERjg&pid=ImgRaw&r=0" alt="N3-image" class="d-block" style="width:100%; height:800px">
                    <div class="carousel-caption">
                        <h3>Welcome to NETROOM</h3>
                        <p>Enjoy your own space right now</p>
                      </div>
                    </div>
                    <div class="carousel-item item">
                    <img src="https://th.bing.com/th/id/R.d61de2c044c2847c280e8c138e24620f?rik=H4ZXhPMEAhnUkA&riu=http%3a%2f%2fimg.chilango.com%2f2017%2f08%2fGamer-videojuegos.jpg&ehk=Vb9JEApAXRr%2bD6UKW7VKeuYPb57rSaciZ89UjedZ7t4%3d&risl=&pid=ImgRaw&r=0" alt="N3-image" class="d-block" style="width:100%; height:800px">
                    <div class="carousel-caption">
                        <h3>Welcome to NETROOM</h3>
                        <p>Enjoy your own space right now</p>
                      </div>
                    </div>
                </div>
                
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            
       </section>
       <section class="about" id="about">

            <h1 class="heading"> <span> about </span> us </h1>
        
            <div class="row">
        
                <div class="video-container">
                    <video src="./assets/img/video.tiemnet.mp4" loop autoplay muted></video>
                </div>
        
                <div class="content">
                    <h3>Tại sao lại chọn chúng tôi?</h3>
                    <p>Với dàn máy có cấu hình cao, wifi tốc độc cao. Giúp bạn có trải nghiệm tốt nhất khi chơi game</p>
                    <p>Phòng máy lạnh, ghế ngồi êm, tạo cho bạn cảm giác thoải mái nhất.</p>
                    <a href="./dangnhap.php" class="btn">Đặt chỗ ngay bây giờ</a>
                </div>
            </div>
        </section>
        <section class="products" id="products">
            <h1 class="heading">Đặt <span>chỗ</span></h1>
            <div class="box-container">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM `maytinh` WHERE 1 ORDER BY `tenmay` ASC");
            if ($query && $query->num_rows > 0) :
                while ($maytinh = mysqli_fetch_assoc($query)) :
                    if ($maytinh['tinhtrang'] == 'Hỏng') :
            ?>
                        <div class="box">
                            <div class="image">
                                <img src="assets/img/settings.png" alt="Máy đang gặp sự cố">
                                <div class="card-body">
                                    <p class="font-weight-bold text-primary text-center"><?= $maytinh['tenmay'] ?></p>
                                    <p class="text-danger text-center">Máy hỏng</p>
                                </div>
                            </div>
                        </div>
                        <?php
                    else:
                        $querygiaodich = mysqli_query($conn, "SELECT * FROM `giaodich`, `giatien` WHERE `idmay`='" . $maytinh['id'] . "' AND `giatien`.`idgiatien`=`giaodich`.`idgiatien` ORDER BY `thoigianbatdau` DESC LIMIT 1");
                        if ($querygiaodich && $querygiaodich->num_rows > 0) :
                            $giaodich = mysqli_fetch_assoc($querygiaodich);
                            if ($giaodich['thoigianketthuc'] == NULL) :
                        ?>
                                <div class="box">
                                    <div class="image">
                                        <img src="assets/img/settings.png" alt="Máy đang gặp sự cố">
                                        <div class="card-body">
                                            <p class="font-weight-bold text-primary text-center"><?= $maytinh['tenmay'] ?></p>
                                            <p class="text-danger text-center">Máy hỏng</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            else:
                                ?>
                                <div class="box">
                                    <div class="image">
                                       <img src="assets/img/computer.svg" alt="Máy đang gặp sự cố">
                                        <div class="card-body">
                                            <p class="font-weight-bold text-primary text-center"><?= $maytinh['tenmay'] ?></p>
                                            <p class="text-danger text-center">Máy trống</p>
                                        </div>
                                        <div class="icons">
                                            <a href="#" class="fas fa-heart"></a>
                                            <a href="./dangnhap.php" class="cart-btn">Đặt chỗ</a>
                                            <a href="#" class="fas fa-share"></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        else:
                                ?>
                            <div class="box">
                                <div class="image">
                                    <img src="assets/img/computer.svg" alt="Máy đang gặp sự cố">
                                    <div class="card-body">
                                        <p class="font-weight-bold text-primary text-center"><?= $maytinh['tenmay'] ?></p>
                                        <p class="text-danger text-center">Máy đang hoạt động</p>
                                    </div>
                                </div>
                            </div>
            <?php
                        endif;
                    endif;
                endwhile;
            endif;
            ?>
            </div>
        </section>
        <section class="contact" id="contact">

            <h1 class="heading"> <span> contact </span> us </h1>
        
            <div class="row">
        
                <form action="">
                    <input type="text" placeholder="name" class="box">
                    <input type="email" placeholder="email" class="box">
                    <input type="number" placeholder="number" class="box">
                    <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="send message" class="btn">
                </form>
        
                <div class="image">
                    <img src="assets/img/contact-img.svg" alt="">
                </div>
        
            </div>
        
        </section>
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Quick Link</h3>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                </div>
                <div class="box">
                    <h3>Extra Link</h3>
                    <a href="#">My account</a>
                    <a href="#">My order</a>
                </div>
                <div class="box">
                    <h3>Contact info</h3>
                    <a href="#">+0828991060</a>
                    <a href="#">nguyenhoangthanhly2002@gmail.com</a>
                </div>
            </div>
            <div class="credit">
                Credit by N3 
            </div>
        </section>
    </body>
</html>