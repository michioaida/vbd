<?php 
//var_dump($voter);
//die();
?>
<div class="voters view">
<h2><?php  echo __('Voter'); ?></h2>
	<dl>
		<!--
		<dt><?php echo __('VoterID'); ?></dt>
		<dd><?php echo h($voter['Voter']['VoterID']); ?>&nbsp;</dd>
		<dt><?php echo __('SourceID'); ?></dt>
		<dd><?php echo h($voter['Voter']['SourceID']); ?>&nbsp;</dd>
		-->
		<dt><?php echo __('FirstName'); ?></dt>
		<dd><?php echo h($voter['Voter']['FirstName']); ?>&nbsp;</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd><?php echo h($voter['Voter']['LastName']); ?>&nbsp;</dd>
		<!--
		<dt><?php echo __('MiddleName'); ?></dt>
		<dd><?php echo h($voter['Voter']['MiddleName']); ?>&nbsp;</dd>
		<dt><?php echo __('Suffix'); ?></dt>
		<dd><?php echo h($voter['Voter']['Suffix']); ?>&nbsp;</dd>
		-->
		<dt><?php echo __('DOB'); ?></dt>
		<dd><?php echo h($voter['Voter']['DOB']); ?>&nbsp;</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd><?php echo h($voter['Voter']['Gender']); ?>&nbsp;</dd>
		<!--
		<dt><?php echo __('EyeColor'); ?></dt>
		<dd><?php echo h($voter['Voter']['EyeColor']); ?>&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php echo h($voter['Voter']['Created']); ?>&nbsp;</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd><?php echo h($voter['Voter']['Height']); ?>&nbsp;</dd>
		-->
		<dt><?php echo __('Phone'); ?></dt>
		<dd><?php echo h($voter['Voter']['Phone']); ?>&nbsp;</dd>
	</dl>
	<br>
	<h4><?php  echo __('Address Information'); ?></h4>
	<dl>
		<dt><?php echo __('Residential Address'); ?></dt>
		<dd>
			<?php 
			if (!empty($voter['ResidentialAddress'])){
				echo h($voter['ResidentialAddress']['Address1'] . ' ' . $voter['ResidentialAddress']['City'] . ' ' . $voter['ResidentialAddress']['State']);
			} else {
				echo "None";
			}?>&nbsp;
		</dd>
		<dt><?php echo __('Mailing Address'); ?></dt>
		<dd>
			<?php 
			if (!empty($voter['MailingAddress'])){
				echo h($voter['MailingAddress']['Address1'] . ' ' . $voter['MailingAddress']['City'] . ' ' . $voter['MailingAddress']['State']);
			} else {
				echo "None";
			}?>&nbsp;
		</dd>
		<dt><?php echo __('Absentee Address'); ?></dt>
		<dd>
			<?php 
			if (!empty($voter['AbsenteeAddress'])){
				echo h($voter['AbsenteeAddress']['Address1'] . ' ' . $voter['AbsenteeAddress']['City'] . ' ' . $voter['AbsenteeAddress']['State']);
			}else{
				echo "None";
			}?>&nbsp;
		</dd>
	</dl>
	<br>
	<h4><?php  echo __('Affiliation Information'); ?></h4>
	<dl>
		<dt><?php echo __('Party'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['Party']); ?>&nbsp;</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['County']); ?>&nbsp;</dd>
		<dt><?php echo __('Town'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['Town']); ?>&nbsp;</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['Ward']); ?>&nbsp;</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['District']); ?>&nbsp;</dd>
		<dt><?php echo __('Congressional District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['CongressionalDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('Senatorial District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['SenatorialDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('Legislative District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['LegislativeDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('School District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['SchoolDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('Common Council District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['CommonCouncilDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('County Legislative District'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['CountyLegislativeDistrict']); ?>&nbsp;</dd>
		<dt><?php echo __('Village Code'); ?></dt>
		<dd><?php echo h($voter['Affiliation']['VillageCode']); ?>&nbsp;</dd>
	</dl>
	<br>
	<h4><?php  echo __('Voter Postions'); ?></h4>
	<?php if (strlen($voter['Voter']['PositionID']) == 0) {
		echo "None - " . $this->Html->link(__('click here to add'), array('controller' => 'positions', 'action' => 'Add', '?' => array('id' => $voter['Voter']['VoterID'])));
	} else { ?>
	<dl>
		<dt><?php echo __('Second Amendment'); ?></dt>
		<dd><?php echo h(($voter['Position']['SecondAmendment']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Fiscal Conservative'); ?></dt>
		<dd><?php echo h(($voter['Position']['FiscalConservative']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Volunteer'); ?></dt>
		<dd><?php echo h(($voter['Position']['Volunteer']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Hydrofracking'); ?></dt>
		<dd><?php echo h(($voter['Position']['Hydrofracking']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Keystone Pipeline'); ?></dt>
		<dd><?php echo h(($voter['Position']['KeystonePipeline']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Immigration Reform'); ?></dt>
		<dd><?php echo h(($voter['Position']['ImmigrationReform']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Pro Choice'); ?></dt>
		<dd><?php echo h(($voter['Position']['ProChoice']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
		<dt><?php echo __('Donor'); ?></dt>
		<dd><?php echo h(($voter['Position']['Donor']) == 1 ? 'true' : 'false') ?>&nbsp;</dd>
	</dl>
	<?php } ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('Edit Voter'), array('action' => 'edit', $voter['Voter']['VoterID'])); ?> </li>-->
		<li>
		<?php // change link depending if we have a postion for this voter or not
			if (strlen($voter['Voter']['PositionID']) == 0) {
				echo $this->Html->link(__('Add Voter Positions'), array('controller' => 'positions', 'action' => 'Add', '?' => array('id' => $voter['Voter']['VoterID'])));
			} else {
				echo $this->Html->link(__('Edit Voter Positions'), array('controller' => 'positions', 'action' => 'edit', $voter['Voter']['PositionID'], '?' => array('id' => $voter['Voter']['VoterID'])));
			} ?>
		</li>
		<!--<li><?php echo $this->Form->postLink(__('Delete Voter'), array('action' => 'delete', $voter['Voter']['VoterID']), null, __('Are you sure you want to delete # %s?', $voter['Voter']['VoterID'])); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Voter'), array('action' => 'add')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('New Residential Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
