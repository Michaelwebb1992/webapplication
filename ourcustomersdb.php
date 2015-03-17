<?php
header ("Content-Type:text/xml");//Tell browser to expect xml
include ("config/init.php");
$query = "SELECT * FROM ourcustomers"; 
$result = mysqli_query($mysqli_conn, $query) or die ("Error in query: $query. ".mysql_error()); 
//Top of xml file
$_xml = '<?xml version="1.0"?><?xml-stylesheet type="text/xsl" href="ourcustomers.xsl"?>'; 
$_xml .="<ourcustomers>"; 
	while($row = mysqli_fetch_array($result)) { 
		$_xml .="<ourcustomer>"; 
		$_xml .="<id>".$row['id']."</id>"; 
		$_xml .="<customer>".$row['customer']."</customer>"; 
		$_xml .="<work_done>".$row['work_done']."</work_done>"; 
		$_xml .="</ourcustomer>"; 
		} 
		$_xml .="</ourcustomers>"; 
//Parse and create an xml object using the string
$xmlobj=new SimpleXMLElement($_xml);
//output
print $xmlobj->asXML();
//write to an XML file
$xmlobj->asXML('ourcustomers.xml');
?>