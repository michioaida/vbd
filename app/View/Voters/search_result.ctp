<div class="voters index">
	<table>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<th>Gender</th>
			<th>Residential Address</th>
			<th>Party</th>
			<th>&nbsp;</th>
		</tr>
		<?php 
		// if we have a voter list, display it
		if (isset($voters)){
			foreach ($voters as $voter): ?>
			<tr>
				<td><?php 
						echo $this->Html->link(h($voter['Voter']['FirstName']) . ' ' . h($voter['Voter']['LastName']), array('controller'=>'Voters', 'action'=>'view', $voter['Voter']['VoterID'])); 
					?>&nbsp;
				</td>
				<td><?php echo h($voter['Voter']['Gender']); ?>&nbsp;</td>
				<td><?php echo
							h($voter['ResidentialAddress']['StreetNumber']) . ' ' . 
							h($voter['ResidentialAddress']['Address1']) . ' ' . 
							h($voter['ResidentialAddress']['City']) . ' ' . 
							h($voter['ResidentialAddress']['Zip']); ?>&nbsp;
				</td>
				<td><?php echo h($voter['Affiliation']['Party']); ?>&nbsp;</td>
				<td class="actions">
					<?php //echo $this->Html->link(__('View'), array('action' => 'view', $voter['Voter']['VoterID'])); ?>
				</td>
			</tr>
			<?php endforeach; 
		} ?>
	</table>
	<p>
		<?php
			// display the paging information
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
		?>	
	</p>
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
		<li><?php echo $this->Html->link('Back',"javascript:history.back()"); ?></li>
	</ul>
</div> 