<?php 
//Create a DomDocument object

  $xml = new DOMDocument;

  // Load the XML source

  $xml -> load('ourcustomer.php');


//Similar with XSL

  $xsl = new DOMDocument;

  $xsl -> load('ourcustomers.php');

  // Create and Configure the transformer

  $proc = new XSLTProcessor;

  // attach the xsl rules

  $proc -> importStyleSheet($xsl);

  //Output

  echo $proc -> transformToXML($xml);


?>