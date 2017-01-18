<table class="table">
	<tr>
		<th>#</th>
		<th>Date<th>
		<th>Title</th>
		<th>Professor</th>
	</tr>
	<?php
	$projects = Project::getProjects();
	
	foreach($projects as $project) { ?>
		<tr>
			<td><?php echo $project->getId(); ?></td>
			<td><?php echo $project->getCreatedDate(); ?></td>
			<td><?php echo '<a href="project.php?id='.$project->getId().'">'.$project->getTitle().'</a>'; ?></td>
			<td><?php echo $project->getProfName(); ?></td>
		</tr>
	<?php }	?>
</table>