<div class="addresses view">
<h2><?php  echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('AddressID'); ?></dt>
		<dd>
			<?php echo h($address['Address']['AddressID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address3'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Address3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apartment'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Apartment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($address['Address']['City']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($address['Address']['State']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Zip']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['AddressID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['AddressID']), null, __('Are you sure you want to delete # %s?', $address['Address']['AddressID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Voters'); ?></h3>
	<?php if (!empty($address['Voter'])): ?>
		<dl>
			<dt><?php echo __('VoterID'); ?></dt>
		<dd>
	<?php echo $address['Voter']['VoterID']; ?>
&nbsp;</dd>
		<dt><?php echo __('SourceID'); ?></dt>
		<dd>
	<?php echo $address['Voter']['SourceID']; ?>
&nbsp;</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
	<?php echo $address['Voter']['FirstName']; ?>
&nbsp;</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
	<?php echo $address['Voter']['LastName']; ?>
&nbsp;</dd>
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd>
	<?php echo $address['Voter']['MiddleName']; ?>
&nbsp;</dd>
		<dt><?php echo __('Suffix'); ?></dt>
		<dd>
	<?php echo $address['Voter']['Suffix']; ?>
&nbsp;</dd>
		<dt><?php echo __('DOB'); ?></dt>
		<dd>
	<?php echo $address['Voter']['DOB']; ?>
&nbsp;</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
	<?php echo $address['Voter']['Gender']; ?>
&nbsp;</dd>
		<dt><?php echo __('EyeColor'); ?></dt>
		<dd>
	<?php echo $address['Voter']['EyeColor']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $address['Voter']['Created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
	<?php echo $address['Voter']['Height']; ?>
&nbsp;</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
	<?php echo $address['Voter']['Phone']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressResidentialID'); ?></dt>
		<dd>
	<?php echo $address['Voter']['AddressResidentialID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressMailingID'); ?></dt>
		<dd>
	<?php echo $address['Voter']['AddressMailingID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressAbsenteeID'); ?></dt>
		<dd>
	<?php echo $address['Voter']['AddressAbsenteeID']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li></li>
			</ul>
		</div>
	</div>
	