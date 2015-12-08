<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class ItemLocal extends ActiveRecord\Model {
	#config
	static $table_name = 'item_local';
	#relacionamentos
	static $belongs_to = array(
		array('item', 'class_name' => 'Item', 'foreign_key' => 'item_id'),
		array('local', 'class_name' => 'Local', 'foreign_key' => 'local_id')
	);
}

?>