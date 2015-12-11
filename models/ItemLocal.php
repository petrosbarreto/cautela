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
	
	public static function qtd_itens_armazenados($item_id) {
		$array = self::first(array('select' => 'sum(qtd) as qtd_armazenada',
								   'conditions' => "item_id = $item_id"))->attributes();
		
		return $array['qtd_armazenada'];
	}
}

?>