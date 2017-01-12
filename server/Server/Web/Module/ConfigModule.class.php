<?php
class ConfigModule
{
	public function editConfig(&$databaseURL, &$databaseUser, &$databasePassword, &$databaseName)
	{
		$configArray = array(
			'FIRST_DEPLOYMENT' => FALSE,
			'AT' => 'POST',
			'DEBUG' => TRUE,
			'DB_TYPE' => 'mysql',
			'DB_PERSISTENT_CONNECTION' => FALSE,
			'PATH_FW' => './RTP',
			'PATH_APP' => './Server',
			'DB_URL' => $databaseURL,
			'DB_USER' => $databaseUser,
			'DB_PASSWORD' => $databasePassword,
			'DB_NAME' => $databaseName
		);
		
	}

}
?>