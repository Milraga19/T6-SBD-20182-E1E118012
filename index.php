<?php
	
	$koneksi = mysqli_connect("localhost", "root", "", "db_index");

?>

<h1>CRUD (Create Read Update Delete</h1>

<form action="" method="post">
	Nama : <input type="text" name="Nama"><br>
    Tempat Lahir : <input type="text" name="Tempat_Lahir"><br>
    Tanggal lahir : <input type="date" name="Tanggal_Lahir"><br>
    Alamat : <input type="text" name="Alamat"><br>
    Pend. Terakhir : <select><option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option></select><br>
    <input type="submit" name="Simpan" value="Simpan">
</form>

<table border="1">
    <thead>
    	<th>Id</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Pend. Terakhir</th>
        <th>Aksi</th>
    </thead>
    <tbody>
    <!-- lihat data yang ada dalam database-->
        <?php
            $sqlView = "SELECT * FROM `data_diri`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td><?=$data[5] ?></td>
            <td><?=$data[6] ?></td>
            <td><?=$data[7] ?></td>
            <td>
                <a href="#">Edit</a>
                <a href="index.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['Simpan'])){
        $sqlInput = "INSERT INTO `data_diri` ( `nama`, `tpt_lahir`, `tgl_lahir`, `alamat`, `pend_trkhr`)
                VALUES ('$_POST[nama]', '$_POST[tpt_lahir]', '$_POST[tgl_lahir]', '$_POST[alamat]', '$_POST[pend_trhkr]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);

        if($cekInput){
            // echo "Data telah diinputkan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Data gagal diinputkan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `data_diri` WHERE
        `nama`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Data telah dimasukkan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Data gagal terhapus";
        }
    }
?>