<?php
class Model_Transaction_Item extends \Orm\Model
{
  protected static $_belongs_to = array('transaction', 'item');
  
	protected static $_properties = array(
		'id',
		'transaction_id',
		'item_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('transaction_id', 'Transaction Id', 'required|valid_string[numeric]');
		$val->add_field('item_id', 'Item Id', 'required|valid_string[numeric]');

		return $val;
	}

}
