<div class="voters index">
	<h2><?php echo __('Voters'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('VoterID'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('SourceID'); ?></th>-->
			<th><?php echo $this->Paginator->sort('FirstName'); ?></th>
			<th><?php echo $this->Paginator->sort('LastName'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('MiddleName'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Suffix'); ?></th>-->
			<th><?php echo $this->Paginator->sort('DOB'); ?></th>
			<th><?php echo $this->Paginator->sort('Gender'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('EyeColor'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Created'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Height'); ?></th>-->
			<th><?php echo $this->Paginator->sort('Phone'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('AddressResidentialID'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('AddressMailingID'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('AddressAbsenteeID'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($voters as $voter): ?>
	<tr>
		<!--<td><?php echo h($voter['Voter']['VoterID']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($voter['Voter']['SourceID']); ?>&nbsp;</td>-->
		<td><?php echo h($voter['Voter']['FirstName']); ?>&nbsp;</td>
		<td><?php echo h($voter['Voter']['LastName']); ?>&nbsp;</td>
		<!--<td><?php echo h($voter['Voter']['MiddleName']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($voter['Voter']['Suffix']); ?>&nbsp;</td>-->
		<td><?php echo h($voter['Voter']['DOB']); ?>&nbsp;</td>
		<td><?php echo h($voter['Voter']['Gender']); ?>&nbsp;</td>
		<!--<td><?php echo h($voter['Voter']['EyeColor']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($voter['Voter']['Created']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($voter['Voter']['Height']); ?>&nbsp;</td>-->
		<td><?php echo h($voter['Voter']['Phone']); ?>&nbsp;</td>
		<!--<td><?php echo $this->Html->link($voter['ResidentialAddress']['AddressID'], array('controller' => 'addresses', 'action' => 'view', $voter['ResidentialAddress']['AddressID'])); ?></td>-->
		<!--<td><?php echo h($voter['Voter']['AddressMailingID']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($voter['Voter']['AddressAbsenteeID']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $voter['Voter']['VoterID'])); ?>
			<!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $voter['Voter']['VoterID'])); ?>-->
			<!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $voter['Voter']['VoterID']), null, __('Are you sure you want to delete # %s?', $voter['Voter']['VoterID'])); ?>-->
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
		<li><?php echo $this->Html->link(__('Search Voters'), array('action' => 'search')); ?></li>
	</ul>
</div>
