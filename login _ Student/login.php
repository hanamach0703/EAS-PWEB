<?php
    include('config.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $flag = 0;

        $sql = "SELECT * FROM siswa WHERE username='".$username."' AND pwd='".md5($password)."'";
        $query=mysqli_query($db,$sql) or die("SQL error, $sql");

        $jumlah_data = mysqli_num_rows($query);

        if($jumlah_data > 0){
            
            //echo "<script> alert('Login Berhasil!'); </script>";
            //echo "<p>Data ditemukan : $jumlah_data, $sql</p>";
            $data = mysqli_fetch_assoc($query);

            session_start();
            
            $_SESSION['id']= session_id();
            $_SESSION['nama']=$data['nama'];
            $_SESSION['alamat']=$data['alamat'];
            $_SESSION['jenis_kelamin']=$data['jenis_kelamin'];
            $_SESSION['agama']=$data['agama'];
            $_SESSION['sekolah_asal']=$data['sekolah_asal'];
            $_SESSION['foto']=$data['foto'];

            $flag = 1;
            
            
        }else{
            //echo "<script> alert('Login Tidak Berhasil!'); </script>";
            //echo "<p>Data ditemukan : $jumlah_data, $sql</p>";
        }

        if($flag == 1){
            header('Location: landing.php?status=sukses');
        }
    }
?>