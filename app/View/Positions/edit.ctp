<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Edit Position for ' . $voter['Voter']['FirstName'] . ' ' . $voter['Voter']['LastName']); ?></legend>
	<?php
		echo $this->Form->input('PositionID');
		echo $this->Form->input('Energy');
		echo $this->Form->input('SecondAmendment');
		echo $this->Form->input('FiscalConservative');
		echo $this->Form->input('Volunteer');
		echo $this->Form->input('Hydrofracking');
		echo $this->Form->input('KeystonePipeline');
		echo $this->Form->input('ImmigrationReform');
		echo $this->Form->input('ProChoice');
		echo $this->Form->input('Donor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<!--<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Position.PositionID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Position.PositionID'))); ?></li>-->
		<!--<li><?php echo $this->Html->link(__('List Positions'), array('action' => 'index')); ?></li>-->
		<!--<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('Back to Voter'), array('controller' => 'voters', 'action' => 'view', $voter['Voter']['VoterID'])); ?> </li>
	</ul>
</div>
