<h2>Log In</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/logIn') ?>

<p><select  name="user_name"</p>
<option disabled>Choose user:</option>
<?php foreach ($users as $users_item): ?>
<option name="<?php echo $users_item['name']?>"><?php echo $users_item['name']?></option>
<?php endforeach;?> </select><br>
<br/>



<label for="password">Password</label><br/>
<input type="password" name="password"><br />

<input type="submit" name="submit" value="Log In!" />

</form>
<p><?php echo anchor('news/index','Back')?></p>
<p><?php echo anchor('users/addUser','Create new'); ?></p>
<p><?php echo anchor('users/logOff','LogOff'); ?></p>

