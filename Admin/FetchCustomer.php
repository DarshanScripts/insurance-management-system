<?php
include_once '../Database/DBConnection.php';

$email = $_POST['email'];

$sql = "SELECT * FROM User WHERE email LIKE '$email%'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows < 1)
	echo "<h4 align='center'>Email not exist!</h4>";
else {

	$output = "";

	$output = " <table align='center' cellpadding='10' cellspacing='0'>
				<tr>
					<th>User Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Id</th>
					<th>Action</th>
				</tr>";
	while ($row = mysqli_fetch_array($result)) {
		if ($row['userType'] == 'U')
			$output .= "<tr>
							<td>" . $row['uId'] . "</td>
							<td>" . $row['firstName'] . "</td>
							<td>" . $row['lastName'] . "</td>
							<td>" . $row['email'] . "</td>
							<td>
								<button type='submit' name='btnEdit' value='" . $row['uId'] . "'>Edit</button>&ensp;
								<button type='submit' name='btnDel' value='" . $row['uId'] . "'>Delete</button>
							</td>
						</tr>";
	}
	$output .= "</table>";
	echo $output;
}
