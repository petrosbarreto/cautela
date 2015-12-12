<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class Usuario extends ActiveRecord\Model {
	#config
	static $table_name = 'usuario';
	
}

?>