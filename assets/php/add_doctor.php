<?php
include 'config.php';
if(isset($_REQUEST["adddoctor"])) {
    if($conn) {
        $name=$_REQUEST["name"];
        $pgno=$_REQUEST["pgno"];
        $offno=$_REQUEST["offno"];
        $qual=$_REQUEST["qual"];
        $spclty=$_REQUEST["spclty"];

        $selq="SELECT SID FROM staff where sname='$name'";
        $sel=mysqli_query($conn,$selq);
        $row=mysqli_fetch_assoc($sel);
        $sid=$row['SID'];
        $query="INSERT INTO doctor(SID,pagerno,officeno,qual,spclty) VALUES('$sid','$pgno','$offno','$qual','$spclty')";
        $res=mysqli_query($conn,$query);
        if($res) {
            echo "Inserted doctor record in the field successfully!<br/><br/>";
        }
        else
            echo "Error: ".$sql."<br/>".mysqli_error($conn);
    }
}
?>
