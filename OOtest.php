<title>OO test</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="two-thrids columns">
				<h3>Products</h3>
				<p>Using OOP</p>

				<h4>PHP Classes and Objects</h4>
				<?php 				

					$item1=new Item(100, 10.00);

						echo $item1->getPrice();
						echo '<br />';
						echo $item1->getDescription('description');
						echo '<br />';
						echo $item1;

				?>

			</div>
			
			<?php include 'includes/footer.php'; ?>