<!DOCTYPE html>
<html>
<head>
	<title>Your Work List</title>
	<?= link_tag('assets/css1/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>

	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>

		<table class="table table-hover">
			<thead  class="table-dark">
				<tr>
					<th>Sl.no</th>
					<th>Work About</th>
					<th>Notifing Date</th>
					<th>Notifing Time</th>
				</tr>
			</thead>		
			<tbody>
				<?php if(count($to)): 
					$count=$this->uri->segment(3,0);
					foreach($to as $do): ?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= $do->list_body ?></td>
						<td><?= date('l jS F Y',strtotime($do->notify_date)) ?></td>
						<td><?= date('h:i A',strtotime($do->notify_time)) ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
						<td colspan="3">
							No Data found.
						</td>
						<?php endif; ?>
			</tbody>
		</table>
			
			<?php
				echo $this->pagination->create_links(); 
			?>

	</div>


<?php include('footer.php');?>