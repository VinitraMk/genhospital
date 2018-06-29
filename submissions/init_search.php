<?php
	$user="id1523543_mikasa";
	$server="localhost";
	$passwd="12345678";
	$db="id1523543_webquiz";
	$conn=new mysqli($server,$user,$passwd,$db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else {
		if(isset($_REQUEST["insert"]))
		{
			$user=$_REQUEST["user"];
			$passwd=$_REQUEST["pwd"];
			$sql='SELECT * from user WHERE username=".$user." AND password=".$passwd."';
			if(mysqli_query($conn, $sql))
				echo "Login Successful!";
			else
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	}
?>