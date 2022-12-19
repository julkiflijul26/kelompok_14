<?php
function rupiah($harga_buku){
	$hasil_rupiah = "Rp." . number_format($harga_buku);
	return $hasil_rupiah;
}
?>