<?php
class Barang{
	private  $judul,
			$penulis,
			$penerbit,
			$harga,
			$diskon;
	public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
	}
	public function setDiskon($diskon){
		$this->diskon = $diskon;
	}
	public function getDiskon(){
		return $this->diskon;
	}
	public function getLabel(){
		return "$this->penulis |  $this->penerbit";
	}
	public function getInfoProduk(){
		$str = "{$this->judul} | {$this->getLabel()} (Rp.{$this->harga})";
		return $str;
	}
	public function getJudul(){
		return $this->judul;
	}
	public function setJudul($judul){
		$this->judul = $judul;
	}
	public function setPenulis($penulis){
		$this->penulis = $penulis;
	}
	public function getPenulis(){
		return $this->penulis;
	}
	public function setPenerbit($penerbit){
		$this->penerbit = $penerbit;
	}
	public function getPenerbit(){
		return $this->penerbit;
	}
	public function setHarga($harga){
		$this->harga = $harga;
	}
	public function getHarga(){
	return $this->harga - ($this->harga * $this->diskon / 100);

	}

}
class Komik extends Barang{
	public $jmlhalaman;

	public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlhalaman = 0){
		parent::__construct($judul, $penulis, $penerbit, $harga);
		$this->jmlhalaman = $jmlhalaman;
	}
	public function getInfoProduk(){
		$str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlhalaman} Halaman.";
		return $str;
	}
}
class Game extends Barang{
	public $waktumain;

	public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktumain = 0){
		parent::__construct($judul, $penulis, $penerbit, $harga);
		$this->waktumain = $waktumain;
	}
	public function getInfoProduk(){
		$str = "Game :  "  . parent::getInfoProduk() . " - {$this->waktumain} Jam.";
		return $str;
	}
}
class CetakInfoProduk{
	public function cetak(Barang $barang){
		$str = "{$barang->judul} | {$barang->getLabel()} (Rp.{$barang->harga})";
		return $str;
	}
}
$barang1 = new Komik("Naruto","Masashi Kishimoto","Shonen Jump", 30000, 100);
$barang2 = new Game("Grand Theft Auto","Dan Houser","Rockstar Games",450000, 50);

echo $barang1->getInfoProduk();
echo "<br>";
echo $barang2->getInfoProduk();
echo "<hr>";

$barang2->setDiskon(50);
echo $barang2->getHarga();
echo "<hr>";
$barang1->setPenulis("AzrilRizkiSaputra");
echo $barang1->getPenulis();