<?php 
$conn = mysqli_connect("localhost", "root", "", "php-api");
function create($data) {
		global $conn;
		$username = htmlspecialchars($data["username"]);
		$password = htmlspecialchars($data["password"]);
		$level = htmlspecialchars($data["level"]);
		$fullname = htmlspecialchars($data["fullname"]);
		$query = "INSERT INTO users
					VALUES
						('', '$username', '$password', '$level', '$fullname')		
				";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
	if (isset($_POST["submit"])) {
		if (create($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!');
					document.location.href = 'index.php';
				</script>
			";
		}	else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!');
					document.location.href = 'input.php';
				</script>
			";
		}		
	};
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Rivo Oktisa</title>
 </head>
 <body>
 	
	<form action="" method="post" enctype="multipart/form-data">
		<label for="username">username : </label>
		<input type="text" name="username" id="username" required>
		<br>
		<br>
		<label for="password">password : </label>
		<input type="password" name="password" id="password" required>
		<br>
		<br>
		<label for="level">level : </label>
		<input type="text" name="level" id="level" required>
		<br>
		<br>
		<label for="fullname">fullname : </label>
		<input type="text" name="fullname" id="fullname" required>
		<br>
		<br>
		<button type="submit" name="submit">Tambah</button>
	</form>

 </body>
 </html>