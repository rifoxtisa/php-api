<?php
$conn = mysqli_connect("localhost", "root", "", "php-api");
if (!$conn) {
    die("Koneksinya Gagal: " . mysqli_connect_error());
}

function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$box = [];
		while ($data = mysqli_fetch_assoc($result)) {
			$box[] = $data;
		}
		return $box;
	}
$students = query("SELECT * FROM users");	
?>


<html>
	<head>
		<title></title>
	</head>
	<body>
		<table border="1px" cellpadding="10" cellspacing="0">
	 		<tr>
	 			<td bgcolor="#fc83c1" align="center">Id</td>
	 			<td bgcolor="#fc83c1" align="center">Username</td>
	 			<td bgcolor="#fc83c1" align="center">Level</td>
	 			<td bgcolor="#fc83c1" align="center">Fullname</td>
	 		</tr>
	 		<?php foreach($students as $student) : ?>
				 <tr>
				 	<td><?= $student["id"] ?></td>
				 	<td><?= $student["username"] ?></td>
				 	<td><?= $student["level"] ?></td>
				 	<td><?= $student["fullname"] ?></td>
				 </tr>
				<?php endforeach; ?>
	 	</table>
 	</body>
</html>