 <?php 
$conn = mysqli_connect("localhost", "root", "", "php-api");
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

function update($data) {
		global $conn;
		
		$id = $data["id"];
		$username = htmlspecialchars($data["username"]);
		$password = htmlspecialchars($data["password"]);
		$level = htmlspecialchars($data["level"]);
		$fullname = htmlspecialchars($data["fullname"]);
		$query = "UPDATE users SET 
					username = '$username',
					password = '$password',
					level = '$level',
					fullname = '$fullname'
				WHERE id = $id				
				";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
 ?>
 <html>
 	<head>
 		<title></title>
 	</head>
 	<body>
 			<div>
 				<table border="1px" cellpadding="10" cellspacing="0">
 					<tr>
 						<td bgcolor="#fc83c1" align="center">Id</td>
 						<td bgcolor="#fc83c1" align="center">Username</td>
 						<td bgcolor="#fc83c1" align="center">Password</td>
 						<td bgcolor="#fc83c1" align="center">Level</td>
 						<td bgcolor="#fc83c1" align="center">Fullname</td>
 						<td bgcolor="#fc83c1" align="center">Action</td>
 					</tr>
 					<?php foreach($students as $student) : ?>
			 			<tr>
			 				<td><?= $student["id"] ?></td>
			 				<td><?= $student["username"] ?></td>
			 				<td><?= $student["password"] ?></td>
			 				<td><?= $student["level"] ?></td>
			 				<td><?= $student["fullname"] ?></td>
				 			<td><a href="formUp.php?id=<?= $student["id"] ?>">Update</a> | <a >Hapus</a></td>
			 			</tr>
			 		<?php endforeach; ?>
 				</table>
 			</div>
 			<div></div>
 		</div>
 	</body>	
 </html>