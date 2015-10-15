<?php
#--------------------------------------------------------------------------
# DATABASE.CONFIG.PHP
#--------------------------------------------------------------------------
#
#	@author: Yuri Fialho - 2º TEN FIALHO
#	@since: 10/12/2014
#	@contact: yurirfialho@gmail.com
#
#--------------------------------------------------------------------------
	
	#DB username
	$username = "yuri";
	$password = "yuri";
	$host	  = "127.0.0.1";
	$database = "rancho";

	require_once dirname(__FILE__) . '/../libs/phpactiverecord/ActiveRecord.php';

	#Load All Models
	$modelsFolders = dirname(__FILE__) . "/../models";
	
	foreach (scandir($modelsFolders) as $modelsClass) {
		$metaDados = pathinfo($modelsClass);
		if($metaDados['extension'] == "php") {
			require_once $modelsFolders . DIRECTORY_SEPARATOR . $modelsClass;
		}
	}
	
	#Initialize database
	ActiveRecord\Config::initialize(function($cfg)
	{
    	$cfg->set_model_directory('.');
    	$cfg->set_connections(array('development' => 'mysql://yuri:yuri@127.0.0.1/rancho'));
	});

?>