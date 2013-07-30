<?php
class PositionHelper extends AppHelper {

	// this function will get ALL postions in database and return it in an array
	function GetPositionArray() {
		$position_array = array();
		$position_table_array = ClassRegistry::init("Position")->schema();
	    
	    foreach($position_table_array as $key => $value) {
	    	if(strpos($key, 'ID') !== false) {
	    	    unset($position_table_array[$key]);
	    	} else {
	    		$entry = $key;
	        	preg_match_all('/[A-Z]/', $key, $matches, PREG_OFFSET_CAPTURE, 1);
				$list = split(",",substr(preg_replace("/([A-Z])/",',\\1',$key),1));
				if (count($list) > 1) {
					$entry = '';
					foreach($list as $item) {
						$entry .= $item . ' ';
					}
				}
				$position_array[$key] = $entry;
	    	}
		}
		return $position_array;
	}


	// this function will get all positions for a particular Voter ID and return that as an array 
	function GetPositionArrayByVoterID($id) {
		$position_array = ClassRegistry::init("Position")->find($type='first', $params=array('conditions' => array('Position.PositionID' => $id)));
		$return_array = array();
		foreach($position_array['Position'] as $key => $value) {
			if (strpos('PositionID', $key) === false && $value === true) {
				array_push($return_array, $key);
			}
		}
		return $return_array;
	}


}
?>