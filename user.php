<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý tiệm net";
require_once('./header_user.php');
require_once('./db_connect.php');
?>
<div class="row">
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
                                <!-- <div class="icons">
                                    <a href="#" class="fas fa-heart"></a>
                                    <a href="#" class="cart-btn">add to cart</a>
                                    <a href="#" class="fas fa-share"></a>
                                </div> -->
                            </div>
                        </div>
                       <?php
			    else :
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
                                            <p class="text-danger text-center">Đã Đặt Chỗ</p>
                                        </div>
                                        <!-- <div class="icons">
                                            <a href="#" class="fas fa-heart"></a>
                                            <a href="#" class="cart-btn">add to cart</a>
                                            <a href="#" class="fas fa-share"></a>
                                        </div> -->
                                    </div>
                                </div>
                                <?php
					else :
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
                                            <a href="./themgiaodich_user.php?may=<?= $maytinh['id'] ?> "class="cart-btn">Đặt chỗ đi nè</a>
                                            <a href="#" class="fas fa-share"></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
					endif;
				else :
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
                                        <a href="./themgiaodich_user.php?may=<?= $maytinh['id'] ?>" class="cart-btn">Đặt chỗ đi nè</a>
                                        <a href="#" class="fas fa-share"></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif;
                  
                        ?>
            <?php
				endif;
		endwhile;
	endif;
	?>
            </div>
        </section>
</div>

<?php
require_once('./footer.php');
?>