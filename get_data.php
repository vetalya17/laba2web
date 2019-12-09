<?php
		require_once 'connection.php';
		$link = mysqli_connect('localhost', 'root', '', 'lb1')
			or die("Error" . mysqli_error($link));
		$query = "SELECT users.id,users.first_name,users.last_name,users.email,roles.title,users.password FROM users LEFT JOIN roles ON users.role_id = roles.id";
		$result = mysqli_query($link,$query) 
			or die ("Error" .mysqli_error($link));

		$rows = mysqli_num_rows($result);

		$data;

		for ($i = 0; $i < $rows; ++$i) {
			$data[$i] = mysqli_fetch_row($result);
		}
		echo json_encode($data);
			
		/*echo "<table border = 8>
			<tr>
			<th>ID</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>
			<th>Role</th>
			</tr>"; 

		for ($i = 0 ; $i < $rows ; ++$i) {
		    $row = mysqli_fetch_row($result);
		    echo "<tr>";
		        for ($j = 0 ; $j < 5 ; ++$j) {
					echo "<td>$row[$j]</td>";
				}
			echo "</tr>";
		}
		echo "</table>";*/