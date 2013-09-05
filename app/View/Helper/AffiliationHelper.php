<?php
class AffiliationHelper extends AppHelper {

	// this function will get ALL unique districts in the affiliation database table and return it in an array
	function GetCountyLegislativeDistrictArray() {

		//var_dump("here");
		//die();

		//$district_array = $position_array = ClassRegistry::init("Affiliation")->find('all', array ('fields' => array('DISTINCT (Affiliation.CountyLegislativeDistrict) AS CountyLegislativeDistrict')));
		//$district_array = ClassRegistry::init("Affiliation")->find('all', array('fields' => array('Affiliation.CountyLegislativeDistrict')));
		$district_array = ClassRegistry::init("Affiliation")->find($type='all', $params=array('fields' => 'Affiliation.CountyLegislativeDistrict'));
		
		var_dump($district_array);
		die();

		$district_array = array();
		$affiliation_table_array = ClassRegistry::init("Affiliation")->schema();
	    
	    foreach($affiliation_table_array as $key => $value) {
	    	if(strpos($key, 'CountyLegislativeDistrict') !== false) {
	    	    unset($affiliation_table_array[$key]);
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
				$district_array[$key] = $entry;
	    	}
		}
		return $district_array;
	}
}