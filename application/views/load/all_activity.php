<!DOCTYPE html>
<html>
<head>
	<title>Activity List</title>
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
					<th>Activity Title</th>
					<th style="text-align:center;">Activity Body</th>
					<th>Created At</th>
				</tr>
			</thead>		
			<tbody>
				<?php if(count($activity)): 
					$count=$this->uri->segment(3,0);
					foreach($activity as $activities): ?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= $activities->activity_title ?></td>
						<td><?= $activities->activity_body ?></td>
						<td><?= date('h:i:s A  l, jS F Y',strtotime($activities->create_at)) ?></td>
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