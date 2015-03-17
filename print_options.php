<title>Print Options</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="thirteen columns">
				<h3>Print Options</h3>
				
				<?php 
				  
				  $vinyl1 = new Printoptions("COLOURED VINYL"); 
				  $vinyl1->setProduct("Produces A Very Smooth Matt Finish, Ideal For Sportswear, Leisurewear, Workwear, Hen & Stag Parties."); 
				  $vinyl1->setSuitable("Suitable For Cotton, Polyester & Similar Fabrics. Can Be Washed Up To 80°C"); 

				  $vinyl2 = new Printoptions("FLOCK VINYL"); 
				   $vinyl2->setProduct("High Density Fibres Give A Textured Velvet Feel, Perfect For Lettering, Numbers And Logos Onto Sports And Leisurewear."); 
				  $vinyl2->setSuitable("Suitable For Cotton, Polyester & Similar Fabrics. Can Be Washed Up To 80°C"); 


				print "The print options available are: <br />";

				  print $game1->getTVinyl();

				  print "<br>Produces: ".$game1->setProduct();

				  print "<br>Suitable For: ".$game1->setSuitable(). ".";

				  print "<br><br>";


				  print $game2->getVinyl();

				  print "<br>Produces: ".$game2->setProduct();

				  print "<br>Suitable: ".$game2->setSuitable(). ".";

				  print "<br><br>";


				?>
				
			</div>
			
			<?php include 'includes/footer.php'; ?>