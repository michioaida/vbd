<?php
App::uses('AppModel', 'Model');
/**
 * Affiliation Model
 *
 * @property Voter $Voter
 */
class Affiliation extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'affiliation';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'AffiliationID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Voter' => array(
			'className' => 'Voter',
			'foreignKey' => 'AffiliationID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
