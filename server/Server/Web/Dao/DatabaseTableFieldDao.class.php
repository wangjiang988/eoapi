<?php
/**
 * @update:20160919
 * @author:ljgade
 */
class DatabaseTableFieldDao
{
	public function addField(&$tableID, &$fieldName, &$fieldType, &$fieldLength, &$isNotNull, &$isPrimaryKey, &$fieldDesc)
	{
		$db = getDatabase();
		$db -> prepareExecute('INSERT INTO eo_database_table_field (eo_database_table_field.tableID,eo_database_table_field.fieldName,eo_database_table_field.fieldType,eo_database_table_field.fieldLength,eo_database_table_field.isNotNull,eo_database_table_field.isPrimaryKey,eo_database_table_field.fieldDescription) VALUES (?,?,?,?,?,?,?);', array(
			$tableID,
			$fieldName,
			$fieldType,
			$fieldLength,
			$isNotNull,
			$isPrimaryKey,
			$fieldDesc
		));

		if ($db -> getAffectRow() < 1)
			return FALSE;
		else
			return $db -> getLastInsertID();
	}

	public function checkFieldPermission($fieldID, $userID)
	{
		$db = getDatabase();
		$result = $db -> prepareExecute('SELECT eo_database_table.dbID FROM eo_database_table INNER JOIN eo_database_table_field ON eo_database_table.tableID = eo_database_table_field.tableID INNER JOIN eo_conn_database ON eo_database_table.dbID = eo_conn_database.dbID WHERE eo_database_table_field.fieldID = ? AND eo_conn_database.userID =?;', array(
			$fieldID,
			$userID
		));

		if (empty($result))
			return FALSE;
		else
			return $result['dbID'];
	}

	public function deleteField(&$fieldID)
	{
		$db = getDatabase();
		$db -> prepareExecute('DELETE FROM eo_database_table_field WHERE eo_database_table_field.fieldID =?;', array($fieldID));

		if ($db -> getAffectRow() < 1)
			return FALSE;
		else
			return TRUE;
	}

	public function getField(&$tableID)
	{
		$db = getDatabase();
		$result = $db -> prepareExecuteAll('SELECT eo_database_table_field.tableID,eo_database_table_field.fieldID,eo_database_table_field.fieldName,eo_database_table_field.fieldType,eo_database_table_field.fieldLength,eo_database_table_field.isNotNull,eo_database_table_field.isPrimaryKey,eo_database_table_field.fieldDescription FROM eo_database_table_field WHERE eo_database_table_field.tableID = ?;', array($tableID));

		if (empty($result))
			return FALSE;
		else
			return $result;
	}

	public function editField(&$fieldID, &$fieldName, &$fieldType, &$fieldLength, &$isNotNull, &$isPrimaryKey, &$fieldDesc)
	{
		$db = getDatabase();
		$db -> prepareExecute('UPDATE eo_database_table_field SET eo_database_table_field.fieldName =?,eo_database_table_field.fieldType=?,eo_database_table_field.fieldLength =?,eo_database_table_field.isNotNull =?,eo_database_table_field.isPrimaryKey =?,eo_database_table_field.fieldDescription =? WHERE eo_database_table_field.fieldID =?;', array(
			$fieldName,
			$fieldType,
			$fieldLength,
			$isNotNull,
			$isPrimaryKey,
			$fieldDesc,
			$fieldID
		));

		if ($db -> getAffectRow() < 1)
			return FALSE;
		else
			return TRUE;
	}

}
?>