<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?= link_tag('assets/css1/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('adminnavigation.php'); ?>
		
		<div class="jumbotron col-lg-12">
  			<p class="display-3">Hello, <?php echo $name->first_name." ".$name->last_name; ?></p>
  			<h1>Welcome Back To the Portal</h1>
		</div>
		 <!-- end jumbotron row-->

	</div> <!-- end container -->

<?php include('footer.php'); ?>
