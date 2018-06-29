<?php
    ob_start();
    session_start();
    $_SESSION['logged']=true;
    $_SESSION['user']="";
    $_SESSION['userid']="";

    include 'config.php';

    if(isset($_REQUEST['btn_login'])) {
        $_SESSION['userid']=$_REQUEST['user'];
        $user=$_REQUEST['user'];
        $pwd=$_REQUEST['password'];

        $sql="SELECT * FROM user WHERE username='$user' and password='$pwd'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0) {
            while($row=mysqli_fetch_assoc($res)) {
                $_SESSION['logged']=true;
                $query="SELECT sname FROM staff WHERE SID='$user'";
                $res1=mysqli_query($conn,$query);
                if(mysqli_num_rows($res1)>0) {
                    $row1=mysqli_fetch_array($res1);
                    $_SESSION['user']=$row1[0];
                    $sql="SELECT * FROM schedule where sid='$userid'";
                    $res = mysqli_query($conn,$sql);
                    if($res)
            		{
            			$doc = new DomDocument('1.0');
            			$root= $doc->createElement('root');
            			$root= $doc->appendChild($root);
                        $x=true;
            			while($row = mysqli_fetch_assoc($res))
            			{
            				$nh= $root;
            				foreach($row as $name => $value)
            				{
                                if($x)
                                {
                                    $x=false;
                                }
                                else
                                {

                                    $attr = $doc->createElement($name);
            					    $attr = $nh->appendChild($attr);
                					$attrv = $doc->CreateTextNode($value." ");
            					    $attrv = $attr->appendChild($attrv);
                                }
            				}
            			}
            			$ans = $doc->saveXML();
            			$doc->save('xml/Sched.xml');
            			$doc->load('xml/Sched.xml');

            			$xsl = new DOMDocument;
            			$xsl->load('xsl/Sched.xsl');

            			$attach = new XSLTProcessor;
            			$attach->importStyleSheet($xsl);

            			$attach->transformToURI($doc,'file://'.getcwd().'/frame/Sched.html');
            		}
                    header("Location:https://webquiz.000webhostapp.com/");
                }
                else
                    echo "Error: ".mysqli_error($conn);
            }
        }
        else {
            echo "Incorrect username or password";
        }
    }
?>
