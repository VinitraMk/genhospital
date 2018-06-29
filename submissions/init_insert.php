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
			$sql='INSERT INTO user VALUES("'.$user.'","'.$passwd.'")';
			$sel = mysqli_query($conn,$sql);
                        $res = mysqli_query($conn,"SELECT * FROM user");
			if($sel) {
				echo "Inserted user successfully!<br/><br/>";
				while($row = mysqli_fetch_assoc($res)){
					echo $row['username']." ".$row['password']."<br>";
				}                                
            }
			else
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	}
?>