<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Add Positions for ' . $voter['Voter']['FirstName'] . ' ' . $voter['Voter']['LastName']); ?></legend>
	<?php
		// get all positions from database using Postion Helper Method
	    $position_array = $this->Position->GetPositionArray();
	    echo $this->Form->input('positions', array('type'=>'select', 'multiple'=>'checkbox', 'label'=>__('Positions'), 'options'=>$position_array));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<!--<li><?php echo $this->Html->link(__('List Positions'), array('action' => 'index')); ?></li>-->
		<li><?php echo $this->Html->link(__('Voter List'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
