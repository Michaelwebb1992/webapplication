<title>Products - OO test</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="thirteen columns">
				<h3>Products</h3>
				<p>We have the following products available. These can all be custoomised with your own logo or company name on request.</p>
					<?php 				

					$product1 = new product("tshirt", 9.99);
					$product2 = new product("jumper", 19.99);
					$product3 = new product("hoodie", 22.99);
					$product4 = new product("polo top", 11.99);

					echo '<h5>Create Classes & Objects using get/set</h5>';
					echo $product1->getItem().' '.$product2->getDescription('Plan crew neck tshirt').' '.$product2->getPrice().'<br>';
					echo $product2->getItem().'<br>';
					echo $product2->getDescription('Plain 100% cotton jumper').'<br>';
					echo $product2->getPrice().'<br>';
					echo $product2->getStock().'<br>';
					echo '<h5>OO display String</h5>';
					echo $product1.'<br>';
					echo $product2.'<br>';
					echo $product3.'<br>';
					echo $product4.'<br>';
					echo '<h5>New Price</h5>';
					echo $product1->changePrice('+4').'<br>';


					?>

			</div>
			
			<?php include 'includes/footer.php'; ?>