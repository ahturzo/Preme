<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
        <?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>

    <div class="container">
        <?php include('header.php'); ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <a class="navbar-brand" href="<?= base_url('main');?>">User Login</a>
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
                        <a class="nav-link" href="<?= base_url('login/signup');?>">Sign Up</a>
                    </li>
                </ul>
              </div>
        </nav>

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

        <?php echo form_open('login/user_login', ['class'=>'form-horizontal']);?> 
          <fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">            
            <?php if($error=$this->session->flashdata('login_failed')): ?>
            <div class="alert alert-dismissible alert-danger" align="center">
                <?= $error; ?>
            </div>
            <?php endif; ?>


            <div class="from-group">    <!--Input email-->
                <label for="Inputemail">User email:</label>
                <?php
                    $email = array('name'=>'email','class'=>'form-control','placeholder'=>'Enter your email', 'value'=>set_value('email'));
                    echo form_input($email);
                ?>
                 <?php echo form_error('email'); ?>
            </div>


            <div class="form-group">    <!--Input password-->
              <label for="InputPassword">Password:</label>
              <?php
                    $pass = array('name'=>'password','class'=>'form-control','placeholder'=>'password', 'value'=>set_value('password'));
                    echo form_password($pass);
                ?>
                <?php echo form_error('password');?>
            </div>

            <?php   // submit buttons
                $reset = array('type'=>'reset','class'=>'btn btn-outline-primary btn-lg','value'=>'Reset');
                echo form_submit($reset); 
                $submit = array('type'=>'Submit','class'=>'btn btn-outline-success btn-lg','value'=>'Login');
                echo form_submit($submit);
            ?>

        </fieldset>
        </form> 
        <br><br>
        <h4 style="text-align:center;">Don't have an account?? <a href="<?= base_url('login/signup');?>">Sign Up Here</a></h4>
    </div>


<?php include('footer.php'); ?>