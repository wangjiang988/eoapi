<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseModule
{
	public function __construct()
	{
		@session_start();
	}

	public function addDatabase(&$dbName, &$dbVersion = 1.0)
	{
		$databaseDao = new DatabaseDao;
		return $databaseDao -> addDatabase($dbName, $dbVersion, $_SESSION['userID']);
	}

	public function deleteDatabase(&$dbID)
	{
		$databaseDao = new DatabaseDao;
		if ($dbID = $databaseDao -> checkDatabasePermission($dbID, $_SESSION['userID']))
		{
			return $databaseDao -> deleteDatabase($dbID);
		}
		else
			return FALSE;
	}

	public function getDatabase()
	{
		$databaseDao = new DatabaseDao;
		return $databaseDao -> getDatabase($_SESSION['userID']);
	}

	public function editDatabase(&$dbID, &$dbName, &$dbVersion)
	{
		$databaseDao = new DatabaseDao;
		if ($dbID = $databaseDao -> checkDatabasePermission($dbID, $_SESSION['userID']))
		{
			return $databaseDao -> editDatabase($dbID, $dbName, $dbVersion);
		}
		else
			return FALSE;
	}

}
?>