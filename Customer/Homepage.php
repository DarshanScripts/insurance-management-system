<?php
session_start();

if (isset($_SESSION['sesLogin']['btnLogin'])) {
	$uId = $_SESSION['sesLogUser']['uId'];

	if (isset($_POST['btnBuy'])) {
		print_r($_POST);
		require_once '../Database/DBConnection.php';
		$sql = "INSERT INTO PurchasedPlans VALUES(?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('iis', $uId, $pId, $purchasedDate);
		$pId = $_POST['btnBuy'];
		$purchasedDate = date('Y-m-d h-i-s');
		$stmt->execute();
		if ($stmt)
			echo "<script>alert('Plan purchased Successful!');window.location.replace('./Homepage.php');</script>";
		else
			echo "<script>alert('Plan not purchased!');</script>";
	}
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<title>ABC Insurance</title>
		<!-- <link rel="stylesheet" href="../assets/style.css"> -->
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
		<style>
			a {
				font-size: 25px;
				float: right;
				padding-right: 40px;
				padding-top: 15px;
			}
		</style>
	</head>

	<body>
		<h1>
			&emsp;ABC Insurance
			<a href="../Logout.php">Logout</a>
			<a href="./UpdateProfile.php">Update Profile</a>
		</h1>
		<hr>
		<h3 align='center'>Health Plans</h3>
		<form method="POST">
			<?php
			require_once '../Database/DBConnection.php';
			$output = "";
			$output .=  "<table cellspacing='30px' cellpadding='30px' align='center'>
						<tr>
							<th>Plan Id</th>
							<th>Plan Name</th>
							<th>Plan Price</th>
							<th>Action</th>
						</tr>
					";
			$sql = "SELECT * FROM InsurancePlan";
			$result = mysqli_query($conn, $sql);


			while ($row = $result->fetch_assoc()) {
				$sql2 = "SELECT * FROM PurchasedPlans WHERE puId = ? AND ppId = ?";
				$stmt = $conn->prepare($sql2);
				$stmt->bind_param('ii', $uId, $ppId);
				$ppId = $row['pId'];
				$stmt->execute();
				$result2 = $stmt->get_result();

				if ($result2->num_rows > 0)
					$status = " disabled";
				else
					$status = "";

				$output .=  "<tr>
							<td>" . $row['pId'] . "</td>
							<td>" . $row['pName'] . "</td>
							<td>" . $row['price'] . "</td>
							<td><button type='submit' name='btnBuy' value='" . $row['pId'] . "' " . $status . ">Buy Plan</button</td>
						</tr>";
			}

			echo $output;
			?>
		</form>
	</body>

	</html>
<?php
} else
	echo "Please <a href='../Login.php'>Login</a> first!";
?>