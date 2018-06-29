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
			$sql="DELETE FROM user WHERE username='$user'";
                        $res = mysqli_query($conn,$sql);
			if($res) {
				echo "Successfully deleted user!<br/><br/>";
                                $sel = mysqli_query($conn,"SELECT * FROM user");
                                while($row=mysqli_fetch_assoc($sel)) {
                                    echo $row['username']." ".$row['password']."<br>";
                                }
                        }
			else
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	}
?>