<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM members ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>gender</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['gender']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
</body>

<script>
		var ctx = document.getElementById("myChart").getContext('2d');
 
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Usia <= 19', 'Usia >= 20'],
				datasets: [
					{
							label: 'Laki-laki',
							data: [
								<?php 
								$jumlah = mysqli_query($mysqli,"select id from members where gender='male' and age <= 19");
								echo mysqli_num_rows($jumlah);
								?>, 
								<?php 
								$jumlah= mysqli_query($mysqli,"select id from members where gender='male' and age >= 20");
								echo mysqli_num_rows($jumlah);
								?>
							],
							backgroundColor: 'rgba(53, 162, 235, 0.5)',
							
					},
					{
							label: 'Perempuan',
							data: [
								<?php 
								$jumlah = mysqli_query($mysqli,"select id from members where gender='female' and age <= 19");
								echo mysqli_num_rows($jumlah);
								?>, 
								<?php 
								$jumlah= mysqli_query($mysqli,"select id from members where gender='female' and age >= 20");
								echo mysqli_num_rows($jumlah);
								?>
							],
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							
					},
			
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</html>
