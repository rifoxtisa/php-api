<?php 
	require 'hapus1.php';
	$id = $_GET["id"];
	if (delete($id) > 0) {
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'hapus1.php';
			</script>
		";
	}
 ?>