<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseTableModule
{
	public function __construct()
	{
		@session_start();
	}

	public function addTable(&$dbID, &$tableName, &$tableDesc)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		if ($dbID = $databaseDao -> checkDatabasePermission($dbID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableDao -> addTable($dbID, $tableName, $tableDesc);
		}
		else
			return FALSE;
	}

	public function deleteTable(&$tableID)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		if ($dbID = $databaseTableDao -> checkTablePermission($tableID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableDao -> deleteTable($tableID);
		}
		else
			return FALSE;
	}

	public function getTable(&$dbID)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		if ($dbID = $databaseDao -> checkDatabasePermission($dbID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableDao -> getTable($dbID);
		}
		else
			return FALSE;
	}

	public function editTable(&$tableID, &$tableName, &$tableDesc)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		if ($dbID = $databaseTableDao -> checkTablePermission($tableID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableDao -> editTable($tableID, $tableName, $tableDesc);
		}
		else
			return FALSE;
	}

}
?>