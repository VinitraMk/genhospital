<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width"/>
        <title>Schedule</title>
        <link rel="shortcut icon" href="GHLogo.ico" type="image/x-icon"/>
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
		<table border="1" style="width:100vw;align:left;">
			<caption>Schedule</caption>
            <tr>
			    <th>Day</th>
				<th>Start time</th>
				<th>End Time</th>
				<th>Oncall</th>
			</tr>
			<tr>
                <td>Monday</td>
                <td><xsl:value-of select="root/mst"/></td>
                <td><xsl:value-of select="root/met"/></td>
                <td><xsl:value-of select="root/monc"/></td>
            </tr>
			<tr>
				<td>Tuesday</td>
				<td><xsl:value-of select="root/tust"/></td>
				<td><xsl:value-of select="root/tuet"/></td>
				<td><xsl:value-of select="root/tuonc"/></td>
            </tr>
            <tr>
				<td>Wednesday</td>
				<td><xsl:value-of select="root/wst"/></td>
				<td><xsl:value-of select="root/wet"/></td>
				<td><xsl:value-of select="root/wonc"/></td>
            </tr>
            <tr>
				<td>Thursday</td>
				<td><xsl:value-of select="root/thst"/></td>
				<td><xsl:value-of select="root/thet"/></td>
				<td><xsl:value-of select="root/thonc"/></td>
            </tr>
            <tr>
				<td>Friday</td>
				<td><xsl:value-of select="root/fst"/></td>
				<td><xsl:value-of select="root/fet"/></td>
				<td><xsl:value-of select="root/fonc"/></td>
            </tr>
            <tr>
				<td>Saturday</td>
				<td><xsl:value-of select="root/sast"/></td>
				<td><xsl:value-of select="root/saet"/></td>
				<td><xsl:value-of select="root/saonc"/></td>
            </tr>
            <tr>
				<td>Sunday</td>
				<td><xsl:value-of select="root/sust"/></td>
				<td><xsl:value-of select="root/suet"/></td>
				<td><xsl:value-of select="root/suonc"/></td>
            </tr>
        </table>
	</body>
</html>

</xsl:template>
</xsl:stylesheet>
