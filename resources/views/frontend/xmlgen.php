<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$server = "localhost";
$username = "root";
$password = "mysql";
$database = "db_kertabumi";

$kon = mysqli_connect($server, $username, $password);

if (!$kon) {

	die ("Koneksi DataBase Gagal");

}

mysqli_select_db($kon, $database) or die ("DataBase Tidak Tersedia");


$myFile = "kertabumi.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 

$rss_txt ="";
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
 $rss_txt .= '<kertabumi>'.PHP_EOL;
 $query = mysqli_query($kon, "SELECT * FROM kemejas");
 while($values_query = mysqli_fetch_assoc($query)) {
 $rss_txt .= '    <kemejas>'.PHP_EOL;
 $rss_txt .= '        <id>' .$values_query['id']. '</id>'.PHP_EOL;
 $rss_txt .= '        <nama_kemeja>' .$values_query['nama_kemeja']. '</nama_kemeja>'.PHP_EOL;
 $rss_txt .= '        <harga>' .$values_query['harga']. '</harga>'.PHP_EOL;
 $rss_txt .= '        <kategori>' .$values_query['kategori']. '</kategori>'.PHP_EOL;
 $rss_txt .= '        <uk_s>' .$values_query['uk_s']. '</uk_s>'.PHP_EOL;
 $rss_txt .= '        <uk_m>' .$values_query['uk_m']. '</uk_m>'.PHP_EOL;
 $rss_txt .= '        <uk_l>' .$values_query['uk_l']. '</uk_l>'.PHP_EOL;
 $rss_txt .= '        <uk_xl>' .$values_query['uk_xl']. '</uk_xl>'.PHP_EOL;
 $rss_txt .= '        <bahan>' .$values_query['bahan']. '</bahan>'.PHP_EOL;
 $rss_txt .= '        <keterangan>' .$values_query['keterangan']. '</keterangan>'.PHP_EOL;
 $rss_txt .= '        <file>' .$values_query['file']. '</file>'.PHP_EOL;
 $rss_txt .= '    </kemejas>'.PHP_EOL;	
 }
$rss_txt .= '</kertabumi>'.PHP_EOL;

fwrite($fh, $rss_txt);
fclose($fh);

?>