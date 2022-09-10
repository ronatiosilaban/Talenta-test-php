<html>
<head>
	<title>Add Data</title>
</head>
<style>
	
img{
	width:400px;
}
.add{
	margin-left:35vw;
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
button{
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
	<br/><br/>
	<h2>Add New Data</h2>
	<form action="add.php" method="post" name="form1" class='add'>
		<table width="25%" border="0" class="new">
			<tr class="out"> 
				<!-- <td class="out">Name </td> -->
				<td><label class="out">Name :<label><input type="text" name="name" class="input "></td>
			</tr>
			<tr class="out"> 
				<!-- <td>Age   </td> -->
				<td><label class="out">Age :<label><br/><input type="text" name="age" class="input"></td>
			</tr>
			<tr class="out"> 
				<!-- <td>gender </td> -->
				<td><label class="out">Gender :<label>
					<br/><input type="text" name="gender" class="input log"></td>
			</tr>
			<tr> 
				
				<td><button type="submit" name="Submit" value="Add" class="button"><a href="index.php"></a>Submit</button></td>
			</tr>
		</table>
	</form>
</body>
</html>

