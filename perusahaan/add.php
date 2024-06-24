<html>
	<body>
		<form action="add.php" method="post" name="form1">
			<table>
				<tr>
					<td>NAMA PERUSAHAAN</td>
					<td><input type="text" name="NAMA_PRSH"></td>
				</tr>
				<tr>
					<td>ALAMAT</td>
					<td><input type="text" name="ALAMAT"></td>
				</tr>
				<tr>
					<td>TLP</td>
					<td><input type="int" name="TLP"></td>
				</tr>
				<tr>
					<td>EMAIL</td>
					<td><input type="text" name="EMAIL"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="Submit" value="Add"></td>
				</tr>
		
		</table>		
		
		</form>
<?php
if(isset($_POST['Submit'])) {
	$NAMA_PRSH = $_POST['NAMA_PRSH'];
	$ALAMAT = $_POST['ALAMAT'];
	$TLP = $_POST['TLP'];
	$EMAIL = $_POST['EMAIL'];
	
	include_once("config.php");
	
	$result = mysqli_query($mysqli, "INSERT INTO perusahaan (NAMA_PRSH, ALAMAT, TLP, EMAIL) VALUES('$NAMA_PRSH', '$ALAMAT', '$TLP', '$EMAIL')");

	echo "perusahaan added successfully. <a href='index.php'>View Perusahaan</a>";
}
?>
	</body>

</html>