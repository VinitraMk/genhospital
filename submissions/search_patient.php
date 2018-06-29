<?php
include 'config.php';
if(isset($_REQUEST["submit"])) {
    if(!$conn) {
		die("Connection failed: " . $conn->connect_error);
	} 
    else {
        $pid=$_REQUEST["search"];
        $query="SELECT * FROM Patient WHERE pid='$pid'";
        $res=mysqli_query($conn,$query);
        if($res) {
            echo "hello";
        }
        else
            echo "Error".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>