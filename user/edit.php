<html>
<head>
    <link rel="stylesheet" href= "assets/fontawesome/css/all.min.css">
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">  
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class = "navbar-brand" href ="../#">Tugas</a>
        <button class = "navbar-toggler" data-toggle="collapse" data-target = "#collapsibleNavbar" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class = "navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" type="button" href="../user"> User </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" href = "../perusahaan"> perusahaan </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" type="button" href = "../icd10"> icd10 </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>

<?php
include_once("../config.php");

if(isset($_POST['update']))
{		
	$no_karcis = $_POST['no_karcis'];
	$no_rm = $_POST['no_rm'];
	$kd_tindakan = $_POST['kd_tindakan'];
	$qty = $_POST['qty'];
	$dokter = $_POST['dokter'];
	$penjamin = $_POST['penjamin'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE rcv_ranap SET no_rm='$no_rm',kd_tindakan='$kd_tindakan', qty='$qty', dokter='$dokter', penjamin='$penjamin' WHERE no_karcis='$no_karcis'");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
} 

$no_karcis = $_GET['no_karcis'];


$result = mysqli_query($mysqli, "SELECT * FROM rcv_ranap WHERE no_karcis='$no_karcis'");

while($user_data = mysqli_fetch_array($result))
{
	$no_karcis = $user_data['no_karcis'];
	$no_rm = $user_data['no_rm'];
	$kd_tindakan = $user_data['kd_tindakan'];
	$qty = $user_data['qty'];
	$dokter = $user_data['dokter'];
	$penjamin = $user_data['penjamin'];
}
?>

<html>
<head>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">  
    <script src="assets/bootstrap/js/bootstrap.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit User Data</title>
</head>
<body>
<div class="container">
	<a href="index.php">Home</a>
	<br/><br/>
	<form action="edit.php" method="post" name="form1">
	<div class="form-group">
			<label for="no_karcis">no_karcis:</label>
			<input class="form-control" type="varchar" name="no_karcis" value=<?php echo $no_karcis;?>>
		</div>
		<div class="form-group">
			<label>no_rm</label>
			<input class="form-control" type="varchar" name="no_rm" value=<?php echo $no_rm;?>>
		</div>
		<div class="form-group">
			<label>kd_tindakan</label>
			<input class="form-control" type="varchar" name="kd_tindakan" value=<?php echo $kd_tindakan;?>>
		</div>
		<div class="form-group">
			<label> qty</label>
			<input class="form-control" type="int" name="qty" value=<?php echo $qty;?>>
		</div>
		<div class="form-group">
			<label> dokter</label>
			<input class="form-control" type="int" name="dokter" value=<?php echo $dokter;?>>
		</div>	
		<div class="form-group">
			<label>penjamin</label>
			<input class="form-control" type="int" name="penjamin" value=<?php echo $penjamin;?>>
		</div>

			<div class="form-group"> 
				<div></div>
				<input type="hidden" name="no_karcis" value=<?php echo $_GET['no_karcis'];?>>
				<input class="btn btn-success" type="submit" name="update" value="Update">
			</div>
	
	</form>

</body>
</html>