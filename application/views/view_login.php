
<?php 
	echo form_open('login/validate');

	echo form_input('username', 'Username');
	echo form_input('password', 'Password');
	echo form_submit('submit', 'Submit');
	echo anchor('login/register', 'Register');

	echo form_close();
?>