<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="two-thrids columns">
				<?php

				$user = new user();
				$user->logout();

				redirect::to('index.php');
				?>
			</div>
			
			<?php include 'includes/footer.php'; ?>

