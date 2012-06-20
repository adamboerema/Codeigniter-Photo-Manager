<?php echo anchor('profile/logout', 'Logout');?>

<h1 class="profile-title">
	Welcome, <?php echo $records[0]->first_name ." ". $records[0]->last_name;?>!
</h1>
<h2>
	Email: <?php echo $records[0]->email; ?>
</h2>