<div class="voters form">
<?php echo $this->Form->create('Voter'); ?>
	<fieldset>
		<legend><?php echo __('Add Voter'); ?></legend>
	<?php
		//echo $this->Form->input('SourceID');
		echo $this->Form->input('FirstName');
		echo $this->Form->input('LastName');
		//echo $this->Form->input('MiddleName');
		//echo $this->Form->input('Suffix');
		echo $this->Form->input('DOB');
		echo $this->Form->input('Gender');
		//echo $this->Form->input('EyeColor');
		//echo $this->Form->input('Created');
		//echo $this->Form->input('Height');
		echo $this->Form->input('Phone');
		//echo $this->Form->input('AddressResidentialID');
		//echo $this->Form->input('AddressMailingID');
		//echo $this->Form->input('AddressAbsenteeID');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?></li>
		<!--<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Residential Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
