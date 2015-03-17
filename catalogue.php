<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="thirteen columns">
				<h3>Catalogue</h3>
					<p>We have the following products available. These can all be customised with your own logo or company name on request.</p>
						
						<form name="searchproduct" action="catalogue.php"  method="get">
					  	<p>Search: 
						    <input type="text" name="searchproduct" placeholder="search for items..."/><input type="submit">   
					    </p>
						    <?php 						

							  function displayData($result){

							
								print "<table border=1 cellpadding=20 >";
							
									while ($row = $result->fetch_assoc()){ 
							

								print "<tr>";
								print	"<td><b>" . $row["product_name"] . "</b></td>";
									
								print	"<tr>";

								print		"<td><img src=images/products/". $row["product_image"] ." </td>";

								print		"<td>" . $row["product_description"] . "</td>"; 

								print	"</tr>";

								print "</tr>";

							  }  

							  	print "</table>";

							  }


							//Select Data

							  $result = $mysqli_conn->query("SELECT * FROM catalogue");

							  displayData($result); 

							?>

			</div>
			
			<?php include 'includes/footer.php'; ?>