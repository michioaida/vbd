<div class="affiliations index">
	<h2><?php echo __('Affiliations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('AffiliationID'); ?></th>
			<th><?php echo $this->Paginator->sort('Party'); ?></th>
			<th><?php echo $this->Paginator->sort('County'); ?></th>
			<th><?php echo $this->Paginator->sort('Town'); ?></th>
			<th><?php echo $this->Paginator->sort('Ward'); ?></th>
			<th><?php echo $this->Paginator->sort('District'); ?></th>
			<th><?php echo $this->Paginator->sort('CongressionalDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('SenatorialDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('LegislativeDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('SchoolDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('CommonCouncilDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('CountyLegislativeDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('VillageCode'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($affiliations as $affiliation): ?>
	<tr>
		<td><?php echo h($affiliation['Affiliation']['AffiliationID']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['Party']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['County']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['Town']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['Ward']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['District']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['CongressionalDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['SenatorialDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['LegislativeDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['SchoolDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['CommonCouncilDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['CountyLegislativeDistrict']); ?>&nbsp;</td>
		<td><?php echo h($affiliation['Affiliation']['VillageCode']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $affiliation['Affiliation']['AffiliationID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $affiliation['Affiliation']['AffiliationID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $affiliation['Affiliation']['AffiliationID']), null, __('Are you sure you want to delete # %s?', $affiliation['Affiliation']['AffiliationID'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Affiliation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
	</ul>
</div>
