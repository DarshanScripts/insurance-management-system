<?php
session_start();

if (isset($_SESSION['sesLogin']['btnLogin'])) {
	if (isset($_POST['btnEdit'])) {
		$_SESSION['sesCustId'] = $_POST['btnEdit'];
		header('location: ./EditCust.php');
	}
	if (isset($_POST['btnDel'])) {
		require_once '../Database/DBConnection.php';
		$sql = "DELETE FROM  WHERE uId = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('i', $uId);
		$uId = $_POST['btnDel'];
		$stmt->execute();
		if ($stmt)
			echo "<script>alert('Record Deleted Successfully!');window.location.replace('./Dashboard.php');</script>";
		else
			echo "<script>alert('Record not Deleted!');</script>";
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
			h1>a {
				font-size: 25px;
				float: right;
				padding-right: 40px;
				padding-top: 15px;
			}
		</style>
		<script src="../assets/jquery-3.2.1.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#search").keyup(function() {
					var input = $(this).val();
					$.ajax({
						url: './FetchCustomer.php',
						type: 'POST',
						data: {
							'email': input
						},
						success: function(data) {
							// console.log("Running");
							$("#result").html(data);
						}
					});
				});
			});
		</script>
	</head>

	<body>
		<h1>
			&emsp;ABC Insurance - Dashboard
			<a href="../Logout.php">Logout</a>
		</h1>
		<hr>
		<form method="POST">
			<center><input type="text" name="txtSearch" id="search" class="form-control w-25 m-3" placeholder="Search Customer by Email"></center>
			<div id="result"></div>
		</form>

	</body>

	</html>

<?php
} else
	echo "Please <a href='../Login.php'>Login</a> first!";
?>