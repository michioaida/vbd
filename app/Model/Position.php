<?php
App::uses('AppModel', 'Model');
/**
 * Position Model
 *
 * @property Voter $Voter
 */
class Position extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'position';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'PositionID';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Voter' => array(
			'className' => 'Voter',
			'foreignKey' => 'PositionID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
