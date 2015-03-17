<title>Contact Us</title>



		<?php require 'includes/header.php'; ?>
		<?php include 'includes/nav.php'; ?>

		<div id="content" class="two-thrids columns">
			<h3>Contact Us</h3>
				<form action="contact_action.php" autocomplete="on" method="post">
 			 	Your name:<input type="text" name="name">
  				E-mail: <input type="email" name="email">
  				Comments: <textarea rows="6" cols="40" name="comments"></textarea>
  				<input type="submit" class="button">
				</form>
		</div>
		
		<?php include 'includes/footer.php'; ?>