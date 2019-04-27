<!DOCTYPE html>
<html>
<head>
	<title>Child Care List</title>
	<?= link_tag('assets/css1/bootstrap.min.css') ?> <!--loading css -->
</head>

<body>

	<div class="container">
		<?php include('header.php'); ?>
		<?php include('parentnavigation.php'); ?>
		<fieldset class="navbar navbar-expand-lg navbar-dark bg-dark">            
        	<?= form_open('viewload/child_problem_search',['class'=>'navbar-form form-inline my-2 my-lg-0','role'=>'search']) ?>
            <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search Child Problem">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        <?= form_close(); ?>
        <?= form_error('query',"<strong class='navbar-text'>",'</strong>')?>
        </fieldset>
        
		<table class="table table-hover">
			<thead  class="table-dark">
				<tr>
					<th>Sl.no</th>
					<th>Child Problem Name</th>
					<th>Symptoms</th>
					<th>Problem Details</th>
					<th>Prevention</th>
				</tr>
			</thead>		
			<tbody>
				<?php if(count($list)): 
					$count=$this->uri->segment(4,0);
					foreach($list as $ccare): ?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= $ccare->problem_name ?></td>
						<td><?= $ccare->symptoms ?></td>
						<td><?= $ccare->problem_details ?></td>
						<td><?= $ccare->prevention ?></td>
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