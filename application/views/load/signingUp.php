<!DOCTYPE html>
<html>
<head>
	<title>Signing Up</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="<?= base_url('login/signup');?>">Create User Account</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main');?>">Login</a>
                    </li>
                </ul>
              </div>
        </nav>

        <?php echo form_open('login/signing', ['class'=>'form-horizontal']);?> <!--form open-->
          <fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">            
            <?php if($error=$this->session->flashdata('signin_failed')): ?>
            <div class="alert alert-dismissible alert-danger" align="center">
                <?= $error; ?>
            </div>
            <?php endif; ?>


            <div class="from-group">
    		    	<label for="InputName">First Name:</label><!--Input Firstname-->
    		    	<?php
    		    		$fname = array('name'=>'first_name',
                               'class'=>'form-control',
                               'placeholder'=>'Firstname', 
                               'value'=>set_value('first_name'));
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
                            'value'=>set_value('last_name'));
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
                                   'value'=>set_value('email'));
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
                           'value'=>set_value('phone'));
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
                                  'value'=>set_value('password'));
                    echo form_password($pass);
              ?>
              <?php echo form_error('password');?>
        </div>

            <div class="from-group">
		    	<label for="Inputdate">Birth Date: <p></p></label><!--Input Birthday-->
		    	<input type="date" name="birthday" value="<?php echo date('Y-m-d'); ?>" />
    		</div>

            <div class="form-group">
                <label for="InputaccountType">Account Type:</label><!--Input Account Type-->

               	Parent: <input type="radio" name="acc_type" value="Parent" <?php echo  set_radio('acc_type', 'Parent', TRUE); ?> />
				        Admin: <input type="radio" name="acc_type" value="Admin" <?php echo  set_radio('acc_type', 'Admin'); ?> />
            </div>


            <?php   // submit buttons
                $reset = array('type'=>'reset',
                               'class'=>'btn btn-outline-primary btn-lg',
                               'value'=>'Reset');
                echo form_submit($reset);

                $submit = array('type'=>'Submit',
                                'class'=>'btn btn-outline-success btn-lg',
                                'value'=>'Sign Up');
                echo form_submit($submit);
            ?>

        </fieldset>
        </form>
        <br><br>
        <h4 style="text-align:center;">Already have an account?? <a href="<?= base_url('main');?>">Login From Here</a></h4>

	</div>

<?php include('footer.php'); ?>
