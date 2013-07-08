<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
		<?php
			//var_dump($this->Form);
			//die();
			echo $this->Form->input('id');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
        	echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'author' => 'Author')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $this->Form->value('User.VoterID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.VoterID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
	<br>
</div>
