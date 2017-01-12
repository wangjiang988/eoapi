<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseTableDao
{
	public function addTable(&$dbID, &$tableName, &$tableDesc)
	{
		$db = getDatabase();

		$db -> prepareExecute('INSERT INTO eo_database_table (eo_database_table.dbID,eo_database_table.tableName,eo_database_table.tableDescription) VALUES (?,?,?);', array(
			$dbID,
			$tableName,
			$tableDesc
		));

		if ($db -> getAffectRow() < 1)
		{
			return FALSE;
		}
		else
			return $db -> getLastInsertID();
	}

	public function checkTablePermission(&$tableID, &$userID)
	{
		$db = getDatabase();

		$result = $db -> prepareExecute('SELECT eo_database.dbID FROM eo_database_table INNER JOIN eo_database ON eo_database_table.dbID = eo_database.dbID INNER JOIN eo_conn_database ON eo_database.dbID = eo_conn_database.dbID WHERE eo_database_table.tableID =? AND eo_conn_database.userID =?;', array(
			$tableID,
			$userID
		));

		if (empty($result))
			return FALSE;
		else
			return $result['dbID'];
	}

	public function deleteTable(&$tableID)
	{
		$db = getDatabase();

		$db -> prepareExecute('DELETE FROM eo_database_table WHERE eo_database_table.tableID = ?;', array($tableID));

		if ($db -> getAffectRow() < 1)
			return FALSE;
		else
			return TRUE;
	}

	public function getTable(&$dbID)
	{
		$db = getDatabase();

		$result = $db -> prepareExecuteAll('SELECT eo_database_table.dbID,eo_database_table.tableID,eo_database_table.tableName,eo_database_table.tableDescription FROM eo_database_table WHERE eo_database_table.dbID =?;', array($dbID));

		if (empty($result))
			return FALSE;
		else
			return $result;
	}

	public function editTable(&$tableID, &$tableName, &$tableDesc)
	{
		$db = getDatabase();

		$db -> prepareExecute('UPDATE eo_database_table SET eo_database_table.tableName = ?,eo_database_table.tableDescription = ? WHERE eo_database_table.tableID = ?;', array(
			$tableName,
			$tableDesc,
			$tableID
		));

		if ($db -> getAffectRow() < 1)
			return FALSE;
		else
			return TRUE;
	}

}
?>