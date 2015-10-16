<?php

require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

class ItemTipo extends ActiveRecord\Model { 
	#config
	static $table_name = 'item_tipo';

}

?>