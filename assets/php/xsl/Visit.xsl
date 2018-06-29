<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Visitaion Records</title>
        <link rel="shortcut icon" href="GHLogo.ico" type="image/x-icon" />
        <link href="/assets/css/index.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
        <script src="/assets/js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            form{
                color:#000000 !important;
            }
            body{
                padding: 20px;
            }
            table{
                background-color: white;
                width: 70%;
                margin: 0 auto;
            }
            th{
                background-color: #0D7DBD;
                color: white;
                padding: 5px 0 5px 0;
            }
            td
            {
                color: #0D7DBD;
            }
            tr{
                text-align: center;
            }
            tr:nth-child(even){
                  background-color: lightgrey;
            }
            CAPTION{
            padding: 10px;
            text-align: center;
            font-size: 28px;
            font-family: Georgia, Serif;
            background-color: white;
            color: #0D7DBD;
            }
        </style>
	</head>
	<body>
		<form name="vsearch" action="/assets/php/visit_search.php" method="POST">
			<fieldset>
				<legend>Visitation Search</legend>
				<input type="text" id="pname" name="pname" placeholder="Patient Name.." style="width:25%; align:'left';"/><br/>
				<input type="text" id="sname" name="sname" placeholder="Doctor Name.." style="width:25%; align:'left';"/><br/>
				<input type="date" id="date" name="date" placeholder="Date.." style="width:25%; align:'left';"/><br/>
				<button type="submit" name="svat" id="svat" style="width:25%; align:'right';">Apply</button>
			</fieldset>
		</form>
		<table border="1" style="width:100vw;">
			<caption>Visitaion Records</caption>
			<tr>
			    <th>VID</th>
			    <th>Patient</th>
				<th>Doctor</th>
				<th>Date</th>
				<th>Time</th>
			</tr>

			<xsl:for-each select="root/visit">
			<tr>
			    <td><xsl:value-of select="vid"/></td>
			    <td><xsl:value-of select="pname"/></td>
				<td><xsl:value-of select="sname"/></td>
				<td><xsl:value-of select="vdate"/></td>
				<td><xsl:value-of select="vstime"/></td>
            </tr>
			</xsl:for-each>
        </table>
	</body>
</html>

</xsl:template>
</xsl:stylesheet>
