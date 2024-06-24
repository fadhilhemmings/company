<html>
<head>
    <link rel="stylesheet" href= "assets/fontawesome/css/all.min.css">
    <script src="../assets/jquery/jquery-3.6.0.min.js"></script>
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
                    <a class="nav-link" type="button" href="../icd10">icd10_bl</a>
                </li>
                <li>
                <form method="POST" action="index.php">
                    <label><right><font color="white">Kata Pencarian : </font></label>
                    <input type="text" name="kata_cari" value="<?php if(isset($_POST['kata_cari'])) { echo $_POST['kata_cari']; } ?>"  />
                    <button type="submit">Cari</button>
                </form>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>

<?php
include_once("../config.php");
    if(isset($_POST['kata_cari'])){
        $kata_cari = $_POST['kata_cari'];
    } else {
        $kata_cari = '';
    }
    $result = mysqli_query($mysqli, "SELECT * FROM rcv_ranap WHERE no_karcis like '%$kata_cari%' or no_rm like '%$kata_cari%' ");

    $results_per_page = 2;
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil ($number_of_result / $results_per_page);  

    if (isset ($_GET['page'])) {  
        $page = $_GET['page'];  
    } else {  
        $page = 1;
    }
    $page_first_result = ($page -1) * $results_per_page;

    $result_page = mysqli_query($mysqli, "SELECT * FROM rcv_ranap WHERE no_karcis like '%$kata_cari%' or no_rm like '%$kata_cari%' LIMIT $page_first_result, $results_per_page");
    $no = 0*$page_first_result;
?>

<html>
<head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">  
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</head>
<head>    
    <title>tts</title>
</head>
 
<body>
<div class="container">
	<link rel="stylesheet" href="style.css">
    <table width='80%' border=1>
    <a href="add.php" class="btn btn-primary">Add New Data</a><br><br>
    <div class="table-responsive">
    <table class="table table-hover" >
    
    <br/><br/>
    <tr>
        <th>no_karcis</th> <th>no_rm</th> <th>kd_tindakan</th> <th>qty</th> <th>dokter</th> <th>penjamin</th> <th>UPDATE</th> <th>DELETE</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result_page)) {         
        echo "<tr>";
        echo "<td>".$user_data['no_karcis']."</td>";
        echo "<td>".$user_data['no_rm']."</td>";
        echo "<td>".$user_data['kd_tindakan']."</td>";
        echo "<td>".$user_data['qty']."</td>";
        echo "<td>".$user_data['dokter']."</td>";
        echo "<td>".$user_data['penjamin']."</td>";
        echo "<td><a href='edit.php?no_karcis=$user_data[no_karcis]'>Edit</a></td>"; 
        echo "<td><a href='delete.php?no_karcis=$user_data[no_karcis]'>Delete</a></td></tr>";         
    }
    ?>
    </table>

    <nav>
		<ul class="pagination justify-content-left">
<?php
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<li class="page-item"><a class="page-link" href = "index.php?page=' . $page . '">' . $page . ' </a></li>';}
?>
        </ul>
    </nav>
</div>
</div>
</table>
</body>
</html>