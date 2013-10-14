<?php
App::uses('AppModel', 'Model');
/**
 * ElectionHistory Model
 *
 * @property Voter $Voter
 */
class ElectionHistory extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'election_history';

/**
 * Primary key field
*/
 	public $primaryKey = 'ID';


/**
 * Model Relationships 
 */
	// ElectionHisotry BelongsTo a Voter
	public $belongsTo = array( 
		'Voter' => array( 
			'className' => 'Voter') 
	);


}