<?php
include 'config.php';
if(isset($_REQUEST["addpat"])) {
    if($conn) {
        #echo "Connected to database";
        $name=$_REQUEST["name"];
        $dob=$_REQUEST["dob"];
        $sex=$_REQUEST["sex"];
        $addr=$_REQUEST["addr"];
        $bldtype=$_REQUEST["btype"];
        $bldtype = $bldtype.$_REQUEST["bfact"];
        $phone=$_REQUEST["phone"];
        #echo "".$name." ".$dob." ".$sex." ".$addr." ".$bldtype." ".$phone;
        $query="INSERT INTO Patient(pname,pdob,psex,paddr,bloodtype,pphone) VALUES('$name','$dob','$sex','$addr','$bldtype','$phone')";
        $sel=mysqli_query($conn,"SELECT * FROM Patient");
        $res=mysqli_query($conn,$query);
        if($res) {
            header("location: https://webquiz.000webhostapp.com/assets/php/frame/Patient.html");
            
        }
        else
            echo "Error: ".$sql."<br/>".mysqli_error($conn);
    }
    else
        echo "Error connecting to the database";
}
?>