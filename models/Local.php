<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Local extends ActiveRecord\Model {
	#config
	static $table_name = 'local';
	#relacionamentos
	static $belongs_to = array(
		array('local_tipo', 'class_name' => 'LocalTipo', 'foreign_key' => 'local_tipo_id')
	);
}

?>