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
		$res = mysqli_query($conn, $sql);
		
		$doc = new DomDocument('1.0');
		
		$root = $doc->createElement('root');
		$root = $doc->appendChild($root);
		
		while($row = mysqli_fetch_assoc($res))
		{
			$nh = $doc->createElement('pat');
			$nh = $root->appendChild($nh);
			foreach($row as $name => $value)
			{
				$attr = $doc->createElement($name);
				$attr = $nh->appendChild($attr);
				
				$attrv = $doc->CreateTextNode($value." ");
				$attrv = $attr->appendChild($attrv);
			}
		}
		
		$ans = $doc->saveXML();
		$doc->save('Patient.xml');
		$doc->load('Patient.xml');
		
		$xsl = new DOMDocument;
		$xsl->load('Patient.xsl');
		
		$attach = new XSLTProcessor;
		$attach->importStyleSheet($xsl);
		
		echo $attach->transformToDoc($doc)->saveXML();
	}
?>
