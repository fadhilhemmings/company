<html>
<head>
    <link rel="stylesheet" href= "assets/fontawesome/css/all.min.css">
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">  
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class = "navbar-brand" href ="#">Tugas</a>
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
            </ul>
        </div>
    </nav>
</body>
</html>

<?php
//include database
include_once("../config.php");

	if(isset($_POST['kata_cari'])){
		$kata_cari = $_POST['kata_cari'];
	} else {
		$kata_cari = '';
	}
	$result = mysqli_query($mysqli, "SELECT * FROM perusahaan WHERE NAMA_PRSH like '%$kata_cari%' or ALAMAT like '%$kata_cari%' or TLP like '%$kata_cari%' or EMAIL like '%$kata_cari%' ");

	$results_per_page = 3;
	$number_of_result = mysqli_num_rows($result);
	$number_of_page = ceil ($number_of_result / $results_per_page);  

	if (isset ($_GET['page'])) {  
		$page = $_GET['page'];  
	} else {  
		$page = 1;
	}
	$page_first_result = ($page -1) * $results_per_page;

	$result_page = mysqli_query($mysqli, "SELECT * FROM perusahaan WHERE NAMA_PRSH like '%$kata_cari%' or ALAMAT like '%$kata_cari%' or TLP like '%$kata_cari%' or EMAIL like '%$kata_cari%' LIMIT $page_first_result, $results_per_page");
	$no = 0*$page_first_result;
?>

<form method="GET" action="index.php" style="text-align: left;">
        <label>Kata Pencarian : </label>
        <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
        <button type="submit">Cari</button>
    </form>

<html>
<head>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">  
	<script src="assets/bootstrap/js/bootstrap.js"></script>
</head>
<body><br><br>
<div class="container">
<a href="add.php">Add New</a><br/><br/>
<div class="table-responsive">
	<table class="table table-hover" >
		<tr>
			<th> PERUSAHAAN </th>
			<th> ALAMAT </th>
			<th>TLP</th>
			<th> EMAIL </th>
			<th colspan="2">UPDATE</th>
			
		</tr>
		
		
		<?php 
			while($user_data = mysqli_fetch_array($result_page)) {
				echo "<tr>";
				echo "<td>".$user_data['NAMA_PRSH']."</td>";
				echo "<td>".$user_data['ALAMAT']."</td>";
				echo "<td>".$user_data['TLP']."</td>";
				echo "<td>".$user_data['EMAIL']."</td>";
				echo "<td><a href='edit.php?id=$user_data[KODE]'>Edit</a></td>";
				echo "<td><a href='delete.php?id=$user_data[KODE]'>Delete</a></td></tr>";
			}
		?>
	</table>
<?php
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "index.php?page=' . $page . '">' . $page . ' </a>';}
	
?>
</body>
</html>