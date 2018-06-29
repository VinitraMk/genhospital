<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html>
    <head>
        <style>
            body{
                padding: 20px;
            }
            table{
                background-color: white;
                width: 70%;
                margin: 0 auto;
            }
            th{
                background-color: #5e0536;
                color: white;
                padding: 5px 0 5px 0;
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
            }
        </style>
    </head>
	<body>
		<table border="1">
			<caption>Patients</caption>
			<tr>
				<th>PID</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Sex</th>
				<th>Address</th>
				<th>Blood Type</th>
				<th>Phone Number</th>
			</tr>
			
			<xsl:for-each select="root/pat">
			<tr>
				<td><xsl:value-of select="pid"/></td>
				<td><xsl:value-of select="pname"/></td>
				<td><xsl:value-of select="pdob"/></td>
				<td><xsl:value-of select="psex"/></td>
				<td><xsl:value-of select="paddr"/></td>
				<td><xsl:value-of select="bloodtype"/></td>
				<td><xsl:value-of select="pphone"/></td>
            </tr>
			</xsl:for-each>
        </table>
	</body>
</html>

</xsl:template>
</xsl:stylesheet>
