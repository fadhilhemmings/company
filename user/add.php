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

<html>
<head>
	<title>Add rcv_ranap</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">  
  <script src="assets/bootstrap/js/bootstrap.js"></script>
</head>
 
<body>
<div class="container">
	<form action="add.php" method="post" name="form1">
		<div class="form-group">
			<label for="no_karcis">no_karcis:</label>
			<input class="form-control" type="varchar" name="no_karcis">
		</div>
		<div class="form-group">
			<label>no_rm</label>
			<input class="form-control" type="varchar" name="no_rm">
		</div>
		<div class="form-group">
			<label>kd_tindakan</label>
			<input class="form-control" type="varchar" name="kd_tindakan">
		</div>
		<div class="form-group">
			<label> qty</label>
			<input class="form-control" type="int" name="qty">
		</div>
		<div class="form-group">
			<label> dokter</label>
			<input class="form-control" type="int" name="dokter">
		</div>	
		<div class="form-group">
			<label>penjamin</label>
			<input class="form-control" type="int" name="penjamin">
		</div>
		<div class="form-group">
			<div></div>
			<input class="btn btn-success" type="submit" name="Submit" value="Add">
		</div>
	</form>
<?php

	if(isset($_POST['Submit'])) {
		$no_karcis = $_POST['no_karcis'];
		$no_rm = $_POST['no_rm'];
		$kd_tindakan = $_POST['kd_tindakan'];
		$qty = $_POST['qty'];
		$dokter = $_POST['dokter'];
		$penjamin = $_POST['penjamin'];
		

		include_once("../config.php");
				
		// masukan data ke tabel
		$result = mysqli_query($mysqli,"INSERT INTO rcv_ranap (no_karcis, no_rm, kd_tindakan, qty, dokter, penjamin) VALUES('$no_karcis', '$no_rm', '$kd_tindakan', '$qty', '$dokter', '$penjamin')");
		
		// pop up saat berhasil menambahkan
		echo "User added successfully. <a href='index.php'>View rcv_ranap</a>";
}

?>

</div>
</body>
</html>