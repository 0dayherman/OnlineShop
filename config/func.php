<?php

if(isset($_GET['add'])){

	$id = (int)$_GET['add'];
	$q = $db->query("SELECT id, jumlahbarang FROM tb_barang WHERE id='$id'");
	while($q_row = $q->fetch_assoc()){
		if($q_row['jumlahbarang'] != $_SESSION['cart_'.$_GET['add']] && $q_row['jumlahbarang'] > 0){
			$_SESSION['cart_'.$_GET['add']]+='1';
			header("Location: index.php");
		} else {
			echo '<script>alert("Maaf kak Produk habis :("); document.location="index.php";</script>';
		}
	}

}

function cart(){
	$total = 0;
	$sub = 0;
	foreach($_SESSION as $name => $value){
		if($value > 0){
			if(substr($name, 0, 5) == 'cart_'){
				$id = (int)substr($name, 5, (strlen($name)-5));
				 $konek = new mysqli("localhost","root","","db_tokoonline");
				$get = $konek->query("SELECT * FROM tb_barang WHERE id='$id'");
				
				while($get_row = $get->fetch_assoc()){
					$sub = $get_row['harga'] * $value;
					echo '&raquo; '.$get_row['namabarang'].' @ Rp. '.$get_row['harga'].' X '.$value.' = Rp. '.$sub.'<br>'; 
				}
			}
			$total += $sub;

		}
	}

	
}


?>