<?php
App::uses('AppModel', 'Model');
/**
 * Voter Model
 *
 * @property Address $ResidentialAddress
 */
class Voter extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'voter';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'VoterID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'LastName';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ResidentialAddress' => array(
			'className' => 'Address',
			'foreignKey' => 'AddressResidentialID',
			'conditions' => '',
			'fields' => '',
			'order' => ''),
		'MailingAddress' => array(
			'className' => 'Address',
			'foreignKey' => 'AddressMailingID',
			'conditions' => '',
			'fields' => '',
			'order' => ''),
		'AbsenteeAddress' => array(
			'className' => 'Address',
			'foreignKey' => 'AddressAbsenteeID',
			'conditions' => '',
			'fields' => '',
			'order' => ''),
		'Affiliation' => array(
			'className' => 'Affiliation',
			'foreignKey' => 'AffiliationID',
			'conditions' => '',
			'fields' => '',
			'order' => ''),
		'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'PositionID',
			'conditions' => '',
			'fields' => '',
			'order' => '')
	);

/*
	Helper Methods
*/
	/// ******************************************************************************
	/// this function will create the relationship between the voter and their address
	public function save_voter_address($voterID, $addressID, $addressType) {
		//var_dump($voterID . ' ' . $addressType);
		//die();

		if (!$this->exists($voterID)) {
			throw new NotFoundException(__('Invalid voter'));
		}

		$options = array('conditions' => array('Voter.' . $this->primaryKey => $voterID));
		$voter2update = $this->find('first', $options);
		//var_dump($voter2update['Voter']);
		//$voter2update['Voter']['Height'] = 2;
		//var_dump($voter2update['Voter']);
		//die();

		switch ($addressType) {
			case 'res':
				$voter2update['Voter']['AddressResidentialID'] = $addressID;
		  		break;
			case 'mal':
				$voter2update['Voter']['AddressMailingID'] = $addressID;
		  		break;
			case 'abs':
		  		$voter2update['Voter']['AddressAbsenteeID'] = $addressID;
		  		break;
		}
		//var_dump($voter2update);
		//die();

		$this->save($voter2update);
	}

}