<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giá tiền";
require_once('./db_connect.php');
require_once('./header.php');

$query_price ="SELECT * FROM giatien WHERE 1";
$result = mysqli_query($conn,$query_price);
while ($row = mysqli_fetch_array($result)) { 
    $price_list[] = $row['gia'];
    $price_day[] = DATE('d-m-Y',strtotime($row['idgiatien']));
    $price_month[] = DATE('m-Y',strtotime($row['idgiatien']));
    $price_year[] = DATE('Y',strtotime($row['idgiatien']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST['submit'])) {
        $price = trim($_POST['price']);
        if(abs($price)==$price && !empty($price) && is_numeric($price)) {
            $update_price = mysqli_query($conn, "INSERT INTO giatien(gia) VALUES('$price')");
            if($update_price) {
	$querydate = mysqli_query($conn,"SELECT idgiatien FROM giatien ORDER BY idgiatien DESC LIMIT 1");
	$pricedata = $querydate->fetch_assoc();
	$datetime = explode(" ",$pricedata['idgiatien']);
	echo "<p style='padding-left:16px;font-size: larger'>cập nhật giá thành công lúc ".$datetime[1].", ngày: ".$datetime[0]."</p>";
            }
        }
        elseif(strlen($price)!=0) {
            echo "<p style='padding-left:16px;font-size: larger'>Giá phải là số lớn hơn 0 - Bạn đã nhập: ".$_POST['price']."</p>";
        }
        else {
            echo "<p style='padding-left:16px;font-size: larger>gia chua duoc cap nhat</p>";
        }
    }
}
?>

<form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group mx-sm-3">
    <label for="capnhatgia" style="padding-right:12px;">Giá</label>
   <input type="text" class="form-control" id="capnhatgia" name="price" placeholder="Đơn vị tính: ngàn đồng/giờ">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
</form>

<canvas id="bieudogia" style="width:100%;max-width:1280px;max-height:720px"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0/chart.js"></script>
<script>
const labels = <?php echo json_encode($price_day); ?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Gia',
    data: <?php echo json_encode($price_list); ?>,
    fill: false,
    backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: '#0d8bf1',
    borderWidth: 1,
    showLine: true
  }]
};
const config = {
    type: 'line',
    data: data,
    options: {
        plugins: {
            title: {
                display: true, text: 'biểu đồ giá theo tháng', color: '#0d8bf1', font: {size: 18}
            },
            legend: {
                display: false, labels: {color: '#ffaaaa'}
            }
        },
        scales: {
            x: {
                display: true,
                grid: {display: true, color: '#ffaaaa', lineWidth: 1},
                title: {
                    display: false, text: 'thang', color: '#0d8bf1', font: {size: 18}
                },
                ticks: {
                    maxRotation: 180, autoSkip: false, color: '#0d8bf1'
                }
            },
            y: {
                display: true,
                grid: {display: true, color: '#ffaaaa', lineWidth: 1},
                title: {
                    display: false, text: 'gia', color: '#0d8bf1', font: {size: 18}
                },
                min: 0,
                max: <?php echo max($price_list)+1; ?>,
                ticks: {stepSize: 1}
            }
        }
    }
};
new Chart('bieudogia', config);
</script>

<?php
require_once('./footer.php');
?>