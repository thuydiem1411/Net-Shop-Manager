<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Thống kê khách hàng";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header.php');
$query="SELECT @_ := @_ + 1 AS STT, thongtinkhachhang.* FROM thongtinkhachhang, (SELECT @_ := 0) r WHERE loaikhachhang LIKE '";
$queryvip = mysqli_query($conn, $query."V%'");
$querythan = mysqli_query($conn, $query."T%'");
$querythuong = mysqli_query($conn, $query."B%'");
?>
<div class="row">
    <h2>Khách VIP</h2>
    <?php
        if(!empty($queryvip)) {
            echo "<h2>: ".$queryvip->num_rows." khách</h2>";
        }
    ?>
    <table id="V" style="width:100%" class="table table-striped table-bordered">
        <thead>
            <tr>
	<th>STT</th>
                <th>Số điện thoại</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Thời gian đăng ký</th>
                <th>Loại khách hàng</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($queryvip) {
                while ($row = mysqli_fetch_assoc($queryvip)) {
        ?>
            <tr>
	<td><?= $row['STT'] ?></td>
                <td><?= $row['sdt'] ?></td>
                <td><?= $row['hoten'] ?></td>
                <td><?= $row['ngaysinh'] ?></td>
                <td><?= $row['gioitinh'] ?></td>
                <td><?= $row['diachi'] ?></td>
                <td><?= $row['thoigiandangky'] ?></td>
                <td><?= $row['loaikhachhang'] ?></td>
            </tr>
            <?php
	}}
            ?>
        </tbody>
    </table>
</div>
<div class="row">
    <h2>Khách thân</h2>
    <?php
        if(!empty($querythan)) {
            echo "<h2>: ".$querythan->num_rows." khách</h2>";
        }
    ?>
    <table id="T" style="width:100%" class="table table-striped table-bordered">
        <thead>
            <tr>
	<th>STT</th>
                <th>Số điện thoại</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Thời gian đăng ký</th>
                <th>Loại khách hàng</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($querythan) {
                while ($row = mysqli_fetch_assoc($querythan)) {
        ?>
            <tr>
	<td><?= $row['STT'] ?></td>
                <td><?= $row['sdt'] ?></td>
                <td><?= $row['hoten'] ?></td>
                <td><?= $row['ngaysinh'] ?></td>
                <td><?= $row['gioitinh'] ?></td>
                <td><?= $row['diachi'] ?></td>
                <td><?= $row['thoigiandangky'] ?></td>
                <td><?= $row['loaikhachhang'] ?></td>
            </tr>
            <?php
	}}
            ?>
        </tbody>
    </table>
</div>
<div class="row">
    <h2>Khách thường</h2>
    <?php
        if(!empty($querythuong)) {
            echo "<h2>: ".$querythuong->num_rows." khách</h2>";
        }
    ?>
    <table id="B" style="width:100%" class="table table-striped table-bordered">
        <thead>
            <tr>
	<th>STT</th>
                <th>Số điện thoại</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Thời gian đăng ký</th>
                <th>Loại khách hàng</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($querythuong) {
                while ($row = mysqli_fetch_assoc($querythuong)) {
        ?>
            <tr>
	<td><?= $row['STT'] ?></td>
                <td><?= $row['sdt'] ?></td>
                <td><?= $row['hoten'] ?></td>
                <td><?= $row['ngaysinh'] ?></td>
                <td><?= $row['gioitinh'] ?></td>
                <td><?= $row['diachi'] ?></td>
                <td><?= $row['thoigiandangky'] ?></td>
                <td><?= $row['loaikhachhang'] ?></td>
            </tr>
            <?php
	}}
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#V').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "search": "Tìm kiếm",
                "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Dòng (_START_ - _END_) / _TOTAL_ . Trang _PAGE_ / _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Sau",
                    "previous": "Trước"
                },
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#T').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "search": "Tìm kiếm",
                "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Dòng (_START_ - _END_) / _TOTAL_ . Trang _PAGE_ / _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Sau",
                    "previous": "Trước"
                },
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#B').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "search": "Tìm kiếm",
                "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Dòng (_START_ - _END_) / _TOTAL_ . Trang _PAGE_ / _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Sau",
                    "previous": "Trước"
                },
            }
        });
    });
</script>
<?php
require_once('./footer.php');
?>