<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Match the root of the XML document -->
    <xsl:template match="/">

        <html>
        <head>
            <title>Book List</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: #f4f6ff;
                    display: flex;
                    justify-content: center;
                    padding: 40px;
                }
                h2 {
                    text-align: center;
                    color: #3730a3;
                    margin-bottom: 20px;
                }
                table {
                    border-collapse: collapse;
                    width: 600px;
                    background: white;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                }
                th {
                    background-color: #4f46e5;
                    color: white;
                    padding: 14px 18px;
                    text-align: left;
                    font-size: 14px;
                }
                td {
                    padding: 12px 18px;
                    border-bottom: 1px solid #e2e8f0;
                    font-size: 14px;
                    color: #334155;
                }
                tr:last-child td {
                    border-bottom: none;
                }
                tr:hover td {
                    background-color: #f0f4ff;
                }
            </style>
        </head>
        <body>
            <div>
                <h2>Book List</h2>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price (₹)</th>
                    </tr>

                    <!-- Loop -->
                    <xsl:for-each select="books/book">
                        <tr>
                            <td><xsl:value-of select="title"/></td>
                            <td><xsl:value-of select="author"/></td>
                            <td><xsl:value-of select="price"/></td>
                        </tr>
                    </xsl:for-each>

                </table>
            </div>
        </body>
        </html>

    </xsl:template>

</xsl:stylesheet>
