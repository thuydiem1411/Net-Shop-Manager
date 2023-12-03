<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giao dịch";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header_user.php');

$querykhachhang = mysqli_query($conn, "SELECT * FROM `thongtinkhachhang`");
$querygia = mysqli_query($conn, "SELECT * FROM `giatien` WHERE 1 ORDER BY `idgiatien` DESC");
$querymay = mysqli_query($conn, "SELECT `tenmay` FROM `maytinh` WHERE `id`=" . $_GET['may']);
$maytinh = mysqli_fetch_assoc($querymay);


if(isset($_POST['submit'])){
    $sdt = $_POST['sdt'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $checksdtQuery = "SELECT * FROM thongtinkhachhang WHERE `sdt` = '$sdt'";
    $result = mysqli_query($conn, $checksdtQuery); //Thêm dòng này để khởi tạo biến $result
    if(mysqli_num_rows($result) > 0){
        $query = mysqli_query($conn, "INSERT INTO `giaodich` (`sdtkhachhang`, `idmay`, `idgiatien`, `thoigianbatdau`, `giamgia`, `ghichu`) VALUES ('" . $_POST['sdt'] . "', '" . $_POST['idmay'] . "', '" . $_POST['giatien'] . "', '" . $_POST['thoigianbatdau'] . "', '" . $_POST['giamgia'] . "', '" . $_POST['ghichu'] . "');");
        if($query){
            echo "<script>Swal.fire('Thành công!','Đã lưu thông tin giao dịch!','success').then(function(){window.location = './index.php';});</script>";
        }else{
            echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin giao dịch!','error');</script>";
        }
    }
    else{
        $insertkhachhang = "INSERT INTO thongtinkhachhang (sdt, hoten, ngaysinh,diachi) VALUES ('$sdt', '$hoten', '$ngaysinh','$diachi')";
        mysqli_query($conn, $insertkhachhang);
        if(mysqli_affected_rows($conn)==1){
            $query = mysqli_query($conn, "INSERT INTO `giaodich` (`sdtkhachhang`, `idmay`, `idgiatien`, `thoigianbatdau`, `giamgia`, `ghichu`) VALUES ('" . $_POST['sdt'] . "', '" . $_POST['idmay'] . "', '" . $_POST['giatien'] . "', '" . $_POST['thoigianbatdau'] . "', '" . $_POST['giamgia'] . "', '" . $_POST['ghichu'] . "');");
            if($query){
                echo "<script>Swal.fire('Thành công!','Đã lưu thông tin giao dịch!','success').then(function(){window.location = './user.php';});</script>";
            }else{
                echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin giao dịch!','error');</script>";
            }
        };
    }    
}

//if (isset($_POST['submit'])) {
//    $query = mysqli_query($conn, "INSERT INTO `giaodich` (`sdtkhachhang`, `idmay`, `idgiatien`, `thoigianbatdau`, `giamgia`, `ghichu`) VALUES ('" . $_POST['khachhang'] . "', '" . $_POST['idmay'] . "', '" . $_POST['giatien'] . "', '" . $_POST['thoigianbatdau'] . "', '" . $_POST['giamgia'] . "', '" . $_POST['ghichu'] . "');");
//    if ($query) {
//        echo "<script>Swal.fire('Thành công!','Đã lưu thông tin giao dịch!','success').then(function(){window.location = './index.php';});</script>";
//    } else {
//        echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin giao dịch!','error');</script>";
//    }
//}

?>
<div class="row">
    <div class="col-xl-8 mx-auto">
        <form method="post" action="">

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="idmay">ID máy:</label>
                        <input type="number" readonly class="form-control" id="idmay" name="idmay" value="<?= $_GET['may'] ?>">
                    </div>
                </div><br>
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="tenmay">Tên máy:</label>
                        <input type="text" readonly class="form-control" id="tenmay" name="tenmay" value="<?= $maytinh['tenmay'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input class="form-control" name="sdt" id="sdt" value="" placeholder="Nhập số điện thoại ...">
                    </div>
                </div><br>
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="hoten">Họ tên:</label>
                        <input class="form-control" name="hoten" id="hoten" value="" placeholder="Nhập tên của bạn ...">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="ngaysinh">Ngày sinh :</label>
                        <input type="date" class="form-control" name="ngaysinh"  id="ngaysinh" min="1000-01-01" max="2023-12-31" value="2018-05-18">
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="khachhang">Ngày sinh :</label>
                        <input class="form-control" name="ngaysinh" id="ngaysinh" value="" placeholder="Nhập ngày sinh ...">
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="khachhang">Địa chỉ :</label>
                        <input class="form-control" name="diachi" id="diachi" value="" placeholder="Nhập địa chỉ của bạn...">
            </div>
                   

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="form-group">
                        <label for="thoigianbatdau">Thời gian bắt đầu:</label>
                        <input type="text" class="form-control" id="thoigianbatdau" name="thoigianbatdau" value="<?= date("Y-m-d H:i:s", time()) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giatien">Giá tiền:</label>
                        <select class="form-control" name="giatien" id="giatien" placeholder="Chọn giá tiền..">
                            <?php
                            if ($querygia && $querygia->num_rows > 0) {
                                while ($giatien = mysqli_fetch_assoc($querygia)) {
                                    echo '<option value="' . $giatien['idgiatien'] . '">' . $giatien['gia'] . '.000đ</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giamgia">Giảm giá (%):</label>
                        <input type="text" class="form-control" id="giamgia" name="giamgia" value="0.0">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="ghichu">Ghi chú:</label>
                        <textarea class="form-control" name="ghichu" id="ghichu" cols="30" rows="8"></textarea>
                    </div>
                </div>
            </div>
            <!-- bắt đầu đặt chỗ -->
            <button name="submit" type="submit" class="btn btn-primary px-5"><i class="fa fa-clock-o"></i> Bắt đầu đặt chỗ</button>
            <a href="./user.php" class="btn btn-danger px-5"><i class="fa fa-reply"></i> Trở về</a>
        </form>
    </div>
</div>
<script>
    $('#khachhang').change(function() {
        $('#loaikh').val($('#khachhang option:selected').data('loaikh')).change();
        if ($('#khachhang option:selected').data('loaikh') == "VIP") {
            $('#giamgia').val("10.0");
        } else if ($('#khachhang option:selected').data('loaikh') == "Thân thuộc") {
            $('#giamgia').val("5.0");
        } else {
            $('#giamgia').val("0.0");
        }

    });
</script>
<?php
require_once('./footer.php');
?>