<?php 
$ourcustomers = simplexml_load_file('ourcustomers.xml');
//Iterate through the elements 

foreach ($ourcustomer->ourcustomer as $customer) { 
print "<h3>Customer: ". $customer->customer."</h3>"; 
print "Work Done: ". $work_done->work_done."<br>"; 
print "<br />" ;
} 
?>

