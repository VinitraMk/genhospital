<?php
include 'config.php';
if(isset($_REQUEST["upd_st"])) {
    if($conn) {
        #echo "Connected to database";
        $sid=$_REQUEST["sid"];
        $sname=$_REQUEST["sname"];
        $saddr=$_REQUEST["saddr"];
        $smobno=$_REQUEST["smobno"];
        $type=$_REQUEST["type"];
        $pagerno=$_REQUEST["pagerno"];
        $officeno=$_REQUEST["officeno"];
        $qual=$_REQUEST["qual"];
        $spclty=$_REQUEST["spclty"];
        $pagerno=$_REQUEST["pagerno"];
        $officeno=$_REQUEST["officeno"];
        $qual=$_REQUEST["qual"];
        $spclty=$_REQUEST["spclty"];
        #echo "".$name." ".$dob." ".$sex." ".$addr." ".$bldtype." ".$phone;
        $query="UPDATE staff SET sname='$sname',saddr='$saddr',smobno='$smobno' WHERE SID='$sid'";
        $res=mysqli_query($conn,$query);
        $res1;$query1;
        if($type=="1") {
            $pagerno=$_REQUEST["pagerno"];
            $officeno=$_REQUEST["officeno"];
            $qual=$_REQUEST["qual"];
            $spclty=$_REQUEST["spclty"];
            $query1="UPDATE doctor SET pagerno='$pagerno',officeno='$officeno',qual='$qual',spclty='$spclty' WHERE SID='$sid'";
        }
        else {
            $training=$_REQUEST["training"];
            $ssid=$_REQUEST["ssid"];
            $query2="UPDATE nurse SET training='$training',ssid='$ssid' WHERE SID='$sid'";
        }
        $res1=mysqli_query($conn,$query1);
        if($res && $res1) {
            header("Location: https://webquiz.000webhostapp.com/profile.php");
            
        }
        else
            echo "Error: ".$sql."<br/>".mysqli_error($conn);
    }
    else
        echo "Error connecting to the database";
}
?>