<div class="voters index">
	<h2><?php echo __('Search Voters'); ?></h2>
	<?php 
		echo $this->Form->create("Voter", array('action' => 'search'));
	    echo $this->Form->input("q", array('label' => 'Search for Last Name'));
	    echo $this->Form->end(__('Search'));
	?> 
	<br>
	<br>
	<table>
	<?php // if we have a voter list, display it
	if (isset($voters)){
		foreach ($voters as $voter): ?>
		<tr>
			<td><?php echo __('First Name:'); ?></td>
			<td><?php echo h($voter['Voter']['FirstName']); ?>&nbsp;</td>
			<td><?php echo __('Last Name:'); ?></td>
			<td><?php echo h($voter['Voter']['LastName']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $voter['Voter']['VoterID'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $voter['Voter']['VoterID']), null, __('Are you sure you want to delete # %s?', $voter['Voter']['VoterID'])); ?>
			</td>
		</tr>
		<?php endforeach; 
	} ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Voter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?> </li>
	</ul>
</div>