<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('AddressID');
		echo $this->Form->input('Address1');
		echo $this->Form->input('Address2');
		echo $this->Form->input('Address3');
		echo $this->Form->input('Apartment');
		echo $this->Form->input('City');
		echo $this->Form->input('State');
		echo $this->Form->input('Zip');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.AddressID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Address.AddressID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
	</ul>
</div>
