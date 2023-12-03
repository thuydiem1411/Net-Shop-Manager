<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Thống kê doanh thu";
require_once('./header.php');
require_once('./db_connect.php');
require_once('./include/function.php');

$query_sale = "SELECT t.sdtkhachhang AS khach, t.thoigianbatdau AS vo, t.thoigianketthuc as ra, YEAR(t.thoigianketthuc) AS nam, MONTH(t.thoigianketthuc) AS thang, WEEK(t.thoigianketthuc) AS tuan, DAY(t.thoigianketthuc), SUM(CEIL(TIMESTAMPDIFF(minute,t.thoigianbatdau,t.thoigianketthuc)*(p.gia/60)*(1-t.giamgia/100)))*1000 AS doanhthu FROM giaodich t, giatien p WHERE p.idgiatien=t.idgiatien ";
$query_day = mysqli_query($conn,$query_sale."AND DATE(t.thoigianketthuc) LIKE DATE(NOW())");
$query_week = mysqli_query($conn,$query_sale."AND YEARWEEK(t.thoigianketthuc) LIKE YEARWEEK(NOW())");
$query_month = mysqli_query($conn,$query_sale."AND MONTH(t.thoigianketthuc) LIKE MONTH(NOW()) AND YEAR(t.thoigianketthuc) LIKE YEAR(NOW())");
$query_year = mysqli_query($conn,$query_sale."AND YEAR(t.thoigianketthuc) LIKE YEAR(NOW())");

$statistics = [];
$statistics['day'] = mysqli_fetch_array($query_day)['doanhthu'];
$statistics['week'] = mysqli_fetch_array($query_week)['doanhthu'];
$statistics['month'] = mysqli_fetch_array($query_month)['doanhthu'];
$statistics['year'] = mysqli_fetch_array($query_year)['doanhthu'];

$sql_thongke_theo_tuan = "SELECT DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%d/%m/%Y') AS Label, SUM(TIMESTAMPDIFF(HOUR, thoigianbatdau, thoigianketthuc)* gia * ((100 - giamgia) / 100)) AS Value FROM `giaodich`, `giatien` WHERE  `giaodich`.`idgiatien` = `giatien`.`idgiatien` GROUP BY DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%Y%m%d') LIMIT 30;";
$query = mysqli_query($conn, $sql_thongke_theo_tuan);
$thongke_theo_tuan = array();
if ($query && $query->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $thongke_theo_tuan[] = $row;
    }
}
$thongke_theo_tuan = json_encode($thongke_theo_tuan);


$sql_thongke_theo_thang = "SELECT DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%m') AS Label, SUM(TIMESTAMPDIFF(HOUR, thoigianbatdau, thoigianketthuc)* gia * ((100 - giamgia) / 100)) AS Value FROM `giaodich`, `giatien` WHERE  `giaodich`.`idgiatien` = `giatien`.`idgiatien` GROUP BY DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%Y%m') LIMIT 12;";
$query = mysqli_query($conn, $sql_thongke_theo_thang);
$thongke_theo_thang = array();
if ($query && $query->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $thongke_theo_thang[] = $row;
    }
}
$thongke_theo_thang = json_encode($thongke_theo_thang);

$sql_thongke_theo_nam = "SELECT DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%Y') AS Label, SUM(TIMESTAMPDIFF(HOUR, thoigianbatdau, thoigianketthuc)* gia * ((100 - giamgia) / 100)) AS Value FROM `giaodich`, `giatien` WHERE  `giaodich`.`idgiatien` = `giatien`.`idgiatien` GROUP BY DATE_FORMAT(`giaodich`.`thoigianketthuc`, '%Y');";
$query = mysqli_query($conn, $sql_thongke_theo_nam);
$thongke_theo_nam = array();
if ($query && $query->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $thongke_theo_nam[] = $row;
    }
}
$thongke_theo_nam = json_encode($thongke_theo_nam);
?>
<script>
    var thongke_theo_tuan = <?php echo $thongke_theo_tuan; ?>;
    var thongke_theo_thang = <?php echo $thongke_theo_thang; ?>;
    var thongke_theo_nam = <?php echo $thongke_theo_nam; ?>;
</script>

<!-- Thống kê chung -->
<div style="display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(0, 1fr))">
    <div style="padding: 20px; display: flex; height: 100%; box-shadow: -15px -15px 15px 0px inset Khaki, 15px 15px 15px 0px inset Khaki">
        <div style="width: 80%; padding-left: 20px; border: medium solid DarkKhaki; border-right: 0px">
            <p style="font-size: x-large; margin: 0; text-shadow: 0px 0px 1px DarkKhaki">
                HÔM NAY<br><?= $statistics['day']?> đ
            </p>
        </div>
        <div style="width: 20%; display: flex; flex-direction: column; justify-content: center; border: medium solid DarkKhaki; border-left: 0px">
            <i class="fa fa-refresh fa-lg"></i>
        </div>
    </div>
    <div style="padding: 20px; display: flex; height: 100%; box-shadow: 15px 15px 15px 0px inset lightgreen, -15px -15px 15px 0px inset lightgreen">       
        <div style="width: 80%; padding-left: 20px; border: medium solid green; border-right: 0px">
            <p style="font-size: x-large; margin: 0; text-shadow: 0px 0px 1px green">
                TUẦN NÀY<br><?= $statistics['week']?> đ
            </p>
        </div>
        <div style="width: 20%; display: flex; flex-direction: column; justify-content: center; border: medium solid green; border-left: 0px">
            <i class="fa fa-refresh fa-lg"></i>
        </div>
    </div>
    <div style="padding: 20px; display: flex; height: 100%; box-shadow: -15px -15px 15px 0px inset lightblue, 15px 15px 15px 0px inset lightblue">
        <div style="width: 80%; padding-left: 20px; border: medium solid blue; border-right: 0px">
            <p style="font-size: x-large; margin: 0; text-shadow: 0px 0px 1px blue">
                THÁNG NÀY<br><?= $statistics['month']?> đ
            </p>
        </div>
        <div style="width: 20%; display: flex; flex-direction: column; justify-content: center; border: medium solid blue; border-left: 0px">
            <i class="fa fa-refresh fa-lg"></i>
        </div>
    </div>
    <div style="padding: 20px; display: flex; height: 100%; box-shadow: -15px -15px 15px 0px inset pink, 15px 15px 15px 0px inset pink">
        <div style="width: 80%; padding-left: 20px; border: medium solid DeepPink; border-right: 0px">
            <p style="font-size: x-large; margin: 0; text-shadow: 0px 0px 1px DeepPink">
                NĂM NÀY<br><?= $statistics['year']?> đ
            </p>
        </div>
        <div style="width: 20%; display: flex; flex-direction: column; justify-content: center; border: medium solid DeepPink; border-left: 0px">
            <i class="fa fa-refresh fa-lg"></i>
        </div>
    </div>
</div>
<!-- end Thống kê chung -->
<hr>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Biểu đồ</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2 text-right">
                        <label for="thang" class="mt-2">Thống kê theo:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="thongke" id="thongke" class="form-control" style="width: 100px">
                            <option value="ngày">Ngày</option>
                            <option value="tháng">Tháng</option>
                            <option value="năm">Năm</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chi tiết -->
<div class="row">
    <!-- Tiến độ -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Doanh thu</h6>
            </div>
            <div class="card-body">
                <?php
                $query = mysqli_query($conn, "SELECT `giaodich`.`sdtkhachhang`, `giaodich`.`idmay`, `giaodich`.`thoigianbatdau`, `giaodich`.`thoigianketthuc`, `giaodich`.`giamgia`, `giatien`.`gia` FROM `giaodich`, `giatien` WHERE  `giaodich`.`idgiatien` = `giatien`.`idgiatien` ORDER BY `giaodich`.`thoigianketthuc` DESC");
                $tkngay = [];
                while ($row = mysqli_fetch_assoc($query)) :
                    if (!isset($tkngay[date("d-m-Y", strtotime($row['thoigianketthuc']))])) {
                        $tkngay[date("d-m-Y", strtotime($row['thoigianketthuc']))] = 0;
                    }
                    $tkngay[date("d-m-Y", strtotime($row['thoigianketthuc']))] += ceil(((strtotime($row['thoigianketthuc']) - strtotime($row['thoigianbatdau'])) / 3600) * $row['gia'] * ((100 - $row['giamgia']) / 100));
                ?>
                <?php endwhile;
                foreach ($tkngay as $k => $v) :
                ?>
                    <div>Ngày: <?= $k ?> - Doanh thu: <span><?= $v ?>000 đ</span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var xvalue =[];
    var yvalue =[];
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart;
    function VeBieuDo(data) {
        xvalue =[];
        yvalue =[];
        for (var i = 0; i < data.length; i++) {
            xvalue.push(data[i].Label);
            yvalue.push(data[i].Value);
        }

        if (myChart != undefined)
            myChart.destroy();

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: xvalue,
                datasets: [{
                    label: 'Doanh thu',
                    data: yvalue,
                    backgroundColor: [
                        'rgba(99, 132, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(99, 132, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: (ctx) => 'Biểu đồ doanh thu theo '+ $('#thongke').val(),
                        font: {size: 27},
                    }
                }
            }
        });
    }
    $('#thongke').change(function () {
        switch ($(this).val()) {
            case 'ngày':
                VeBieuDo(thongke_theo_tuan);
                break;
            case 'tháng':
                VeBieuDo(thongke_theo_thang);
                break;
            case 'năm':
                VeBieuDo(thongke_theo_nam);
                break;
        }
    });
    VeBieuDo(thongke_theo_tuan);
</script>
<?php
require_once('./footer.php');
?>