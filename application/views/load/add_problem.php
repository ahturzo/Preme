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

		<?php echo form_open('work/import_problem', ['class'=>'form-horizontal']);?><!--form open-->

		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
		<?php if($error=$this->session->flashdata('failed')): ?>
            <div class="alert alert-dismissible alert-danger" align="center">
                <?= $error; ?>
            </div>
            <?php endif; ?>
		<br>
		<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Add Child Care Info</h2></legend>

		<div class="from-group">
		    <label for="InputName">Problem Name:</label><!--Input Title-->
		    	<?php
		    		$name = array('name'=>'problem_name',
                           'class'=>'form-control',
                           'placeholder'=>'Problem Name', 
                           'value'=>set_value('problem_name'));
		    		echo form_input($name);
		    	?>
		         <?php echo form_error('problem_name');?>
    	</div>

    	<div class="from-group">
		    <label for="InputName">Symptoms:</label><!--Input Title-->
		    	<?php
		    		$symptoms = array('name'=>'symptoms',
                           'class'=>'form-control',
                           'placeholder'=>'Symptoms', 
                           'value'=>set_value('symptoms'));
		    		echo form_input($symptoms);
		    	?>
		         <?php echo form_error('symptoms');?>
    	</div>

    	<div class="from-group">
		    <label for="InputName">Problem Details:</label><!--Input Title-->
		    	<?php
		    		$details = array('name'=>'problem_details',
                           'class'=>'form-control',
                           'placeholder'=>'Problem Details', 
                           'value'=>set_value('problem_details'));
		    		echo form_input($details);
		    	?>
		         <?php echo form_error('problem_details');?>
    	</div>

    	<div class="from-group">
		    <label for="InputName">Prevention:</label><!--Input Title-->
		    	<?php
		    		$prevention = array('name'=>'prevention',
                           'class'=>'form-control',
                           'placeholder'=>'Prevention', 
                           'value'=>set_value('prevention'));
		    		echo form_input($prevention);
		    	?>
		         <?php echo form_error('prevention');?>
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