<?php
#	require "includes/database.config.php";
#	$usuario = Usuario::find(1);
#	var_dump($usuario->errors);
#phpinfo();

$ldap = ldap_connect("ldap://10.100.8.2", '389');
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($bind = @ldap_bind($ldap, "10RM\\".$_GET['user'], $_GET['pass'])) {
	echo "Sucesso";
} else {
	echo "Falha";
}


?>