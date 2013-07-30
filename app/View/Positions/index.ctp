<div class="positions index">
	<h2><?php echo __('Positions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('PositionID'); ?></th>
			<th><?php echo $this->Paginator->sort('Energy'); ?></th>
			<th><?php echo $this->Paginator->sort('SecondAmendment'); ?></th>
			<th><?php echo $this->Paginator->sort('FiscalConservative'); ?></th>
			<th><?php echo $this->Paginator->sort('Volunteer'); ?></th>
			<th><?php echo $this->Paginator->sort('Hydrofracking'); ?></th>
			<th><?php echo $this->Paginator->sort('KeystonePipeline'); ?></th>
			<th><?php echo $this->Paginator->sort('ImmigrationReform'); ?></th>
			<th><?php echo $this->Paginator->sort('ProChoice'); ?></th>
			<th><?php echo $this->Paginator->sort('Donor'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($positions as $position): ?>
	<tr>
		<td><?php echo h($position['Position']['PositionID']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['Energy']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['SecondAmendment']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['FiscalConservative']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['Volunteer']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['Hydrofracking']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['KeystonePipeline']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['ImmigrationReform']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['ProChoice']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['Donor']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $position['Position']['PositionID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $position['Position']['PositionID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $position['Position']['PositionID']), null, __('Are you sure you want to delete # %s?', $position['Position']['PositionID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Position'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
	</ul>
</div>
