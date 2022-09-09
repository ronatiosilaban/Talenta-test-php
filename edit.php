<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($gender)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE members SET name='$name',age='$age',gender='$gender' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM members WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$gender = $res['gender'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<style>
img{
	width:400px;
}
.add{
	margin-left:30vw;
	margin-bottom:100px;
}
.add table{
	width:30vw;
	background-color:#6CD7F2;
	border:2px solid #6CD7F2;
	box-shadow: 5px 10px #6CD7F2;
	border-radius:10px;

}
h2{
	margin-left:10vw;
	font-size:30px;
	font-family: "Times New Roman", Times, serif;
}
.input{
	width:25vw;
	height:40px;
	padding:10px;
	margin-left:30px;
}
.button{
	background-color:#1FC2DB;
	width:25vw;
	height:40px;
	margin-left:30px;
	color:white;
	font-size:20px;
	border-radius:8px
	
}
.log{
	margin-bottom:30px
}
.out{
	margin-top:40px;
	margin-left:30px;
	font-size:30px;
	padding-bottom:10px;
}
.back{
	margin-left:10vw;
	font-size:30px;
	font-family: "Times New Roman", Times, serif;
}
.new{
	padding-top:50px;
	padding-bottom:50px;
	
}
</style>
<body>
	<header>
		<img src="https://1.bp.blogspot.com/-t38D2h5Tjmk/YBS1qYIBwFI/AAAAAAAAGC8/_3XR7hhehigwfOnKkjjC30ey3Q3pxI7eQCLcBGAsYHQ/s1280/lowongan-kerja-talenta-indonesia-serang.png" alt="">
	</header>
	<a href="index.php" class="back">Back Home</a>
	<h2>Update Your Data</h2>
	<br/><br/>
	<form name="form1" method="post" action="edit.php" class="add">
		<table border="0" class="new">
			<tr class="out"> 
				<td><label class="out">Nama :</label><input type="text" name="name" class="input" value="<?php echo $name;?>"></td>
			</tr>
			<tr class="out"> 
				<td><label class="out">Age :</label><input type="text" name="age" class="input" value="<?php echo $age;?>"></td>
			</tr>
			<tr class="out"> 
				<td><label class="out">Gender :</label><input type="text" name="gender" class="input log" value="<?php echo $gender;?>"></td>
			</tr>
			<tr>
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<td><button type="submit" name="update" value="Update" class="button">Update</button></td>
			</tr>
		</table>
	</form>
</body>
</html>
