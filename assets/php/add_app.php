<?php
include 'config.php';
$booked=false;
$conn;
if(isset($_REQUEST["bookapt"])){
    if($conn){
        $conn=$conn;
        $name=$_REQUEST['name'];
        $pid=$_REQUEST['pid'];
        $dsid=$_REQUEST['dsid'];
        $date=$_REQUEST['aptdate'];
        #echo $date;
        $timestamp = strtotime($date);
        $day=date('D', $timestamp);
        $day=strtolower($day);
        $day=substr($day,0,2);
        $st;$et;$onc;
        $query="SELECT * FROM schedule WHERE sid='$dsid'";
        $query2="SELECT * FROM appointment WHERE DSID='$dsid' AND vdate='$date'";
        $res2=mysqli_query($conn,$query2);
        $res=mysqli_query($conn,$query);
        if($res) {
            $row=mysqli_fetch_assoc($res);
            switch($day) {
                case "mo":
                    $st=$row['mst'];
                    $et=$row['met'];
                    $onc=$row['monc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                            
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "tu":
                    $st=$row['tust'];
                    $et=$row['tuet'];
                    $onc=$row['tuonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "we":
                    $st=$row['wst'];
                    $et=$row['wet'];
                    $onc=$row['wonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "th":
                    $st=$row['thst'];
                    $et=$row['thet'];
                    $onc=$row['thonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "fr":
                    $st=$row['fst'];
                    $et=$row['fet'];
                    $onc=$row['fonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "sa":
                    $st=$row['sast'];
                    $et=$row['saet'];
                    $onc=$row['saonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
                case "su":
                    $st=$row['sust'];
                    $et=$row['suet'];
                    $onc=$row['suonc'];
                    if(($st=="" || $st=="None") && ($onc=="" || $onc="None"))
                        nodocmsg();
                    else if(!$res2) {
                        $query3="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$st')";
                        $res3=mysqli_query($conn,$query3);
                        if($res3) {
                            $sst=$st;
                            success($sst,$name);
                        }
                    }
                    else {
                        $b=intval(substr($st,0,2));
                        $e=intval(substr($et,0,2));
                        if($sst=bookapt($b,$e,$dsid,$pid,$date)) {
                            success($sst,$name);
                        }
                        else
                            nodatemsg();
                    }
                    break;
            }
        }
    }
}

function success($sst,$name) {
    setcookie("booked",true,time() + (86400 * 30), "/");
    setcookie("pname",$name,time() + (86400 * 30), "/");
    setcookie("aptime",$sst, time() + (86400 * 30), "/");
    header("Location: https://webquiz.000webhostapp.com/apt_msg.php");
}

function bookapt($b,$e,$dsid,$pid,$date) {
    $td1;$td2;
    $r1;$r2;
    $q1;$q2;
    $fr;$fq;
    $avail=false;$booked=false;
    
    for($i=$b;$i<=$e;$i++) {
        $td1="".$i.":00";
        if($i==$e)
            $td2="".$i.":00";
        else
            $td2="".$i.":30";
        $q1="SELECT * FROM appointment WHERE DSID='$dsid' AND vdate='$date' AND vstime='$td1'";
        $q2="SELECT * FROM appointment WHERE DSID='$dsid' AND vdate='$date' AND vstime='$td2'";
        $r1=mysqli_query($GLOBALS['conn'],$q1);
        $r2=mysqli_query($GLOBALS['conn'],$q2);
        if($r1) {
            $sst=$td1;
            $avail=true;
            break;
        }
        else if($r2) {
            $sst=$td2;
            $avail=true;
            break;
        }
    }
    
    if($avail) {
        $fq="INSERT INTO appointment(DSID,PID,vdate,vstime) VALUES('$dsid','$pid','$date','$sst')";
        $fr=mysqli_query($GLOBALS['conn'],$fq);
        if($fr)
            $booked=true;
    }
    return $sst;
}

function nodocmsg() {
    setcookie("booked",false,time() + (86400 * 30), "/");
    setcookie("nodoc",false, time() + (86400 * 30), "/");
    header("Location: https://webquiz.000webhostapp.com/apt_msg.php");
}

function nodatemsg() {
    setcookie("booked",false,time() + (86400 * 30), "/");
    setcookie("nodate",false, time() + (86400 * 30), "/");
    header("Location: https://webquiz.000webhostapp.com/apt_msg.php");
}
?>
