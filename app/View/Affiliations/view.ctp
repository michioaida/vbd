<div class="affiliations view">
<h2><?php  echo __('Affiliation'); ?></h2>
	<dl>
		<dt><?php echo __('AffiliationID'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['AffiliationID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Party'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['Party']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['County']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Town'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['Town']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['Ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['District']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CongressionalDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['CongressionalDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SenatorialDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['SenatorialDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LegislativeDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['LegislativeDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SchoolDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['SchoolDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CommonCouncilDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['CommonCouncilDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountyLegislativeDistrict'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['CountyLegislativeDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VillageCode'); ?></dt>
		<dd>
			<?php echo h($affiliation['Affiliation']['VillageCode']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Affiliation'), array('action' => 'edit', $affiliation['Affiliation']['AffiliationID'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Affiliation'), array('action' => 'delete', $affiliation['Affiliation']['AffiliationID']), null, __('Are you sure you want to delete # %s?', $affiliation['Affiliation']['AffiliationID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Affiliations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Affiliation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Voters'), array('controller' => 'voters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voter'), array('controller' => 'voters', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Voters'); ?></h3>
	<?php if (!empty($affiliation['Voter'])): ?>
		<dl>
			<dt><?php echo __('VoterID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['VoterID']; ?>
&nbsp;</dd>
		<dt><?php echo __('SourceID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['SourceID']; ?>
&nbsp;</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Status']; ?>
&nbsp;</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['FirstName']; ?>
&nbsp;</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['LastName']; ?>
&nbsp;</dd>
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['MiddleName']; ?>
&nbsp;</dd>
		<dt><?php echo __('Suffix'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Suffix']; ?>
&nbsp;</dd>
		<dt><?php echo __('DOB'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['DOB']; ?>
&nbsp;</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Gender']; ?>
&nbsp;</dd>
		<dt><?php echo __('EyeColor'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['EyeColor']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Height']; ?>
&nbsp;</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['Phone']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressResidentialID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['AddressResidentialID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressMailingID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['AddressMailingID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AddressAbsenteeID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['AddressAbsenteeID']; ?>
&nbsp;</dd>
		<dt><?php echo __('AffiliationID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['AffiliationID']; ?>
&nbsp;</dd>
		<dt><?php echo __('PositionID'); ?></dt>
		<dd>
	<?php echo $affiliation['Voter']['PositionID']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li></li>
			</ul>
		</div>
	</div>
	