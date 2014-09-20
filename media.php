<?php
require 'konek.php';
$as=new konek();

if ($_GET[modul]=="home"){
?>
<html>
<head>
<title>Class PHP Sederhana</title>
<style>
body{
font-family:Tahoma;
font-size:12px;
}
table{
border:1px dashed #666666;
font-size:12px;
}
tr{
background-color:#F2F1F0;
}
tr:hover{
background-color:#CCCCCC;
}
input{
padding:5px;
border:1px dashed #999999;
}
a{
color:#CC6600;
text-decoration:none;
}
a:hover{
color:#FF9900;
text-decoration:overline;
}
</style>
</head>

<body>
<form method="post" action="media.php?modul=insert">
<table cellpadding="10" cellspacing="2" align="center";>
<tr><td>No Induk</td><td><input type="text" name="no_induk" /></tr>
<tr><td>Nama Siswa</td><td><input type="text" name="nama" /></tr>
<tr><td></td><td><input type="submit" value="Simpan" /></tr>
</table>
</form>
<br />
<table cellpadding="10" cellspacing="2" align="center";>
<tr><td>No Induk</td><td>Nama Siswa</td><td colspan="2" align="center">Aksi</td></tr>
<?php
$isi = $as->select('tbl_siswa','*');
while($r=mysql_fetch_array($isi))
{
	echo "<tr><td>".$r[0]."</td><td>".$r[1]."</td><td><a href='media.php?modul=edit&no_induk=".$r[0]."'>Edit</a></td><td><a href='media.php?modul=hapus&no_induk=".$r[0]."'>Hapus</td></tr>";
}
//$fil = "no_induk";
//$kd = "1108";
//$isi = "nama_siswa='Gede Lumbung'";
//$as->insert("tbl_siswa",$fil,$isi);
//$as->update("tbl_siswa",$isi,$fil,$kd);
//$as->hapus("tbl_siswa","no_induk","1110");
?>
</table>
</body>
</html>
<?php
}
else if ($_GET[modul]=='insert'){
$isi = $_POST['no_induk'].",'".$_POST['nama']."'";
$fil = "no_induk,nama_siswa";
$as->insert("tbl_siswa",$fil,$isi);
?>
<script type="text/javascript">
	javascript:history.go(-1);
</script>
<?php
}
else if ($_GET[modul]=='hapus'){
$id = $_GET['no_induk'];
$as->hapus("tbl_siswa","no_induk",$id);
?>
<script type="text/javascript">
	javascript:history.go(-1);
</script>
<?php
}
else if ($_GET[modul]=='edit'){
$id = $_GET['no_induk'];
$isi = $as->edit('tbl_siswa','no_induk',$id);
while($r=mysql_fetch_array($isi))
{
	$no_induk = $r[0];
	$nama = $r[1];
}
?>
<html>
<head>
<title>Edit</title>
<style>
body{
font-family:Tahoma;
font-size:12px;
}
table{
border:1px dashed #666666;
font-size:12px;
}
tr{
background-color:#F2F1F0;
}
tr:hover{
background-color:#CCCCCC;
}
input{
padding:5px;
border:1px dashed #999999;
}
</style>
</head>
<body>
<form method="post" action="media.php?modul=update">
<table cellpadding="10" cellspacing="2" align="center";>
<tr><td>No Induk</td><td><input type="text" name="no_induk" readonly="readonly" value="<?php echo $no_induk; ?>" /></tr>
<tr><td>Nama Siswa</td><td><input type="text" name="nama" value="<?php echo $nama; ?>" /></tr>
<tr><td></td><td><input type="submit" value="Simpan" /></tr>
</table>
</form>
</body>
</html>
<?php
}
else if ($_GET[modul]=='update'){
$isi = $_POST['nama'];
$fil = "nama_siswa='".$isi."'";
$id = $_POST['no_induk'];
$kol = "no_induk";
$as->update("tbl_siswa",$fil,$kol,$id);
?>
<script type="text/javascript">
	javascript:history.go(-2);
</script>
<?php
}
?>
