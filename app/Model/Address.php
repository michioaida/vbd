<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 */
class Address extends AppModel {

/**
 * Use table
 */
	public $useTable = 'address';

/**
 * Primary key field
 */
	public $primaryKey = 'AddressID';

/**
 * Relationship (foreign key to voter table)
 */
	public $hasOne = array(
		'Voter' => array(
			'className' => 'Voter',
			'foreignKey'=>'VoterID')/*,
		'MailingAddress' => array(
			'className' => 'Voter',
			'foreignKey' => 'AddressMailingID')*/
		);
/* Example:
	public $hasOne = array(
	    'Profile' => array(
	        'className'    => 'Profile',
	        'conditions'   => array('Profile.published' => '1'),
	        'dependent'    => true
	    )
	);
*/

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'AddressID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Address1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Address cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'City' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'City cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'State' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'State cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Zip' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Zip cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
