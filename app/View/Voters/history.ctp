<div class="voterhistorysearch">
	<h2><?php echo __('Search Voters'); ?></h2>
	<?php 
		echo $this->Form->create("Voter", array('action'=>'history', 'type'=>'GET'));
		if (!empty($this->params->query)) {
		    echo $this->Form->input("firstName", array('label'=>'First Name', 'default'=>$this->params->query['firstName']));
		    echo $this->Form->input("lastName", array('label'=>'Last Name', 'default'=>$this->params->query['lastName']));
		    echo $this->Form->input('election', array(
			    'options' => array('GE'=>'General Election', 'PE'=>'Primary Election'),
			    //'empty' => '(choose one)',
			    'default' => $this->params->query['election']
			));
		} else {
		    echo $this->Form->input("firstName", array('label'=>'First Name'));
		    echo $this->Form->input("lastName", array('label'=>'Last Name'));
		    echo $this->Form->input('election', array(
			    'options' => array('GE'=>'General Election', 'PE'=>'Primary Election')
			    //'empty' => '(choose one)',
			));
		}
	    echo $this->Form->submit('Search', array('name'=>'submitbutton', 'value'=>'search')); 
 		echo $this->Form->end(); 
	?> 
</div>

<?php 
// do we have voter history to display?
if (isset($voterhistory)) { 
	//var_dump($voterhistory);	?>
	<br />
	<br />
	<div class="voterhistoryview">
	<h2><?php  echo __('Voter'); ?></h2>
		<table>
			<tr>
				<th>Name</th>
				<th>Votes</th>
				<th>&nbsp;</th>
			</tr>
			<?php 
			foreach ($voterhistory as $voter): 
				$election = $this->params->query['election'] . substr(date('Y'), 2, 2);
				//$election = 'GE10';
				//var_dump($election);
				//var_dump($voter['ElectionHistory']);
			?>
			<tr>
				<td>
					<?php echo h($voter['Voter']['FirstName']); ?>
					&nbsp;
					<?php echo h($voter['Voter']['LastName']); ?>
				</td>
				<td>
					<?php echo h(count($voter['ElectionHistory'])); ?>
				</td>
				<td>
					<?php
						echo $this->Form->create("Voter", array('action'=>'historyupdate', 'type'=>'POST'));
						echo $this->Form->hidden($voter['Voter']['VoterID'], array('id'=>'VoterID', 'name'=>'VoterID', 'value'=>$voter['Voter']['VoterID']));
						echo $this->Form->hidden($election, array('id'=>'CodeYear', 'name'=>'CodeYear', 'value'=>$election));
						echo $this->Form->hidden("FirstName", array('id'=>'FirstName', 'name'=>'FirstName', 'value'=>$this->params->query['firstName']));
						echo $this->Form->hidden("LastName", array('id'=>'LastName', 'name'=>'LastName', 'value'=>$this->params->query['lastName']));
						echo $this->Form->hidden("Election", array('id'=>'Election', 'name'=>'Election', 'value'=>$this->params->query['election']));
						if ($this->Voter->HasVoted($voter['ElectionHistory'], $election)) {
							echo $this->Form->submit('Voted', array('name'=>'votedbutton', 'class'=>'uservotedyes')); 
			            } else {
			            	echo $this->Form->submit('Not Voted', array('name'=>'votedbutton', 'class'=>'uservotedno')); 
			            }
			            echo $this->Form->end();
			        ?>

				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php } ?>



			