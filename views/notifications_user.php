<table class="table">
	<tr>
		<th>#</th>
		<th>Date</th>
		<th>Text</th>
	</tr>
	<?php
	$notifications = Notification::getNotificationsByUser($user['id']);
	
	foreach($notifications as $notification) { ?>
		<tr>
			<td><?php echo $notification->getId(); ?></td>
			<td><?php echo $notification->getCreatedDate(); ?></td>
			<td><?php echo $notification->getText(); ?></td>
		</tr>
	<?php }	?>
</table>