<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Edit Position for ' . $voter['Voter']['FirstName'] . ' ' . $voter['Voter']['LastName']); ?></legend>
	<?php
		// get all positions from database using Postion Helper Method
	    $position_array = $this->Position->GetPositionArray();
	    $selected = $this->Position->GetPositionArrayByVoterID($voter['Voter']['PositionID']);
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
		<li><?php echo $this->Html->link(__('Back to Voter'), array('controller' => 'voters', 'action' => 'view', $voter['Voter']['VoterID'])); ?> </li>
	</ul>
</div>
