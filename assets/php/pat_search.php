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
		$sql = 'select * from Patient';
		if(isset($_REQUEST["spat"]))
		{
			$name=$_REQUEST["name"];
			$dob=$_REQUEST["dob"];
			#echo "name";
			if($name!="" && $dob!="")
			{
				$sql= $sql." where pname like '$name%' and pdob='$dob'";
			}
			else if($name!="")
			{
				$sql= $sql." where pname like '$name%'";
			}
			else if($dob!="")
			{
				$sql= $sql." where pdob='$dob'";
			}
		}

		$res = mysqli_query($conn, $sql);
		if($res)
		{
		$doc = new DomDocument('1.0');

		$root = $doc->createElement('root');
		$root = $doc->appendChild($root);

		while($row = mysqli_fetch_assoc($res))
		{
			$nh = $doc->createElement('pat');
			$nh = $root->appendChild($nh);
			$pid;$pidv;
			$x=true;
			foreach($row as $name => $value)
			{
				$attr = $doc->createElement($name);
				$attr = $nh->appendChild($attr);

				$attrv = $doc->CreateTextNode($value." ");
				$attrv = $attr->appendChild($attrv);

			}

		}

		$ans = $doc->saveXML();
		$doc->save('xml/Patient.xml');
		$doc->load('xml/Patient.xml');

		$xsl = new DOMDocument;
		$xsl->load('xsl/Patient.xsl');

		$attach = new XSLTProcessor;
		$attach->importStyleSheet($xsl);
 
		$attach->transformToURI($doc,'file://'.getcwd().'/frame/Patient.html');
	}
		}
        header("location: https://webquiz.000webhostapp.com/assets/php/frame/Patient.html");
?>
