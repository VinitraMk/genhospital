<?php
	$servername="localhost";
	$user="id1523543_mikasa";
	$passwd="12345678";
	$db="id1523543_webquiz";
	$conn=new mysqli($servername,$user,$passwd,$db);
	if(!$conn)
	{
		echo "Cannot connect";
		exit;
	}
	else
	{
		$sql = 'SELECT a.vid,p.pname, s.sname, a.vdate, a.vstime FROM staff as s JOIN (appointment as a natural JOIN Patient as p) on s.SID= a.DSID order by a.vid';
		if(isset($_REQUEST["svat"]))
		{
		    $pname =$_REQUEST["pname"];
		    $sname =$_REQUEST["sname"];
			$date =$_REQUEST["date"];
			if($pname !="" || $sname !="" || $date!="")
			{
			    $sql = $sql." where ";
			}
			if($pname != "")
			{
			    $sql= $sql." p.pname like '$pname%'";
			    if($sname !="" || $date != "")
			    {
			        $sql = $sql." and ";
			    }
			}
			if($sname != "")
			{
			    $sql= $sql." s.sname like '$sname%' ";
			    if($date != "")
			    {
			        $sql = $sql." and a.vdate='$date'";
			    }
			}

		}
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
?>
