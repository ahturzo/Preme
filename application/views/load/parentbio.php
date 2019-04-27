<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<?= link_tag('assets/css2/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('adminnavigation.php'); ?>
		<br>

		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
			<br>
			<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Parent Profile</h2></legend>
			<h3 style="text-align:Center;color:#3e0d3e;">Name: <?php echo $name->first_name." ".$name->last_name; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Email: <?php echo $name->email; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Phone: <?php echo $name->phone; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Birthday: <?php echo date('d M Y',strtotime($name->birthday)); ?></h3>
			<br>
			<div class="text-center">				
				<?= /* using post method to delete*/
					form_open('work/admindeleteparent'),
					form_hidden('parent_id',$name->user_id),
					form_submit(['name'=>'delete',
								 'value'=>'Delete Profile',
								 'class'=>'btn btn-outline-danger btn-lg']),
					form_close();
				?>
			</div>
		</fieldset>
	</div>


<?php include('footer.php');?>