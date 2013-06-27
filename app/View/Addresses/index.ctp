<div class="addresses index">
	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('AddressID'); ?></th>
			<th><?php echo $this->Paginator->sort('Address1'); ?></th>
			<th><?php echo $this->Paginator->sort('Address2'); ?></th>
			<th><?php echo $this->Paginator->sort('Address3'); ?></th>
			<th><?php echo $this->Paginator->sort('Apartment'); ?></th>
			<th><?php echo $this->Paginator->sort('City'); ?></th>
			<th><?php echo $this->Paginator->sort('State'); ?></th>
			<th><?php echo $this->Paginator->sort('Zip'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['AddressID']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Address1']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Address2']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Address3']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Apartment']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['City']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['State']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Zip']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['AddressID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['AddressID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['AddressID']), null, __('Are you sure you want to delete # %s?', $address['Address']['AddressID'])); ?>
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
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>
	</ul>
</div>
