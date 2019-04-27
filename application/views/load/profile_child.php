<!DOCTYPE html>
<html>
<head>
	<title>Your Child Profile</title>
	<?= link_tag('assets/css2/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>
		<br>

		<?php if(count($child)):
				$count=0;
				foreach($child as $baby): ?>
					<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
						<br>
						<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Child<?= ++$count ?></h2></legend>
						<h3 style="text-align:Center;color:#3e0d3e;">Child Name: <?php echo $baby->baby_name; ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Gender: <?php echo $baby->gender; ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Birthdate: <?php echo date('l jS F Y',strtotime($baby->date_of_birth)); ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Height: <?php echo $baby->height." Cm"; ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Weight: <?php echo $baby->weight." Kg"; ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Head Size: <?php echo $baby->head_size." Cm"; ?></h3>
						<h3 style="text-align:Center;color:#3e0d3e;">Special Case: <?php echo $baby->special_case; ?></h3>
						<br>
						<div class="text-center">
							<?= anchor("work/edit_child_profile/{$baby->baby_id}",'Edit Profile',['class'=>'btn btn-outline-warning btn-lg']); /*using anchor method to edit profile*/?>
							<?= /* using post method to delete*/
								form_open('work/delete_child_profile'),
								form_hidden('baby_id',$baby->baby_id),
								form_submit(['name'=>'delete','value'=>'Delete Profile','class'=>'btn btn-outline-danger btn-lg']),
								form_close();
							?>
						</div>
					</fieldset>

		<?php endforeach; ?>
			<?php else: ?>
				<hr>
				<h3 style="text-align:Center;">We found no child in this portal for you.</h3>
				<?php endif; ?>

	</div>


<?php include('footer.php');?>