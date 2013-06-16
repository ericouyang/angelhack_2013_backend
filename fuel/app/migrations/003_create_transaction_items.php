<?php

namespace Fuel\Migrations;

class Create_transaction_items
{
	public function up()
	{
		\DBUtil::create_table('transaction_items', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'transaction_id' => array('constraint' => 11, 'type' => 'int'),
			'item_id' => array('constraint' => 11, 'type' => 'int'),
			'qty' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('transaction_items');
	}
}