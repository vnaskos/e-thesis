<table class="table">
	<tr>
		<th>Name</th>
		<th>Project</th>
		<th>Professor</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	<?php
	$applications = Application::getApplicationsByStudent($user['id']);
	
	foreach($applications as $application) { ?>
		<tr>
			<td><?php echo $application->getStudent()->getFullName().' ('.$application->getStudent()->getAem().')'; ?></td>
			<td><?php echo '<a href="project.php?id='.$application->getProject()->getId().'">'.$application->getProject()->getTitle().'</a>'; ?></td>
			<td><?php echo $application->getProject()->getProfName(); ?></td>
			<td><?php echo $application->getHumanReadableStatus(); ?></td>
			<td>
				<?php if($application->getStatus() == Application::STATUS_WAITING) { ?>
					<a href="manage_application.php?action=cancel&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-primary btn-xs">CANCEL</a>
				<?php } else if($application->getStatus() == Application::STATUS_CANCELED) { ?>
					<a href="manage_application.php?action=reopen&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-primary btn-xs">REOPEN</a>
				<?php } ?>
			</td>
		</tr>
	<?php }	?>
</table>
