<div class="voters index">
	<h2><?php echo __('Search Voters'); ?></h2>
	<?php 
		echo $this->Form->create("Voter", array('action' => 'search'));
	   // echo $this->Form->input("name", array('label' => 'Name'));
	    echo $this->Form->input("firstName", array('label' => 'First Name'));
	    echo $this->Form->input("lastName", array('label' => 'Last Name'));
	    $gender_array = array('0'=>' ** Choose Gender ** ', 'M'=>'Male', 'F'=>'Female');
	    echo $this->Form->input('gender', array('type'=>'select', 'label'=>'Gender', 'options'=>$gender_array));
	    $party_array = array('0'=>' ** Choose Party ** ', 'BLK'=>'Blank', 'CON'=>'Conservative', 'DEM'=>'Democratic', 'GRE'=>'Green', 'IND'=>'Independence', 'LBN'=>'Libertarian', 'LIB'=>'Liberal', 'REP'=>'Republican', 'RTL'=>'Right to Life', 'WOR'=>'Working Family', 'OTH'=>'Other');
	    echo $this->Form->input('party', array('div' => array('id' => 'partyDiv'), 'type'=>'select', 'label'=>'Party', 'options'=>$party_array));
	    echo $this->Form->input("address", array('div' => array('id' => 'addressDiv'), 'label' => 'Street')); 
	    echo $this->Form->input("city", array('div' => array('id' => 'cityDiv'), 'label' => 'City'));
	    echo $this->Form->input("zip", array('div' => array('id' => 'zipDiv'), 'label' => 'Zipcode'));   
	    //echo $this->Form->input("election_year_start", array('label'=>'Election Year Start (ex: 2013)')); 
	    //echo $this->Form->input("election_year_end", array('label'=>'Election Year End (ex: 2013)'));
	    //$election_list = array('PP'=>'Presidential Primary', 'PE'=>'Primary Election', 'GE'=>'General Election', 'PF'=>'Primary Federal', 'SE'=>'Special Election');
	    //echo $this->Form->input('election_code', array('type'=>'select', 'multiple'=>'checkbox', 'label'=> __('Election'), 'options'=>$election_list));
	    echo '<br style="clear: both;" />';
	    echo '<span class="title">Election Years </span><a class="show_hide">Show/hide</a><div>';
	    echo $this->Form->input('election_years', array('div' => array('id' => 'electionyearDiv'), 'type'=>'select', 'multiple'=>'checkbox', 'options'=> array('GE07'=>'GE07', 'GE08'=>'GE08', 'GE09'=>'GE09', 'GE10'=>'GE10', 'GE11'=>'GE11', 'GE12'=>'GE12', 'PE07'=>'PE07', 'PE08'=>'PE08', 'PE09'=>'PE09', 'PE10'=>'PE10', 'PE11'=>'PE11', 'PE12'=>'PE12')));
		echo '</div>';
	    // get issues from Position Helper so we can filter result set by them
	    $position_array = $this->Position->GetPositionArray();
	    
	    echo '<br style="clear: both;" />';
	    echo '<span class="title">Positions</span> <a class="show_hide1">Show/hide</a><div>';
	    echo $this->Form->input('positions', array('div' => array('id' => 'positionsDiv'), 'type'=>'select', 'multiple'=>'checkbox', 'options'=>$position_array));
	    echo '<br style="clear: both;" />';
	    echo '</div>';
	    
	    //echo $this->Form->end(__('Search'));
	    echo $this->Form->submit('Search', array('name'=>'submitbutton', 'value'=>'search')); 
 		echo $this->Form->submit('Export to CSV', array('name'=>'submitbutton', 'value'=>'export')); 
 		echo '<br style="clear: both;" />';
 		echo $this->Form->end(); 
	    

	?> 
	<br>
	<table>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<th>Gender</th>
			<th>Residential Address</th>
			<th>Party</th>
			<th>&nbsp;</th>
		</tr>
		<?php // if we have a voter list, display it
		if (isset($voters)){

			echo "<b>Result Count:</b> " . count($voters); 
			
			foreach ($voters as $voter): ?>
			<tr>
				<td><?php echo h($voter['Voter']['FirstName']) . ' ' . h($voter['Voter']['LastName']); ?>&nbsp;</td>
				<td><?php echo h($voter['Voter']['Gender']); ?>&nbsp;</td>
				<td><?php echo
							h($voter['ResidentialAddress']['StreetNumber']) . ' ' . 
							h($voter['ResidentialAddress']['Address1']) . ' ' . 
							h($voter['ResidentialAddress']['City']) . ' ' . 
							h($voter['ResidentialAddress']['Zip']); ?>&nbsp;
				</td>
				<td><?php echo h($voter['Affiliation']['Party']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $voter['Voter']['VoterID'])); ?>
				</td>
			</tr>
			<?php endforeach; 
		} ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?> </li>
	</ul>
</div>