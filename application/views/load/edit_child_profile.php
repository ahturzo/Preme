<!DOCTYPE html>
<html>
<head>
	<title>Edit Child Profile</title>
	<?= link_tag('assets/css1/bootstrap.min.css'); ?>
</head>

<body>
	<div class="container">
		<?php include('header.php'); ?>
    <?php include('parentnavigation.php'); ?>

        <?php echo form_open('work/update_child_profile', ['class'=>'form-horizontal']);?> <!--form open-->
          <?php echo form_hidden('baby_id',$baby->baby_id); ?>
          
          <fieldset style="border:1px solid #3e0d3e; background-color:Aquamarine;">            
            <legend style="padding: 0.2em 0.5em; border:5px solid #3e0d3e; color:#3e0d3e; font-size:90%; text-align:Center; background-color:AntiqueWhite ;"><h2>Edit Child Profile</h2></legend>
            <?php if($error=$this->session->flashdata('failed')): ?>
            <div class="alert alert-dismissible alert-danger" align="center">
                <?= $error; ?>
            </div>
            <?php endif; ?>


              <div class="from-group">
  		    	     <label for="InputName">Child Name:</label><!--Input name-->
  		    	     <?php
  		    		      $name = array('name'=>'baby_name',
                             'class'=>'form-control',
                             'placeholder'=>'Enter Baby Name', 
                             'value'=>set_value('baby_name',$baby->baby_name));
  		    		      echo form_input($name);
  		    	     ?>
  		         <?php echo form_error('baby_name');?>
      		    </div>

              <br>
              <div class="from-group">
                <label for="Inputdate">Birth Date: <p></p></label><!--Input Birthday-->
                <input type="date" name="date_of_birth" value="<?php echo date('Y-m-d'); ?>" />
              </div>


          		<div class="from-group">
      		    	<label for="InputName">Birth Week:</label><!--Input Birth Week-->
      		    	<?php
      		    		$bweek = array( 'name'=>'birth_week',
                                  'class'=>'form-control',
                                  'placeholder'=>'Birth Week', 
                                  'value'=>set_value('birth_week',$baby->birth_week));
      		    		echo form_input($bweek);
      		    	?>
      		         <?php echo form_error('birth_week');?>
          		</div>


              <div class="from-group">    <!--Input height-->
                  <label for="Inputemail">Child Height:</label>
                  <?php
                      $height = array('name'=>'height',
                                     'class'=>'form-control',
                                     'placeholder'=>'Enter height of your baby in cm',
                                     'value'=>set_value('height',$baby->height));
                      echo form_input($height);
                  ?>
                   <?php echo form_error('height'); ?>
              </div>


              <div class="from-group">
      		    	<label for="InputNumber">Child Weight:</label><!--Input weight-->
      		    	<?php
      		    		$weight = array('name'=>'weight',
                                 'class'=>'form-control',
                                 'placeholder'=>'Enter weight of your baby in kg', 
                                 'value'=>set_value('weight',$baby->weight));
      		    		echo form_input($weight);
      		    	?>
      		         <?php echo form_error('weight');?>
          		</div>


              <div class="form-group">    <!--Input head size-->
                <label for="InputHeadSize">Head Size:</label>
                  <?php
                        $head = array('name'=>'head_size',
                                      'class'=>'form-control',
                                      'placeholder'=>'Enter head size of your baby', 
                                      'value'=>set_value('head_size',$baby->head_size));
                        echo form_input($head);
                  ?>
                  <?php echo form_error('head_size');?>
              </div>


              <div class="form-group">
                <label for="Inputgender">Gender:</label><!--Input Account Type-->

               	Boy: <input type="radio" name="gender" value="Boy" <?php echo  set_radio('gender', 'Boy', TRUE); ?> />
				        Girl: <input type="radio" name="gender" value="Girl" <?php echo  set_radio('gender', 'Girl'); ?> />
              </div>

              <div class="form-group">    <!--Input head size-->
                <label for="InputSpecialCase">Special Case:</label>
                  <?php
                        $case = array('name'=>'special_case',
                                      'class'=>'form-control',
                                      'placeholder'=>'Enter Your child problem', 
                                      'value'=>set_value('special_case',$baby->special_case));
                        echo form_input($case);
                  ?>
                  <?php echo form_error('special_case');?>
              </div>


            <?php   // submit buttons
                $reset = array('type'=>'reset',
                               'class'=>'btn btn-outline-primary btn-lg',
                               'value'=>'Reset');
                echo form_submit($reset);

                $submit = array('type'=>'Submit',
                                'class'=>'btn btn-outline-success btn-lg',
                                'value'=>'Submit');
                echo form_submit($submit);
            ?>

        </fieldset>
        </form>

	</div>

<?php include('footer.php'); ?>
