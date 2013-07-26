<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Edit Position for ' . $voter['Voter']['FirstName'] . ' ' . $voter['Voter']['LastName']); ?></legend>
	<?php
		// get all positions from database using Postion Helper Method
	    $position_array = $this->Position->GetPositionArray();
	    //$position_array = $this->Position->GetPositionArrayByVoterID($voter['Voter']['PositionID']);
	    //var_dump($position_array);
	    //die();

	    $selected = array();
	    echo $this->Form->input('positions', 
	    	array(	'type'=>'select', 
	    			'multiple'=>'checkbox', 
	    			'label'=>__('Positions'),
	    			'options'=>$position_array,
	    			'selected'=>$selected
	    			));
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
