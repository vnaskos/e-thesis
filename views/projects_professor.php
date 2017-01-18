<table class="table">
	<tr>
		<th>#</th>
		<th>Date</th>
		<th>Title</th>
		<th>Professor</th>
		<th>Actions</th>
	</tr>
	<?php
	$projects = Project::getProjects();
	
	foreach($projects as $project) { ?>
		<tr>
			<td><?php echo $project->getId(); ?></td>
			<td><?php echo $project->getCreatedDate(); ?></td>
			<td><?php echo '<a href="project.php?id='.$project->getId().'">'.$project->getTitle().'</a>'; ?></td>
			<td><?php echo $project->getProfName(); ?></td>
			<td><a href="manage_project.php?action=edit&pid=<?php echo $project->getId(); ?>" class="btn btn-primary btn-xs">Edit</a></td>
		</tr>
	<?php }	?>
</table>