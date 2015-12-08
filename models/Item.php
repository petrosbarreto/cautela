<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Item extends ActiveRecord\Model {
	#config
	static $table_name = 'item';
	#relacionamentos
	static $belongs_to = array(
		array('item_tipo', 'class_name' => 'ItemTipo', 'foreign_key' => 'item_tipo_id')
	);
	static $has_many = array(
		array('item_locals'),
		array('locals', 'through' => 'item_locals')	
	);
	
}

?>