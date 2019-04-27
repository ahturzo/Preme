<!DOCTYPE html>
<html>
<head>
	<title>Add To Do Work</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>
		<br>

		<?php echo form_open('work/add_into_list', ['class'=>'form-horizontal']);?> <!--form open-->
        <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>

		<fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">
		<br>
		<legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Add work what you will do</h2></legend>

		<div class="from-group">
		    <label for="InputName">Work Name:</label><!--Input Title-->
		    	<?php
		    		$body = array('name'=>'list_body',
                           'class'=>'form-control',
                           'placeholder'=>'Work Name', 
                           'value'=>set_value('list_body'));
		    		echo form_input($body);
		    	?>
		         <?php echo form_error('list_body');?>
    	</div>

    	<div class="from-group">
		    <label for="Inputdate">Notify Date: <p></p></label><!--Input date-->
		    <input type="date" name="notify_date" value="<?php echo date('Y-m-d'); ?>" />
    	</div>

    	<div class="from-group">
		    <label for="Inputdate">Notify Time: <p></p></label><!--Input time-->
		    <input type="time" name="notify_time" value="<?php echo date('h:i A'); ?>" />
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