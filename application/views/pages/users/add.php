<h2>Enter your data:</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/addUser') ?>

<label for="name">Name</label>
<input type="input" name="name" /><br />

<label for="email">E-mail</label>
<input type="input" name="email"><br />

<label for="password">Password</label>
<input type="password" name="password"><br />

<input type="submit" name="submit" value="Create" />

</form>
<p><a href='/news/index'>Back</a> </p>

