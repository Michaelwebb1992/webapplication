<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Our Customers</h2>
  <table border="1">
    <tr bgcolor="#d3d3d3" align="center">
      <th>ID</th>
      <th>Customer</th>
      <th>Work Done</th>
    </tr>
    <xsl:for-each select="ourcustomers/ourcustomer">
    <tr>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="customer"/></td>
      <td><xsl:value-of select="work_done"/></td>
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>