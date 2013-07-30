<div class="affiliations form">
<?php echo $this->Form->create('Affiliation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Affiliation'); ?></legend>
	<?php
		echo $this->Form->input('AffiliationID');
		echo $this->Form->input('Party');
		echo $this->Form->input('County');
		echo $this->Form->input('Town');
		echo $this->Form->input('Ward');
		echo $this->Form->input('District');
		echo $this->Form->input('CongressionalDistrict');
		echo $this->Form->input('SenatorialDistrict');
		echo $this->Form->input('LegislativeDistrict');
		echo $this->Form->input('SchoolDistrict');
		echo $this->Form->input('CommonCouncilDistrict');
		echo $this->Form->input('CountyLegislativeDistrict');
		echo $this->Form->input('VillageCode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Affiliation.AffiliationID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Affiliation.AffiliationID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Affiliations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
	</ul>
</div>
