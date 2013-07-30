<div class="positions view">
<h2><?php  echo __('Position'); ?></h2>
	<dl>
		<dt><?php echo __('PositionID'); ?></dt>
		<dd>
			<?php echo h($position['Position']['PositionID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Energy'); ?></dt>
		<dd>
			<?php echo h($position['Position']['Energy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SecondAmendment'); ?></dt>
		<dd>
			<?php echo h($position['Position']['SecondAmendment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FiscalConservative'); ?></dt>
		<dd>
			<?php echo h($position['Position']['FiscalConservative']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volunteer'); ?></dt>
		<dd>
			<?php echo h($position['Position']['Volunteer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hydrofracking'); ?></dt>
		<dd>
			<?php echo h($position['Position']['Hydrofracking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('KeystonePipeline'); ?></dt>
		<dd>
			<?php echo h($position['Position']['KeystonePipeline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImmigrationReform'); ?></dt>
		<dd>
			<?php echo h($position['Position']['ImmigrationReform']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ProChoice'); ?></dt>
		<dd>
			<?php echo h($position['Position']['ProChoice']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donor'); ?></dt>
		<dd>
			<?php echo h($position['Position']['Donor']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Position'), array('action' => 'edit', $position['Position']['PositionID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Position'), array('action' => 'delete', $position['Position']['PositionID']), null, __('Are you sure you want to delete # %s?', $position['Position']['PositionID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Voters'); ?></h3>
	<?php if (!empty($position['Voter'])): ?>
		<dl>
			<dt><?php echo __('VoterID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['VoterID']; ?>
&nbsp;</dd>
		<dt><?php echo __('SourceID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['SourceID']; ?>
&nbsp;</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Status']; ?>
&nbsp;</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
	<?php echo $position['Voter']['FirstName']; ?>
&nbsp;</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
	<?php echo $position['Voter']['LastName']; ?>
&nbsp;</dd>
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd>
	<?php echo $position['Voter']['MiddleName']; ?>
&nbsp;</dd>
		<dt><?php echo __('Suffix'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Suffix']; ?>
&nbsp;</dd>
		<dt><?php echo __('DOB'); ?></dt>
		<dd>
	<?php echo $position['Voter']['DOB']; ?>
&nbsp;</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Gender']; ?>
&nbsp;</dd>
		<dt><?php echo __('EyeColor'); ?></dt>
		<dd>
	<?php echo $position['Voter']['EyeColor']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Height']; ?>
&nbsp;</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
	<?php echo $position['Voter']['Phone']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressResidentialID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['AddressResidentialID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressMailingID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['AddressMailingID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressAbsenteeID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['AddressAbsenteeID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AffiliationID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['AffiliationID']; ?>
&nbsp;</dd>
		<dt><?php echo __('PositionID'); ?></dt>
		<dd>
	<?php echo $position['Voter']['PositionID']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li></li>
			</ul>
		</div>
	</div>
	