<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<?= link_tag('assets/css2/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>
		<br>

		<?php 
            if($feedback=$this->session->flashdata('feedback')):
                $feedback_class=$this->session->flashdata('feedback_class');
            //for showing text if a user account is Edited or Delete.
        ?>
        <div class="alert alert-dismissible <?= $feedback_class?>" align="center">
            <?= $feedback; ?>
            <?php  ?>
        </div>
        <?php endif; ?>
        
		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
			<br>
			<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>User Profile</h2></legend>
			<h3 style="text-align:Center;color:#3e0d3e;">Name: <?php echo $name->first_name." ".$name->last_name; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Email: <?php echo $name->email; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Phone: <?php echo $name->phone; ?></h3>
			<h3 style="text-align:Center;color:#3e0d3e;">Birthday: <?php echo date('l jS F Y',strtotime($name->birthday)); ?></h3>
			<br>
			<div class="text-center">
				<?= anchor("work/edit_profile",'Edit Profile',['class'=>'btn btn-outline-warning btn-lg']); /*using anchor method to edit profile*/?>
				
				<?= /* using post method to delete*/
					form_open('work/delete_profile'),
					//form_hidden('article_id',$articles->id),
					form_submit(['name'=>'delete','value'=>'Delete Profile','class'=>'btn btn-outline-danger btn-lg']),
					form_close();
				?>
			</div>
		</fieldset>
	</div>


<?php include('footer.php');?>