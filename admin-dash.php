
<?php
	include("functions.php");



	?>

<?php 
					if (isset($_SESSION['email'])) : ?>
					<strong><?php echo $_SESSION['email']; ?></strong>

				<strong><?php echo $_SESSION['name']; ?></strong>
				<strong><?php echo $_SESSION['type']; ?></strong>
				<?php endif ?> 