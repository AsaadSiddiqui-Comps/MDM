<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
<html>
<head>
<title>Student Report Card</title>
<style> body { font-family: Arial, sans-serif; background: #f0f4ff; padding: 40px; display: flex; flex-direction: column; align-items: center; } h2 { color: #1e3a8a; font-size: 24px; margin-bottom: 4px; } p { color: #64748b; font-size: 13px; margin-bottom: 24px; } table { width: 640px; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.10); } th { background: #1e3a8a; color: white; padding: 14px 18px; text-align: left; font-size: 13px; } td { padding: 13px 18px; font-size: 13px; color: #334155; border-bottom: 1px solid #e2e8f0; } tr:last-child td { border-bottom: none; } tr:hover td { background: #f8faff; } /* PASS / FAIL badges */ .pass { background: #dcfce7; color: #16a34a; padding: 4px 14px; border-radius: 20px; font-weight: bold; font-size: 12px; } .fail { background: #fee2e2; color: #dc2626; padding: 4px 14px; border-radius: 20px; font-weight: bold; font-size: 12px; } /* Grade colors */ .grade-a { color: #16a34a; font-weight: bold; } .grade-b { color: #2563eb; font-weight: bold; } .grade-c { color: #d97706; font-weight: bold; } .grade-f { color: #dc2626; font-weight: bold; } </style>
</head>
<body>
<h2>🎓 Student Report Card</h2>
<p>Pass mark is 35 out of 100 — Grade: A=75+, B=50+, C=35+, F=below 35</p>
<table>
<tr>
<th>#</th>
<th>Student Name</th>
<th>Subject</th>
<th>Marks / 100</th>
<th>Grade</th>
<th>Result</th>
</tr>
<xsl:for-each select="reportcard/student">
<tr>

<td>
<xsl:value-of select="position()"/>
</td>

<td>
<xsl:value-of select="name"/>
</td>
<td>
<xsl:value-of select="subject"/>
</td>
<td>
<xsl:value-of select="marks"/>
</td>

<td>
<xsl:choose>
<xsl:when test="marks >= 75">
<span class="grade-a">A</span>
</xsl:when>
<xsl:when test="marks >= 50">
<span class="grade-b">B</span>
</xsl:when>
<xsl:when test="marks >= 35">
<span class="grade-c">C</span>
</xsl:when>
<xsl:otherwise>
<span class="grade-f">F</span>
</xsl:otherwise>
</xsl:choose>
</td>

<td>
<xsl:choose>
<xsl:when test="marks >= 35">
<span class="pass">PASS</span>
</xsl:when>
<xsl:otherwise>
<span class="fail">FAIL</span>
</xsl:otherwise>
</xsl:choose>
</td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>