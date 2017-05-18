<html>
<head>
<?php include('daftarmenu.php');?>
<script src="jquery-min.js"></script>
<script>
$(document).ready(function(){
	$i = 1;
    $("#pesan").click(function(){
    	var namaMenu = $("#pesanmenu").val();
    	var jumlah = $("#jumlah").val();
    	var hargaMenu  = $("#pesanmenu").find("option:selected").data('harga');
      var subtotal = (hargaMenu * jumlah);
    	var inputMenu   = "<input type='hidden' name='menu["+$i+"][nama]' value='"+namaMenu+"'>";
    	var inputHarga  = "<input type='hidden' name='menu["+$i+"][jumlah]' value='"+jumlah+"'>";
        $("#keranjang").append("<li>"+namaMenu+" Harga : Rp. "+hargaMenu+ " Jumlah "+jumlah+" Total Harga "+"Rp. "+subtotal+inputMenu+inputHarga+"</li>");
        $i++;
    });
});
</script>
</head>
<body>

<?php
echo "<h1>DAFTAR MENU </h1>";
foreach($daftarmenu as $data) {
echo "<td>". $data['nama']."</tr>";
echo "<td>"."Rp. ". $data['harga']."</br>";
echo "</tr>";
echo "</table>";
}
?>

<?php
echo "_________________________________________";
echo "<br>";
echo "<b><u>Data Pesanan</u></b>";
echo "<br>";	
echo "Nama Menu <br>";
?>

<select name="combobox1" id="pesanmenu">
  <option selected="selected">Pilih Satu</option>
  <?php
   foreach($daftarmenu as $data) {
   echo ("<option value='{$data['nama']}' data-harga='{$data['harga']}' >{$data['nama']}</option>");
    } ?>    
</select>  	

<input type="text" value="" id ="jumlah">
<button id="pesan">Pesan</button>
<form action="cetak.php" method="post">
<ol id = "keranjang"></ol>
<input type="submit" name="ok">
</form>


 </body>
 </html>

