<div class="voters form">
<?php echo $this->Form->create('Voter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Voter'); ?></legend>
		<?php
			//var_dump($this->Form);
			//die();
			
			echo $this->Form->input('VoterID');
			echo $this->Form->hidden('SourceID');
			echo $this->Form->input('FirstName');
			echo $this->Form->input('LastName');
			echo $this->Form->input('MiddleName');
			echo $this->Form->hidden('Suffix');
			echo $this->Form->input('DOB', array('label'=>'Date of Birth','dateFormat'=>'DMY','minYear'=>date('Y')-70,'maxYear'=>date('Y')-18));
			echo $this->Form->input('Gender');
			echo $this->Form->hidden('EyeColor');
			echo $this->Form->hidden('Created');
			echo $this->Form->hidden('Height');
			echo $this->Form->input('Phone');
			echo $this->Form->hidden('AddressResidentialID');
			echo $this->Form->hidden('AddressMailingID');
			echo $this->Form->hidden('AddressAbsenteeID');
		?>
		<h4>Address Information</h4>
		<dl>
			<dt><?php echo __('Residential Address'); ?></dt>
			<dd><?php
				echo $this->Html->link(
					$voter['ResidentialAddress']['Address1'] . ', ' . 
					$voter['ResidentialAddress']['City'] . ', ' . 
					$voter['ResidentialAddress']['State'], 
					array('controller' => 'addresses', 'action' => 'view', $voter['ResidentialAddress']['AddressID'])); 
					?>
			</dd>
			<dt><?php echo __('Mailing Address'); ?></dt>
			<dd><?php
				echo $this->Html->link(
					$voter['MailingAddress']['Address1'] . ', ' . 
					$voter['MailingAddress']['City'] . ', ' . 
					$voter['MailingAddress']['State'],
					array('controller'=>'addresses', 'action'=>'view', $voter['MailingAddress']['AddressID'])); 
					?>
			</dd>
			<dt><?php echo __('Residential Address'); ?></dt>
			<dd><?php
				echo $this->Html->link(
					$voter['AbsenteeAddress']['Address1'] . ', ' .
					$voter['AbsenteeAddress']['City'] . ', ' . 
					$voter['AbsenteeAddress']['State'],
					array('controller'=>'addresses', 'action'=>'view', $voter['AbsenteeAddress']['AddressID']));
					?>
			</dd>
		</dl>
		<br>
		<br>
		<h4>Affiliations</h4>
		<?php
			echo h('Party: ' . $voter['Affiliation']['Party']);
			echo "<br>";
			echo h('County: ' . $voter['Affiliation']['County']);
			echo "<br>";
			echo h('Town: ' . $voter['Affiliation']['Town']);
			echo "<br>";
			echo h('Ward: ' . $voter['Affiliation']['Ward']);
			echo "<br>";
			echo h('District: ' . $voter['Affiliation']['District']);
			echo "<br>";
			echo h('Congressional District: ' . $voter['Affiliation']['CongressionalDistrict']);
			echo "<br>";
			echo h('Senatorial District: ' . $voter['Affiliation']['SenatorialDistrict']);
			echo "<br>";
			echo h('Legislative District: ' . $voter['Affiliation']['LegislativeDistrict']);
			echo "<br>";
			echo h('School District: ' . $voter['Affiliation']['SchoolDistrict']);
			echo "<br>";
			echo h('Common Council District: ' . $voter['Affiliation']['CommonCouncilDistrict']);
			echo "<br>";
			echo h('Village Code: ' . $voter['Affiliation']['VillageCode']);
			echo "<br>";
		?>
		<br>
		<br>
		<h4>Positions</h4>
		<?php
			echo h('Energy: ');
			echo h(($voter['Position']['Energy']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('SecondAmendment: ');
			echo h(($voter['Position']['SecondAmendment']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('FiscalConservative: ');
			echo h(($voter['Position']['FiscalConservative']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('Volunteer: ');
			echo h(($voter['Position']['Volunteer']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('Hydrofracking: ');
			echo h(($voter['Position']['Hydrofracking']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('KeystonePipeline: ');
			echo h(($voter['Position']['KeystonePipeline']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('ImmigrationReform: ');
			echo h(($voter['Position']['ImmigrationReform']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('ProChoice: ');
			echo h(($voter['Position']['ProChoice']) == 1 ? 'true' : 'false');
			echo "<br>";
			echo h('Donor: ');
			echo h(($voter['Position']['Donor']) == 1 ? 'true' : 'false');
			echo "<br>";
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete Voter'), array('action' => 'delete', $this->Form->value('Voter.VoterID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Voter.VoterID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?></li>
		<!--<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>-->
	</ul>
	<br>
	<ul>	
		<?php // create the address buttons with a query string argument that will tell us which button was clicked ?>
		<li><?php 
			if(empty($voter['ResidentialAddress'])) {
				echo $this->Html->link(__('Add Residential'), array('controller' => 'addresses', 'action' => 'add', '?' => array('vid'=>$voter['VoterID']), 'btn'=>'res')); 
			} else {
				echo $this->Html->link(__('Edit Residential'), array('controller' => 'addresses', 'action' => 'edit', $voter['ResidentialAddress']['AddressID'])); 
			}?> 
		</li>
		<li><?php 
			if(empty($voter['MailingAddress'])) {
				echo $this->Html->link(__('Add Mailing'), array('controller' => 'addresses', 'action' => 'add', '?' => array('vid'=>$voter['VoterID']), 'btn'=>'mal')); 
			} else {
				echo $this->Html->link(__('Edit Mailing'), array('controller' => 'addresses', 'action' => 'edit', $voter['MailingAddress']['AddressID'])); 
			}?> 
		</li>
		<li><?php 
			if(empty($voter['AbsenteeAddress'])) {
				echo $this->Html->link(__('Add Absentee'), array('controller' => 'addresses', 'action' => 'add', '?' => array('vid'=>$voter['VoterID']), 'btn'=>'abs')); 
			} else {
				echo $this->Html->link(__('Edit Absentee'), array('controller' => 'addresses', 'action' => 'edit', $voter['AbsenteeAddress']['AddressID'])); 
			}?> 
		</li>
	</ul>
	<br>
	<ul>	
		<li>
		<?php
			// affiliation link
			if(empty($voter['Affiliation']['AffiliationID'])) {
				echo $this->Html->link(__('Add Affiliations'), array('controller' => 'affiliations', 'action' => 'add')); 
			} else {
				echo $this->Html->link(__('Edit Affilations'), array('controller' => 'affiliations', 'action' => 'edit', $voter['Affiliation']['AffiliationID'])); 
			}
		?>
		</li>
	</ul>
	<br>
	<ul>	
		<li>
		<?php
			// position link
			if(empty($voter['Position']['PositionID'])) {
				echo $this->Html->link(__('Add Positions'), array('controller' => 'positions', 'action' => 'add')); 
			} else {
				echo $this->Html->link(__('Edit Positions'), array('controller' => 'positions', 'action' => 'edit', $voter['Position']['PositionID'])); 
			}
		?>
		</li>
	</ul>
</div>
