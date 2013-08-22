<div class="voters index">
	<h2><?php echo __('Search Voters'); ?></h2>
	<?php 
		echo $this->Form->create("Voter", array('action'=>'search_result', 'type'=>'GET'));
	    echo $this->Form->input("firstName", array('label' => 'First Name'));
	    echo $this->Form->input("lastName", array('label' => 'Last Name'));
	    $gender_array = array('0'=>' ** Choose Gender ** ', 'M'=>'Male', 'F'=>'Female');
	    echo $this->Form->input('gender', array('type'=>'select', 'label'=>'Gender', 'options'=>$gender_array));
	    $party_array = array('BLK'=>'Blank', 'CON'=>'Conservative', 'DEM'=>'Democratic', 'GRE'=>'Green', 'IND'=>'Independence', 'LBN'=>'Libertarian', 'LIB'=>'Liberal', 'REP'=>'Republican', 'RTL'=>'Right to Life', 'WOR'=>'Working Family', 'OTH'=>'Other');
	    
	    // party radio buttons
	    echo $this->Form->input('party', array('div'=>array('id'=>'partyDiv'), 'type'=>'select', 'multiple'=>'checkbox', 'label'=>'Party', 'options'=>$party_array));
		// party drop down box
	    //echo $this->Form->input('party', array('div'=>array('id'=>'partyDiv'), 'type'=>'select', 'label'=>'Party', 'options'=>$party_array));
	    
	    echo $this->Form->input("address", array('div' => array('id' => 'addressDiv'), 'label' => 'Street')); 
	    echo $this->Form->input("city", array('div' => array('id' => 'cityDiv'), 'label' => 'City'));
	    echo $this->Form->input("zip", array('div' => array('id' => 'zipDiv'), 'label' => 'Zipcode'));   
	?>
	<br style="clear: both;" />
	<?php
	    //echo $this->Form->input("district", array('div' => array('id' => 'cityDiv'), 'label' => 'District'));
	    echo $this->Form->input("countylegislativedistrict", array('div' => array('id' => 'cityDiv'), 'label' => 'County Legislative District'));
	    echo $this->Form->input("town", array('div' => array('id' => 'cityDiv'), 'label' => 'Town'));
	    echo $this->Form->input("ward", array('div' => array('id' => 'cityDiv'), 'label' => 'Ward'));
	?>
	<br style="clear: both;" />
	<span class="title">Election Years </span>
	<a class="show_hide">Show/hide</a>
		<div>
		<?php
	    	echo $this->Form->input('election_years', array('div' => array('id' => 'electionyearDiv'), 'type'=>'select', 'multiple'=>'checkbox', 'options'=> array('GE07'=>'GE07', 'GE08'=>'GE08', 'GE09'=>'GE09', 'GE10'=>'GE10', 'GE11'=>'GE11', 'GE12'=>'GE12', 'PE07'=>'PE07', 'PE08'=>'PE08', 'PE09'=>'PE09', 'PE10'=>'PE10', 'PE11'=>'PE11', 'PE12'=>'PE12')));
		?>
		</div>
	<?php	
	    // get issues from Position Helper so we can filter result set by them
	    $position_array = $this->Position->GetPositionArray();
	    
	    echo '<br style="clear: both;" />';
	    echo '<span class="title">Positions</span> <a class="show_hide1">Show/hide</a><div>';
	    echo $this->Form->input('positions', array('div' => array('id' => 'positionsDiv'), 'type'=>'select', 'multiple'=>'checkbox', 'options'=>$position_array));
	    echo '<br style="clear: both;" />';
	    echo '</div>';
	    echo $this->Form->submit('Search', array('name'=>'submitbutton', 'value'=>'search')); 
 		echo $this->Form->submit('Export to CSV', array('name'=>'submitbutton', 'value'=>'export')); 
 		echo '<br style="clear: both;" />';
 		echo $this->Form->end(); 
	?> 
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?> </li>
	</ul>
</div>