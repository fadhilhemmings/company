<?php
//include database connection file
include_once("config.php");


//check if form is submitted for user update
if(isset($_POST['update']))
{
	$id = $_POST['id'];
	
	$name = $_POST['NAMA_PRSH'];
	$alamat = $_POST['ALAMAT'];
	$mobile = $_POST['TLP'];
	$email = $_POST['EMAIL'];
	
	//update user data
	$result = mysqli_query($mysqli, "UPDATE perusahaan SET NAMA_PRSH ='$name', ALAMAT='$alamat', TLP='$mobile', EMAIL='$email' WHERE KODE=$id");
	
	//Redirect to homepage to display updated user list
	header("Location: index.php");
}

//getting id from url
$id = $_GET['id'];


//Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM perusahaan WHERE KODE=$id");

while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['NAMA_PRSH'];
	$alamat = $user_data['ALAMAT'];
	$mobile = $user_data['TLP'];
	$email = $user_data['EMAIL'];
}

?>
<html>
<head>
	<title>Edit User Data</title>
</head>

<body> 
	<a href="index.php">Home</a>
	<br/><br/>
	<form action="edit.php" method="post" name="form1">
			<table>
				<tr>
					<td>NAMA PERUSAHAAN</td>
					<td><input type="text" name="NAMA_PRSH" value=<?php echo $name;?>></td>
				</tr>
				<tr>
					<td>ALAMAT</td>
					<td><input type="text" name="ALAMAT" value=<?php echo $alamat;?>></td>
				</tr>
				<tr>
					<td>TLP</td>
					<td><input type="int" name="TLP" value=<?php echo $mobile;?>></td>
				</tr>
				<tr>
					<td>EMAIL</td>
					<td><input type="text" name="EMAIL" value=<?php echo $email;?>></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
		
		</table>		
		
		</form>
</body>
</html>