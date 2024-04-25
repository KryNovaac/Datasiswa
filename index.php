<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="aset/css/style.css">
</head>
<body>

<div class="container">
<h1>Masukan Data Siswa</h1>
<form action="?aksi=tambah" method="post">
<label for="nama">Nama :</label>
<input type="text" id="nama" name="nama" required><br></br>
<label for="nama">Nis :</label>
<input type="number" id="nis" name="nis" required><br></br>
<label for="rayon">Rayom :</label>
<input type="text" id="rayon" name="rayon" required><br></br>
<button type="submit" name="kirim" value="kirim" >Submit</button>
<button type="submit" name="kirim" value="kirim" ><a href="index2.php">Cetak</a></button>
<button type= "submit" value="cetak"><a href= 'index2.php'>Hapus data</a></button>
</form>

<?php
class Siswa {
    public $nama;
    public $nis;
    public $rayon;

    public function __construct($nama, $nis, $rayon) {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->rayon = $rayon;
    }
}

class DataSiswa extends Siswa {
    public function tambahData() {
        $_SESSION['dataSiswa'][] = $this;
    }

    public static function hapusData($index) {
        unset($_SESSION['dataSiswa'][$index]);
    }
}

session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] === 'tambah' && isset($_POST['nama'], $_POST['nis'], $_POST['rayon'])) {
        $siswa = new DataSiswa($_POST['nama'], $_POST['nis'], $_POST['rayon']);
        $siswa->tambahData();
    } elseif ($_GET['aksi'] === 'hapus' && isset($_GET['index'])) {
        DataSiswa::hapusData($_GET['index']);
    }if(isset($_POST['reset'])){
        session_destroy();
        header('http://localhost/dataSiswa/index2.php');
        exit;
    }
}

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '</tr>';

foreach ($_SESSION['dataSiswa'] as $key => $value) {
    echo '<tr>';
    echo '<td>' . $value->nama . '</td>';
    echo '<td>' . $value->nis . '</td>';
    echo '<td>' . $value->rayon . '</td>';
    echo '<td><a href="?aksi=hapus&index='.$key.'" class="btn btn-danger btn-sm">Hapus</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
</div>  
</body>
</html>
