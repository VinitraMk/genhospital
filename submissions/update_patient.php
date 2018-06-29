<?php
include 'config.php';
if(isset($_REQUEST["submit"])) {
    if($conn) {
        $doc =new DomDocument('1.0');
        $doc->formatOutput=true;
        $root=$doc->createElement('Patient');
        $root=$doc->appendChild($root);
        echo "hello";
        $pid=$_REQUEST["search"];
        $query="SELECT * FROM Patient WHERE pid='$pid'";
        $res=mysqli_query($conn,$query);
        if($row=mysqli_fetch_assoc($res)) {
            #echo json_encode($row);
            foreach($row as $fieldname => $fieldvalue) {
                $child=$doc->createElement($fieldname);
                $child=$root->appendChild($child);

                $text=$doc->createTextNode($fieldvalue);
                $text=$root->appendChild($text);
            }
        }
        echo "hello: ".$doc->saveXML();
    }
}
if(isset($_REQUEST["uppat"])) {
    if($conn) {
        #echo "Connected to database";
        $pid=$_REQUEST["search"];
        $name=$_REQUEST["name"];
        $dob=$_REQUEST["dob"];
        $sex=$_REQUEST["sex"];
        $addr=$_REQUEST["addr"];
        $bldtype=$_REQUEST["btype"];
        $bldtype = $bldtype.$_REQUEST["bfact"];
        $phone=$_REQUEST["phone"];
        #echo "".$name." ".$dob." ".$sex." ".$addr." ".$bldtype." ".$phone;
        $query="UPDATE Patient SET pname='$name',pdob='$dob',psex='$sex',paddr='$addr',bloodtype='$bldtype',pphone='$phone' WHERE pid='$pid'";
        $sel=mysqli_query($conn,"SELECT * FROM Patient");
        $res=mysqli_query($conn,$query);
        if($res) {
            echo "Updated patient record in the field successfully!<br/><br/>";
            $sel=mysqli_query($conn,"SELECT * FROM Patient WHERE pid='$pid'");
            while($row=mysqli_fetch_assoc($sel)) {
                echo $row['pid']." ".$row['pname']." ".$row['pdob']." ".$row['psex']." ".$row['paddr']." ".$row['bloodtype']." ".$row['pphone']."<br/>";
            }
        }
        else
            echo "Error: ".$sql."<br/>".mysqli_error($conn);
    }
    else
        echo "Error connecting to the database";
}
?>


