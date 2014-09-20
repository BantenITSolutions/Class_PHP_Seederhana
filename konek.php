<?php
class konek
{
public $host;
public $user;
public $pass;
public $perintah;
public $database;
public $koneksi;

	function __construct()
	{
		$this->host="localhost";
		$this->user="root";
		$this->pass="";
		$this->koneksi=mysql_connect($this->host,$this->user,$this->pass);
		if(!$this->koneksi)
		{
			echo "Koneksi gagal";
			exit();
		}
		
		$this->database="db_oop";
		$q=mysql_select_db($this->database,$this->koneksi);
		if(!$q)
		{
			echo "Database tidak ditemukan";
		}
	}

	public function insert($tbl,$kol,$isi)
	{
		$this->perintah="insert into ".$tbl." (".$kol.") values (".$isi.")";
		$q=mysql_query($this->perintah);
		if(!$q)
		{
			echo "Gagal";
			exit();
		}
	}

	public function update($tbl,$isi,$kol,$fil)
	{
		$this->perintah="update ".$tbl." set ".$isi." where ".$kol."='".$fil."'";
		$q=mysql_query($this->perintah);
		if(!$q)
		{
			echo "Gagal";
			exit();
		}
	}

	public function hapus($tbl,$kol,$isi)
	{
		$this->perintah="delete from ".$tbl." where ".$kol."='".$isi."'";
		$q=mysql_query($this->perintah);
		if(!$q)
		{
			echo "Gagal";
			exit();
		}
	}

	public function select($tbl,$kol)
	{
		$this->perintah=mysql_query("select ".$kol." from ".$tbl."");
		return $this->perintah;
	}

	public function edit($tbl,$kol,$kd)
	{
		$this->perintah=mysql_query("select * from ".$tbl." where ".$kol."='".$kd."'");
		return $this->perintah;
	}

	function __destruct()
	{
		$this->perintah=mysql_close($this->koneksi);
		return $this->perintah;
	}
}

?>

