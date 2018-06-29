<?php
include 'config.php';
if(isset($_REQUEST["addstaff"])) {
    if($conn) {
        $name = $_REQUEST["name"];
        $addr = $_REQUEST["addr"];
        $phone = $_REQUEST["phone"];
        $type = $_REQUEST["type"];
        $pwd = $_REQUEST["pwd"];
        $doc;$nur;$query2;$query3;$query4;
        if($type=="doc") {
            $doc=1; $nur=0;
        }
        else if($type=="nur"){
            $doc=0; $nur=1;
        }
        $query="INSERT INTO staff(sname,saddr,smobno,doc,nurse) VALUES('$name','$addr','$phone','$doc','$nur')";
        $res=mysqli_query($conn,$query);
        if($res) {
            #echo "Inserted patient record in the field successfully!<br/><br>";
            $query2="SELECT MAX(SID) from staff";
            $res1=mysqli_query($conn,$query2);
            if($res1) {
                $row=mysqli_fetch_array($res1);
                #echo "".$row[0];
                if($type=="doc") {
                    
                    $query3="INSERT INTO doctor(sid) VALUES('$row[0]')";
                }
                else {
                    $query3="INSERT INTO nurse(sid) VALUES('$row[0]')";
                }
                $query4="INSERT INTO user(username,password) VALUES('$row[0]','$pwd')";
                $res2=mysqli_query($conn,$query3);
                $res3=mysqli_query($conn,$query4);
                $res4=mysqli_query($conn,"INSERT INTO schedule(sid) VALUES('$row[0]')");
                
                if($res2 && $res3 && $res4) {
                    setcookie("name",$name, time() + (86400 * 30), "/");
                    setcookie("sid",$row[0],time() + (86400 * 30), "/");
                    header("Location:https://webquiz.000webhostapp.com/welcome.php");
                }
                else {
                    echo "Error connecting to the database";
                }
            }
            else {
                echo "Error: ".mysqli_error($conn);
            }
            
        }
        else {
            echo "Error: ".mysqli_error($conn);
        }
    }
}
