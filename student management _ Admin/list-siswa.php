<html>
<head>
	<title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		table, td {
			font-family: cursive;
			font-size: large;
			background-color: #FFD18B;
			text-align: center;
		}
	</style>
</head>
<body style="background-image: url('img/cta-banner.jpg')">
	<header>
		<br>
        <center>
        <h1 style="color: #FFA41D; font-family: cursive;">Student Management</h1>
    	</center>
    </header>

 	<br>

	<center>
		<table border="2" width="80%">
		<tr style="background-color:#FFA41D">
			<th >PHOTO</th>
			<th>NIS</th>
			<th>NAME</th>
			<!-- <th>Jenis Kelamin</th>
			<th>Telepon</th>
			<th>Alamat</th> -->
			<th colspan="2">ACTION</th>
		</tr>
		<?php
		// Load file koneksi.php
		include "koneksi.php";

		// Buat query untuk menampilkan semua data siswa
		$sql = $pdo->prepare("SELECT * FROM siswa");
		$sql->execute(); // Eksekusi querynya

		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
			echo "<tr>";
			echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
			echo "<td>".$data['nis']."</td>";
			echo "<td>".$data['nama']."</td>";
			// echo "<td>".$data['jenis_kelamin']."</td>";
			// echo "<td>".$data['telp']."</td>";
			// echo "<td>".$data['alamat']."</td>";
			echo "<td><a href='form_ubah.php?id=".$data['id']."'>View</a></td>";
			echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Delete</a></td>";
			echo "</tr>";
		}
		?>
		</table>
	</center>
	
	<br>
	<center><a href="index.php" class="btn btn-primary" style="background-color:#FFA41D; font-size: larger;">Back</a></center> 
	<br>
</body>
</html>
