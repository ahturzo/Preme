<!DOCTYPE html>
<html>
<head>
	<title>Add Child Care</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('adminnavigation.php'); ?>
		<br>

		<?php echo form_open('work/import_childcare', ['class'=>'form-horizontal']);?><!--form open-->

		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
		<?php if($error=$this->session->flashdata('failed')): ?>
            <div class="alert alert-dismissible alert-danger" align="center">
                <?= $error; ?>
            </div>
            <?php endif; ?>
		<br>
		<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Add Child Care Info</h2></legend>

		<div class="from-group">
		    <label for="InputName">Child Care Name:</label><!--Input Title-->
		    	<?php
		    		$care = array('name'=>'childcare_name',
                           'class'=>'form-control',
                           'placeholder'=>'Child Care Name', 
                           'value'=>set_value('childcare_name'));
		    		echo form_input($care);
		    	?>
		         <?php echo form_error('childcare_name');?>
    	</div>

    	<div class="from-group">
		    <label for="InputName">Location:</label><!--Input Title-->
		    	<?php
		    		$location = array('name'=>'location',
                           'class'=>'form-control',
                           'placeholder'=>'Location', 
                           'value'=>set_value('location'));
		    		echo form_input($location);
		    	?>
		         <?php echo form_error('location');?>
    	</div>

    	<?php   // submit buttons
            $reset = array('type'=>'reset','class'=>'btn btn-outline-primary btn-lg','value'=>'Reset');
            echo form_submit($reset); 
            $submit = array('type'=>'Submit','class'=>'btn btn-outline-success btn-lg','value'=>'Submit');
            echo form_submit($submit);
        ?>

    	</fieldset>
        </form>
	</div>


<?php include('footer.php'); ?>