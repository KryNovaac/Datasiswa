<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="aset/css/dua.css">
</head>
<body>
    <h2>Data Siswa</h2>
    <form action="" method="post">
    <button type= "submit" value="cetak"><a href= 'index.php'>Kembali</a></button>
    <div class="satu    ">
    <?php

session_start();

echo '<table border="1">';
echo '<tr>';
echo '<th>Nama</th>';
echo '<th>Nis</th>';
echo '<th>Rayon</th>';
echo'</tr>';

    foreach($_SESSION['dataSiswa'] as $index => $value){
        echo '<tr>';
        echo '<td>'. $value->nama .'</td>';
        echo '<td>'. $value->nis .'</td>';
        echo '<td>'. $value->rayon .'</td>';
        echo '</tr>';
}
    echo '<table/>';

?>
    </div>
 
</body>
</html>
