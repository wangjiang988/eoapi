<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseTableFieldModule
{
	public function __construct()
	{
		@session_start();
	}

	public function addField(&$tableID, &$fieldName, &$fieldType, &$fieldLength, &$isNotNull, &$isPrimaryKey, &$fieldDesc)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		$databaseTableFieldDao = new DatabaseTableFieldDao;

		if ($dbID = $databaseTableDao -> checkTablePermission($tableID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableFieldDao -> addField($tableID, $fieldName, $fieldType, $fieldLength, $isNotNull, $isPrimaryKey, $fieldDesc);
		}
		else
			return FALSE;
	}

	public function deleteField(&$fieldID)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableFieldDao = new DatabaseTableFieldDao;

		if ($dbID = $databaseTableFieldDao -> checkFieldPermission($fieldID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableFieldDao -> deleteField($fieldID);
		}
		else
			return FALSE;
	}

	public function getField(&$tableID)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableDao = new DatabaseTableDao;
		$databaseTableFieldDao = new DatabaseTableFieldDao;

		if ($dbID = $databaseTableDao -> checkTablePermission($tableID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableFieldDao -> getField($tableID);
		}
		else
			return FALSE;
	}

	public function editField(&$fieldID, &$fieldName, &$fieldType, &$fieldLength, &$isNotNull, &$isPrimaryKey, &$fieldDesc)
	{
		$databaseDao = new DatabaseDao;
		$databaseTableFieldDao = new DatabaseTableFieldDao;

		if ($dbID = $databaseTableFieldDao -> checkFieldPermission($fieldID, $_SESSION['userID']))
		{
			$databaseDao -> updateDatabaseUpdateTime($dbID);
			return $databaseTableFieldDao -> editField($fieldID, $fieldName, $fieldType, $fieldLength, $isNotNull, $isPrimaryKey, $fieldDesc);
		}
		else
			return FALSE;
	}

}
?>