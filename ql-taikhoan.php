<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý tài khoản";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header.php');

$queryinsert = 0;
if (isset($_POST['type']) && $_POST['type'] == 'insert') {
    $queryinsert = mysqli_query($conn, "INSERT INTO `taikhoan`(`taikhoan`,`matkhau`,`loaitaikhoan`,`ghichu`) VALUES ( '" . $_POST['taikhoan'] . "', '" . $_POST['matkhau'] . "', '" . $_POST['loaitaikhoan'] . "', '" . $_POST['ghichu'] . "')");
}
$querydel = 0;
if (isset($_POST['xoamatkhau'])) {
    $querydel = mysqli_query($conn, "DELETE FROM `taikhoan` WHERE `matkhau` = '" . $_POST['xoamatkhau'] . "'");
}

$queryupdate = 0;
if (isset($_POST['type']) && $_POST['type'] == 'update') {
    $queryupdate = mysqli_query($conn, "UPDATE `taikhoan` SET `matkhau`='" . $_POST['matkhau'] . "',`taikhoan`='" . $_POST['taikhoan'] . "',`loaitaikhoan`='" . $_POST['loaitaikhoan'] . "',`ghichu`='" . $_POST['ghichu'] . "' WHERE `matkhau`= '" . $_POST['id'] . "' ");
}

$querytaikhoan = mysqli_query($conn, "SELECT * FROM `taikhoan` WHERE 1");

if ($queryinsert) {
    echo "<script>Swal.fire('Thành công!','Đã thêm thông tin tài khoản!','success');</script>";
}
elseif ($queryinsert !== 0) {
    echo "<script>Swal.fire('Thất bại!','Không thể thêm thông tin tài khoản!','error');</script>";
}

if ($queryupdate){
    echo "<script>Swal.fire('Thành công!','Đã cập nhật thông tin tài khoản!','success');</script>";

}
elseif ($queryupdate !== 0) {
    echo "<script>Swal.fire('Thất bại!','Không thể cập nhật thông tin tài khoản!','error');</script>";
}
if ($querydel) {
    echo "<script>Swal.fire('Thành công!','Đã xóa thông tin tài khoản!','success');</script>";
}
elseif ($querydel !== 0) {
    echo "<script>Swal.fire('Thất bại!','Không thể xóa thông tin tài khoản!','error');</script>";
}
?>

<div class="row">
    <button id="submit" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" data-title="Thêm tài khoản" data-type="insert"><i class="fa fa-plus"></i> Thêm tài khoản</button>
    <table id="datatable" style="width:100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Thao tác</th>
                <th>Tài Khoản</th>
                <th>Mật Khẩu</th>
                <th>Loại Tài Khoản</th>
                <th>Ghi Chú</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($querytaikhoan && $querytaikhoan -> num_rows > 0) {
                while ($row = mysqli_fetch_assoc($querytaikhoan)) {
            ?>
                    <tr>
                    <td>
                            <a href="#" class="btn btn-sm btn-success mb-1" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-title="Cập nhật thông tin tài khoản" data-type="update" data-taikhoan="<?= $row['taikhoan'] ?>" data-matkhau="<?= $row['matkhau'] ?>"   data-loaitaikhoan="<?= $row['loaitaikhoan'] ?>" data-ghichu="<?= $row['ghichu'] ?>">
                                <i class="fa fa-pencil"></i> 
                            </a>
                            <a href="#" class="btn btn-sm btn-danger mb-1" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-taikhoan="<?= $row['taikhoan'] ?>" data-matkhau="<?= $row['matkhau'] ?>">
                                <i class="fa fa-trash"></i> 
                            </a>
                        </td>
                        <td><?= $row['taikhoan'] ?></td>
                        <td>********</td>
                        <td><?= $row['loaitaikhoan'] ?></td>
                        <td><?= $row['ghichu'] ?></td>
                        
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="">
            <input type="hidden" name="type" id="type">
            <input type="hidden" name="id" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="taikhoan" class="form-label">Tài Khoản</label>
                            <input required type="text" name="taikhoan" id="taikhoan" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="matkhau" class="form-label">Mật Khẩu </label>
                            <input required type="password" name="matkhau" id="matkhau" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                       <div class="form-group col-6">
                            <label for="loaitaikhoan" class="form-label">Loại Tài Khoản: </label>
                            <select required class="form-control" name="loaitaikhoan" id="loaitaikhoan" style="width: 100%">
                                <option value="Bình thường">Bình thường</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="ghichu" class="form-label">Ghi chu: </label>
                            <select class="form-control" name="ghichu" id="ghichu" required>
                                <option value="Quản trị viên">Quản trị viên</option>
                                <option value="Khách hàng">Khách hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Lưu và đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msgxoa"></p>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="hidden" name="xoamatkhau" value="" id="xoamatkhau">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button class="btn btn-primary"><i class="fa fa-trash"></i> Chấp nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //sua
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        modal.find('.modal-title').text(button.data('title'))
        modal.find('#type').val(button.data('type'))
        modal.find('#id').val(button.data('matkhau'))
        modal.find('#matkhau').val(button.data('matkhau'))
        modal.find('#taikhoan').val(button.data('taikhoan'))
        modal.find('#ghichu').val(button.data('ghichu'))
        modal.find('#loaitaikhoan').val(button.data('loaitaikhoan'))
    })

    //xoa
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var taikhoan = button.data('taikhoan')
        var matkhau = button.data('matkhau')
        var modal = $(this)
        modal.find('#xoamatkhau').val(matkhau)
        modal.find('#msgxoa').html("Bạn chắc muốn xóa <b>" + taikhoan+"</b>? Sau khi xóa bạn sẽ không thể khôi phục lại được.<br/> - Nếu <b>đồng ý</b> xóa, hãy nhấn <b>chấp nhận</b>.<br/> - Nếu <b>không đồng ý</b> xóa, hãy nhấn <b>đóng</b>.")
    })

    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "search": "Tìm kiếm",
                "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
                "zeroRecords": "Không tìm thấy",
                "info": "Dòng (_START_ - _END_) / _TOTAL_ . Trang _PAGE_ / _PAGES_",
                "infoEmpty": "Không có dữ liệu",
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