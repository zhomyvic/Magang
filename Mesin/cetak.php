<?php
include('daftarmenu.php');

function getHarga($daftarmenu, $menu){
$harga= 0;
	foreach($daftarmenu as $item){
		if ($item["nama"] == $menu) {
			$harga = $item["harga"];
			break;
			
		}	

	}
	  
	return $harga;
}

$keranjang = $_POST['menu'];

$hargaTotal = 0;

	foreach ($keranjang as $pesanan) {
		$harga         = getHarga($daftarmenu, $pesanan["nama"]);
		$jumlahPesanan = $pesanan["jumlah"];
		$subtotal      = $harga * $jumlahPesanan;
		$hargaTotal += $subtotal;
	
echo "Nama ".$pesanan["nama"]."</br>";
	echo "Jumlah Pesan ".$pesanan["jumlah"]."</br>";
    echo "Harga Rp. ".getHarga($daftarmenu, $pesanan["nama"])."</br>";
    echo "Total Per item Rp. ".$subtotal."</br>";
    echo "</br>";	
	}

echo "Total Keseluruhan : Rp. ". $hargaTotal;
?>

