<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?= link_tag('assets/css1/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php');?>

		
			<div class="jumbotron col-lg-12">
  				<h1 class="display-3">Hello, <?php echo $name->first_name." ".$name->last_name; ?></h1>
				<h2>Welcome Back To the Portal</h2>
			</div>
		 <!-- end jumbotron row-->

	</div> <!-- end container -->

<?php include('footer.php'); ?>
