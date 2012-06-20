<div class="input-set">
<?php
	echo form_open('login/register_user'); 
	echo form_input('first_name', 'First Name');
	echo form_input('last_name', 'Last Name');
	echo form_input('email', 'Email Address');
?>
</div>
<div class="input-set">
<?php

	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Register');
	echo form_close(); 
	echo validation_errors('<p class="validation-error">'); 
?>
</div>