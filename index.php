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
<style>
img{
	width:500px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80vw;
  margin-left:10vw;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.add{
	display:flex;
	margin-left:10vw;
}
.add button{
	margin-left:50vw
}
h1{
	font-size:30px
}
.add-button{
	height:40px;
	width:180px;
	font-size:20px;
	background-color:orange;
	border-radius:8px;
	color:white;
	
}
.add-button a{
	color:white;
}

.add h1{
	font-size:40px;
}

.imgs{
	margin-left:30vw
}

</style>
<body>
	<header>
		<img src="https://1.bp.blogspot.com/-t38D2h5Tjmk/YBS1qYIBwFI/AAAAAAAAGC8/_3XR7hhehigwfOnKkjjC30ey3Q3pxI7eQCLcBGAsYHQ/s1280/lowongan-kerja-talenta-indonesia-serang.png" alt="">
	</header>
	     <div class='add'>
            <h1>Community data</h1>
			<button class="add-button"><a href="attacth.php">Add New Member</a></button>
			<br/><br/>
          </div>

	<table width='80%' border=0>
<?php 

if($result){
	echo "<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>gender</td>
		<td>Update</td>
	</tr>";
}else{
	echo "<img src='https://cdn.dribbble.com/users/2698098/screenshots/5957957/untitled-2-01_4x.jpg' class='imgs'/>";
}?>
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
