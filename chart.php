<?php
	include "koneksi.php";

	$ketinggian = array();
	$waktu = array();

	$query = "SELECT * FROM `monitoring` ORDER BY waktu ASC LIMIT 100";
	$sql = mysqli_query($koneksi,$query);
	while($data = mysqli_fetch_array($sql)){
		$ketinggian[] = intval($data['ketinggian']);
		$waktu[] = $data['waktu'];
	}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body onload="setTimeout(myFunction, 5000);">
<div  id="monitoring" style="min-width: 100px; height: 500px; margin: 100px"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
Highcharts.chart('monitoring', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories:<?php print_r(json_encode($waktu));?>
    },
    yAxis: {
        title: {
            text: 'jarak antara sensor dan air ( cm )'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'waktu',
        data:<?php print_r(json_encode($ketinggian));?>
    }]
});
</script>
<script type="text/javascript">
function loading(){
var waktu = new Date();
var detik = waktu.getSeconds();
}
</script>

<script>
function myFunction() {
    location.reload();
}
</script>

</body>
</html>