<?php 
    ob_start();
    include 'config.php';
    if(isset($_REQUEST['cancel_apt'])){
        if($conn){
            $conn=$conn;
            $vid=$_REQUEST['vid'];
            $pid=$_REQUEST['pid'];
            $date=$_REQUEST['date'];
            $sql="Select * from appointment where vid='$vid'";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $bool = true;
                $row=mysqli_fetch_assoc($res);
                foreach($row as $name => $value){
                    if($name=='PID' && $value!=$pid)
                        $bool=false;
                    if($name=='vdate' && $value!=$date)
                        $bool=false;
                }
                if($bool){
                    $sql="delete from appointment where vid='$vid'";
                    $del=mysqli_query($conn,$sql);
                    if($del)
                    {
                        $sql = 'SELECT a.vid,p.pname, s.sname, a.vdate, a.vstime FROM staff as s JOIN (appointment as a natural JOIN Patient as p) on s.SID= a.DSID';
                        $res = mysqli_query($conn,$sql);
                		if($res)
                		{
            			    $doc = new DomDocument('1.0');
			                $root= $doc->createElement('root');
                			$root= $doc->appendChild($root);

                			while($row = mysqli_fetch_assoc($res))
                			{
                				$nh= $doc->createElement('visit');
				                $nh= $root->appendChild($nh);
                				foreach($row as $name => $value)
				                {
                					$attr = $doc->createElement($name);
				                	$attr = $nh->appendChild($attr);

                					$attrv = $doc->CreateTextNode($value." ");
				                	$attrv = $attr->appendChild($attrv);
                				}
                			}
                			$ans = $doc->saveXML();
            			    $doc->save('xml/Visit.xml');
			                $doc->load('xml/Visit.xml');

			                $xsl = new DOMDocument;
			                $xsl->load('xsl/Visit.xsl');

			                $attach = new XSLTProcessor;
			                $attach->importStyleSheet($xsl);

			                $attach->transformToURI($doc,'file://'.getcwd().'/frame/Visit.html');
		                }

                        header("location: https://webquiz.000webhostapp.com/assets/php/frame/Visit.html");
                    }
                    
                }
                else
                {
                    echo "Incorrect Data";
                }
            }
        }
    }
?>