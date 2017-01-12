<?php
/**
 * @update:20161009
 * @author:rolealiu
 */
class PartnerDao
{
	/**
	 * 邀请协作人员
	 */
	public function invitePartner(&$projectID, &$userID)
	{
		$db = getDatabase();
		$db -> prepareExecute('INSERT INTO eo_conn_project (eo_conn_project.projectID,eo_conn_project.userID,eo_conn_project.userType) VALUES (?,?,1);', array(
			$projectID,
			$userID,
		));

		if ($db -> getAffectRow() > 0)
			return $db -> getLastInsertID();
		else
			return FALSE;
	}

	/**
	 * 移除协作人员
	 */
	public function removePartner(&$projectID, &$connID)
	{
		$db = getDatabase();
		$db -> prepareExecute('DELETE FROM eo_conn_project WHERE eo_conn_project.projectID = ? AND eo_conn_project.connID = ? AND eo_conn_project.userType = 1;', array(
			$projectID,
			$connID
		));

		if ($db -> getAffectRow() > 0)
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 获取协作人员列表
	 */
	public function getPartnerList(&$projectID)
	{
		$db = getDatabase();
		$result = $db -> prepareExecuteAll('SELECT eo_conn_project.userID,eo_conn_project.connID,eo_conn_project.userType,eo_user.userName,eo_user.userNickName FROM eo_conn_project INNER JOIN eo_user ON eo_conn_project.userID = eo_user.userID WHERE eo_conn_project.projectID = ? ORDER BY eo_conn_project.userType ASC;', array($projectID));

		if (empty($result))
			return FALSE;
		else
			return $result;
	}

	/**
	 * 退出协作项目
	 */
	public function quitPartner(&$projectID, &$userID)
	{
		$db = getDatabase();
		$db -> prepareExecute('DELETE FROM eo_conn_project WHERE eo_conn_project.projectID = ? AND eo_conn_project.userID = ? AND eo_conn_project.userType = 1;', array(
			$projectID,
			$userID
		));

		if ($db -> getAffectRow() > 0)
		{
			return TRUE;
		}
		else
			return FALSE;
	}

	/**
	 * 查询是否已经加入过项目
	 */
	public function checkIsInvited(&$projectID, &$userName)
	{
		$db = getDatabase();
		$result = $db -> prepareExecuteAll('SELECT eo_conn_project.connID FROM eo_conn_project INNER JOIN eo_user ON eo_user.userID = eo_conn_project.userID WHERE eo_conn_project.projectID = ? AND eo_user.userName = ?;', array(
			$projectID,
			$userName
		));
		if (empty($result))
			return FALSE;
		else
			return TRUE;
	}

	/**
	 * 获取用户ID
	 */
	public function getUserID(&$connID)
	{
		$db = getDatabase();
		$result = $db -> prepareExecute('SELECT eo_conn_project.userID FROM eo_conn_project WHERE eo_conn_project.connID = ?;', array($connID));
		if (empty($result))
			return FALSE;
		else
			return $result['userID'];
	}

}
?>