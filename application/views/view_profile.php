<?php echo anchor('profile/logout', 'Logout');?>
<hgroup>
	<h1 class="profile-title">
		Welcome, <?php echo $records->first_name ." ". $records->last_name;?>!
	</h1>
	<h2>
		Email: <?php echo $records->email; ?>
	</h2>
</hgroup>
<hr>
<h2>
	Add a new photo
</h2>
<?php 
	echo form_open_multipart('profile/add_photo');
	echo form_input('title', '', 'placeholder="Title"');
	echo form_input('author', '', 'placeholder="Author"');
	echo form_textarea('description', '', 'placeholder="Enter an image description"');
	echo form_upload('userfile', 'Upload Image');
	echo form_submit('submit', 'Add Photo');
	echo form_close();
?>
<hr>
<h2>
	Your images
</h2>
<?php foreach($images as $img) : ?>

<img src="<?php echo base_url().'uploads/'.$img->image ?>">
<h3>Title: <?php echo $img->title; ?></h3>
<p>Author: <?php echo $img->author; ?></p>
<p>Description <?php echo $img->description; ?></p>

<?php endforeach; ?>




