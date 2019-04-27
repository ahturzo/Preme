<!DOCTYPE html>
<html>
<head>
	<title>Add Activity</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>
		<br>

		<?php echo form_open('work/user_activity', ['class'=>'form-horizontal']);?> <!--form open-->
        <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
        <?php 
       			date_default_timezone_set("Asia/Dhaka");
        		echo form_hidden('create_at',date('h:i:sA Y-m-d'))
        ;?>

		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
		<br>
		<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Add Your Activity in Your Diary</h2></legend>

		<div class="from-group">
		    <label for="InputName">Activity Title:</label><!--Input Title-->
		    	<?php
		    		$title = array('name'=>'activity_title',
                           'class'=>'form-control',
                           'placeholder'=>'Title', 
                           'value'=>set_value('activity_title'));
		    		echo form_input($title);
		    	?>
		         <?php echo form_error('activity_title');?>
    	</div>


    	<div class="from-group">
		    <label for="InputName">Activity Body:</label><!--Input Activity-->
		    	<?php
		    		$body = array( 'name'=>'activity_body',
                            'class'=>'form-control',
                            'placeholder'=>'Activity Body', 
                            'value'=>set_value('activity_body'));
		    		echo form_textarea($body);
		    	?>
		        <?php echo form_error('activity_body');?>
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