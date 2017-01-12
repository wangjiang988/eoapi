<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseDao
{
	public function addDatabase(&$dbName, &$dbVersion, &$userID)
	{
		$db = getDatabase();

		$db -> beginTransaction();

		$db -> prepareExecute('INSERT INTO eo_database (eo_database.dbName,eo_database.dbVersion,eo_database.dbUpdateTime) VALUE (?,?,?);', array(
			$dbName,
			$dbVersion,
			date('Y-m-d H:i:s', time())
		));

		if ($db -> getAffectRow() < 1)
		{
			$db -> rollback();
			return FALSE;
		}
		$dbID = $db -> getLastInsertID();

		//生成数据库与用户的联系
		$db -> prepareExecute('INSERT INTO eo_conn_database (eo_conn_database.dbID,eo_conn_database.userID) VALUES (?,?);', array(
			$dbID,
			$userID
		));

		if ($db -> getAffectRow() < 1)
		{
			$db -> rollback();
			return FALSE;
		}
		else
		{
			$db -> commit();
			return $dbID;
		}

	}

	public function checkDatabasePermission(&$dbID, &$userID)
	{
		$db = getDatabase();

		$result = $db -> prepareExecute('SELECT eo_conn_database.dbID FROM eo_conn_database WHERE eo_conn_database.dbID = ? AND eo_conn_database.userID = ?;', array(
			$dbID,
			$userID
		));

		if (empty($result))
			return FALSE;
		else
			return $result['dbID'];
	}

	public function deleteDatabase(&$dbID)
	{
		$db = getDatabase();

		$db -> prepareExecute('DELETE FROM eo_database WHERE eo_database.dbID = ?;', array($dbID));

		if ($db -> getAffectRow() < 1)
		{
			return FALSE;
		}
		else
			return TRUE;
	}

	public function getDatabase(&$userID)
	{
		$db = getDatabase();

		$result = $db -> prepareExecuteAll('SELECT eo_database.dbID,eo_database.dbName,eo_database.dbVersion,eo_database.dbUpdateTime FROM eo_database INNER JOIN eo_conn_database ON eo_database.dbID = eo_conn_database.dbID WHERE eo_conn_database.userID = ?;', array($userID));

		if (empty($result))
			return FALSE;
		else
			return $result;
	}

	public function editDatabase(&$dbID, &$dbName, &$dbVersion)
	{
		$db = getDatabase();

		$db -> prepareExecute('UPDATE eo_database SET eo_database.dbName = ?,eo_database.dbVersion =?,eo_database.dbUpdateTime =? WHERE eo_database.dbID =?;', array(
			$dbName,
			$dbVersion,
			date('Y-m-d H:i:s', time()),
			$dbID
		));

		if ($db -> getAffectRow() < 1)
		{
			return FALSE;
		}
		else
			return TRUE;
	}

	public function updateDatabaseUpdateTime(&$dbID)
	{
		$db = getDatabase();

		$db -> prepareExecute('UPDATE eo_database SET eo_database.dbUpdateTime =? WHERE eo_database.dbID =?;', array(
			date('Y-m-d H:i:s', time()),
			$dbID
		));
	}

}
?>