<!DOCTYPE html>
<html>
<head>
	<title>Parent's List</title>
	<?= link_tag('assets/css1/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>

		<div class="container">
			<?php include('header.php'); ?>
			<?php include('adminnavigation.php'); ?>

		    <?php if($feedback=$this->session->flashdata('feedback')): 
		    		$feedback_class=$this->session->flashdata('feedback_class');
		    		//for showing text if a user account is Edited or Delete.
		    ?>
		    <div class="alert alert-dismissible <?= $feedback_class?>" align="center">
		        <?= $feedback; ?>
		    </div>
		    <?php endif; ?>

			<table class="table table-hover">
				<thead  class="table-dark">
					<tr>
						<th>Sl.no</th>
						<th>Parent Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>		
				<tbody>
					<?php if(count($parent)): 
						$count=$this->uri->segment(3,0);
						foreach($parent as $parents): ?>
						<tr>
							<td><?= ++$count ?></td>
							<td>
								<?= anchor("viewload/parent/{$parents->user_id}",$parents->first_name." ".$parents->last_name) ?>
							</td>
							<td>
								<?= $parents->email ?>
							</td>
							<td>
							<div class='row'>
								<?= /* using post method to delete*/
									form_open('work/admindeleteparent'),
									form_hidden('parent_id',$parents->user_id),
									form_submit(['name'=>'delete',
												 'value'=>'Delete',
												 'class'=>'btn btn-outline-danger']),
									form_close();
								?>
							</div>
							</td>
						</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<td colspan="3">
							No Data found.
						</td>
						<?php endif; ?>
				</tbody>
			</table>
			
			<?php echo $this->pagination->create_links(); ?>

		</div>


<?php include('footer.php');?>