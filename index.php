<?php  
		// $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=GWCourses', 'postgres', '');
		// echo "done";

		$db = parse_url(getenv("DATABASE_URL"));
		$pdo = new PDO("pgsql:" . sprintf(
		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		    $db["host"],
		    $db["port"],
		    $db["user"],
		    $db["pass"],
		    ltrim($db["path"], "/")
		));
		


		$sql = "SELECT * FROM account";
		$stmt = $pdo->prepare($sql);
		//Thiết lập kiểu dữ liệu trả về
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
				
	?>

<ul>
		<?php  
			foreach ($resultSet as $row) {
			echo '<li>' .
				$row['username'] . ' --' . $row['password'] . ' --' .$row['roleid'] 
				. '</li>';
			}
		?>
	</ul>


	<li>
		
		<div class=""><?= $row['username'] ?></div>
		<div class=""><?= $row['password'] ?></div>
		<div class=""><?= $row['roleid'] ?></div>
		<div class="clear-both"></div>
	</li>