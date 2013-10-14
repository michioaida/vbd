<?php
class VoterHelper extends AppHelper {

	// this function will determin if a voeter has voted in a given election year
	function HasVoted($history, $election) {
		foreach ($history as $key => $value) {
			if ($value['CodeYear'] == $election) {
				return true;
		    } 
		}
		return false;
	}

} ?>