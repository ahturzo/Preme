<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
    <?php include('parentnavigation.php'); ?>

        <?php echo form_open('work/update_profile', ['class'=>'form-horizontal']);?> <!--form open-->
          <fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">            

            <div class="from-group">
		    	<label for="InputName">First Name:</label><!--Input Firstname-->
		    	<?php
		    		$fname = array( 'name'=>'first_name',
                            'class'=>'form-control',
                            'placeholder'=>'Firstname', 
                            'value'=>set_value('first_name',$num->first_name));
		    		echo form_input($fname);
		    	?>
		         <?php echo form_error('first_name');?>
    		</div>

    		<div class="from-group">
		    	<label for="InputName">Last Name:</label><!--Input lastname-->
		    	<?php
		    		$lname = array( 'name'=>'last_name',
                            'class'=>'form-control',
                            'placeholder'=>'Lastname', 
                            'value'=>set_value('last_name',$num->last_name));
		    		echo form_input($lname);
		    	?>
		         <?php echo form_error('last_name');?>
    		</div>

            <div class="from-group">    <!--Input email-->
                <label for="Inputemail">User email:</label>
                <?php
                    $email = array('name'=>'email',
                                   'class'=>'form-control',
                                   'placeholder'=>'Enter your email', 
                                   'value'=>set_value('email',$num->email));
                    echo form_input($email);
                ?>
                 <?php echo form_error('email'); ?>
            </div>

            <div class="from-group">
		    	<label for="InputNumber">Phone No:</label><!--Input Phone number-->
		    	<?php
		    		$phone = array('name'=>'phone',
                           'class'=>'form-control',
                           'placeholder'=>'Phone Number', 
                           'value'=>set_value('phone',$num->phone));
		    		echo form_input($phone);
		    	?>
		         <?php echo form_error('phone');?>
    		</div>

        <div class="form-group">    <!--Input password-->
              <label for="InputPassword">Password:</label>
              <?php
                    $pass = array('name'=>'password',
                                  'class'=>'form-control',
                                  'placeholder'=>'password', 
                                  'value'=>set_value('password',$num->password));
                    echo form_password($pass);
                ?>
                <?php echo form_error('password');?>
          </div>

            <div class="from-group">
		    	<label for="Inputdate">Birth Date: <p></p></label><!--Input Birthday-->
		    	<input type="date" name="birthday" value="<?php echo date('Y-m-d'); ?>" />
    		</div>

        <?php   // submit buttons
          $reset = array('type'=>'reset',
                         'class'=>'btn btn-outline-primary btn-lg',
                         'value'=>'Reset');
          echo form_submit($reset); 

          $submit = array('type'=>'Submit',
                          'class'=>'btn btn-outline-success btn-lg',
                          'value'=>'Update');
          echo form_submit($submit);
        ?>

        </fieldset>
        </form>

	</div>
<?php include('footer.php'); ?>