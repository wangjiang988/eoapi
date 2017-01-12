<?php
/**
 * @update:20161009
 * @author:rolealiu
 */
class MessageDao
{
	/**
	 * 获取消息列表
	 */
	public function getMessageList(&$userID, &$page)
	{
		$db = getDatabase();
		$result['messageList'] = $db -> prepareExecuteAll('SELECT eo_message.msgID,eo_message.msgType,eo_message.msg,eo_message.summary,eo_message.msgSendTime,eo_message.isRead FROM eo_message WHERE eo_message.toUserID = ? ORDER BY eo_message.msgSendTime DESC LIMIT ?,15;', array(
			$userID,
			($page - 1) * 15
		));

		$msgCount = $db -> prepareExecute('SELECT COUNT(eo_message.msgID) AS msgCount FROM eo_message WHERE eo_message.toUserID = ?', array($userID));

		$result['msgCount'] = $msgCount['msgCount'];

		if (empty($result['messageList'][0]))
			return FALSE;
		else
			return $result;
	}

	/**
	 * 已阅消息
	 */
	public function readMessage(&$msgID)
	{
		$db = getDatabase();
		$db -> prepareExecute('UPDATE eo_message SET eo_message.isRead = 1 WHERE eo_message.msgID = ?;', array($msgID));

		if ($db -> getAffectRow() > 0)
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 删除消息
	 */
	public function delMessage(&$msgID)
	{
		$db = getDatabase();
		$db -> prepareExecute('DELETE FROM eo_message WHERE eo_message.msgID = ?;', array($msgID));

		if ($db -> getAffectRow() > 0)
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 清空消息
	 */
	public function cleanMessage(&$userID)
	{
		//本接口只能清空所有接收到的消息
		$db = getDatabase();
		$db -> prepareExecute('DELETE FROM eo_message WHERE eo_message.toUserID = ?;', array($userID));

		if ($db -> getAffectRow() > 0)
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 发送消息
	 */
	public function sendMessage($fromUserID, $toUserID, $msgType, &$summary, &$msg)
	{
		//fromUserID默认为0也就是官方消息
		$db = getDatabase();
		$db -> prepareExecute('INSERT INTO eo_message (eo_message.fromUserID,eo_message.toUserID,eo_message.msgType,eo_message.summary,eo_message.msg) VALUES (?,?,?,?,?);', array(
			$fromUserID,
			$toUserID,
			$msgType,
			$summary,
			$msg
		));

		if ($db -> getAffectRow() > 0)
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 获取未读消息数量
	 */
	public function getUnreadMessageNum(&$userID)
	{
		$db = getDatabase();
		$result = $db -> prepareExecute('SELECT COUNT(eo_message.msgID) AS unreadMsgNum FROM eo_message WHERE eo_message.toUserID = ? AND eo_message.isRead = 0;', array($userID));

		if (empty($result))
			return FALSE;
		else
			return $result['unreadMsgNum'];
	}

}
?>