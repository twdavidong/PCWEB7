		<?php
			$postUser = $_GET['name'];
			$query = "SELECT id FROM users WHERE name = '$postUser'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			$userid = $row['id'];
		?>