<html>
<head>
	<title>Admin</title>
	<style>
		table, td{
			font-family: cursive;
			font-size: medium;
			background-color: white;
			/* text-align: center; */
		}
	</style>
</head>
<body style="background-color: #FFA41D">
	<center>
		<br>
		<h1 style="font-family: cursive">Student Detail</h1>
		<br>
		<?php
		// Load file koneksi.php
		include "koneksi.php";

		// Ambil data NIS yang dikirim oleh index.php melalui URL
		$id = $_GET['id'];

		// Query untuk menampilkan data siswa berdasarkan ID yang dikirim
		$sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute(); // Eksekusi query insert
		$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
		?>
		<form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
			<table cellpadding="8">
				<tr>
					<td>NIS</td>
					<td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
					<?php
					if($data['jenis_kelamin'] == "Laki-laki"){
						echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
						echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
					}else{
						echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
						echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
					}
					?>
					</td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
				</tr>
				<tr>
					<td>Photo</td>
					<td>
						<input type="file" name="foto">
					</td>
				</tr>
			</table>

			<hr>
			<input style="background-color:white; font-family: cursive; color:black" type="submit" value="Edit">
			<a href="list-siswa.php"><input style="background-color:black; font-family: cursive; color:white" type="button" value="Cancel"></a>
		</form>
	</center>
</body>
</html>
