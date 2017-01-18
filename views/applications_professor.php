<table class="table">
	<tr>
		<th>Name</th>
		<th>Project</th>
		<th>Professor</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	<?php
	$applications = Application::getApplicationsByProfessor($user['id']);
	
	foreach($applications as $application) {
	
		$sid = $application->getStudent()->getId();
		$sname = $application->getStudent()->getFullName();
		$saem = $application->getStudent()->getAem(); ?>
		<tr>
			<td><?php echo '<a href="profile.php?uid='.$sid.'">'.$sname.' ('.$saem.')</a>'; ?></td>
			<td><?php echo '<a href="project.php?id='.$application->getProject()->getId().'">'.$application->getProject()->getTitle().'</a>'; ?></td>
			<td><?php echo $application->getProject()->getProfName(); ?></td>
			<td><?php echo $application->getHumanReadableStatus(); ?></td>
			<td>
				<?php if($application->getStatus() == Application::STATUS_WAITING) { ?>
					<a href="manage_application.php?action=accept&sid=<?php echo $application->getStudent()->getId(); ?>&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-primary btn-xs">ACCEPT</a>
					<a href="manage_application.php?action=reject&sid=<?php echo $application->getStudent()->getId(); ?>&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-danger btn-xs">REJECT</a>
				<?php } else if($application->getStatus() == Application::STATUS_REJECTED) { ?>
					<a href="manage_application.php?action=accept&sid=<?php echo $application->getStudent()->getId(); ?>&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-primary btn-xs">ACCEPT</a>
				<?php } else if($application->getStatus() == Application::STATUS_ACCEPTED) { ?>
					<a href="manage_application.php?action=reject&sid=<?php echo $application->getStudent()->getId(); ?>&pid=<?php echo $application->getProject()->getId(); ?>" class="btn btn-danger btn-xs">REJECT</a>
				<?php } ?>
			</td>
		</tr>
	<?php }	?>
</table>
