<?php
/**
 * @update:20161015
 * @author:rolealiu
 */
class PartnerModule
{
	public function __construct()
	{
		@session_start();
	}
	
	/**
	 * 邀请协作人员
	 */
	public function invitePartner(&$projectID, &$inviteUserID)
	{
		$projectDao = new ProjectDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID'], 0))
		{
			$projectInfo = $projectDao -> getProjectName($projectID);
			$summary = '您已被邀请加入项目：' . $projectInfo['projectName'] . '，开始您的高效协作之旅吧！';
			$msg = '<p>您好！亲爱的用户：</p><p>您已经被加入项目：<b style="color:#4caf50">' . $projectInfo['projectName'] . '</b>，现在你可以参与项目的开发协作工作。</p><p>如果您在使用的过程中遇到任何问题，欢迎前往<b style="color:#4caf50">交流社区</b>反馈意见，谢谢！。</p>';

			//邀请协作人员
			$partnerDao = new PartnerDao;
			if ($partnerDao -> invitePartner($projectID, $inviteUserID))
			{
				//给协作人员发送邀请信息
				$msgDao = new MessageDao;
				$msgDao -> sendMessage($_SESSION['userID'], $inviteUserID, 1, $summary, $msg);
				return TRUE;
			}
			else
				return FALSE;
		}
		else
			return FALSE;
	}

	/**
	 * 移除协作人员
	 */
	public function removePartner($projectID, $connID)
	{
		$projectDao = new ProjectDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID'], 0))
		{
			$projectInfo = $projectDao -> getProjectName($projectID);
			$summary = '您已被移除出项目：' . $projectInfo['projectName'];
			$msg = '<p>您好！亲爱的用户：</p><p>您已经被移除出项目：<b style="color:#4caf50">' . $projectInfo['projectName'] . '</b>。</p><p>如果您在使用的过程中遇到任何问题，欢迎前往<b style="color:#4caf50">交流社区</b>反馈意见，谢谢！。</p>';

			$partnerDao = new PartnerDao;
			$remotePartnerID = $partnerDao -> getUserID($connID);
			if ($partnerDao -> removePartner($projectID, $connID))
			{
				//给协作人员发送邀请信息
				$msgDao = new MessageDao;
				$msgDao -> sendMessage(0, $remotePartnerID, 1, $summary, $msg);
				return TRUE;
			}
			else
				return FALSE;
		}
		else
			return FALSE;

	}

	/**
	 * 获取协作人员列表
	 */
	public function getPartnerList(&$projectID)
	{
		$projectDao = new ProjectDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			$partnerDao = new PartnerDao;
			$list = $partnerDao -> getPartnerList($projectID);
			foreach ($list as &$param)
			{
				if ($param['userID'] == $_SESSION['userID'])
					$param['isNow'] = 1;
				else
					$param['isNow'] = 0;
				unset($param['userID']);
			}
			return $list;
		}
		else
			return FALSE;
	}

	/**
	 * 退出协作项目
	 */
	public function quitPartner(&$projectID)
	{
		$projectDao = new ProjectDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID'], 1))
		{
			$partnerDao = new PartnerDao;
			if ($partnerDao -> quitPartner($projectID, $_SESSION['userID']))
				return TRUE;
			else
				return FALSE;
		}
		else
			return FALSE;
	}

	/**
	 * 查询是否已经加入过项目
	 */
	public function checkIsInvited(&$projectID, &$userName)
	{
		$dao = new PartnerDao;
		return $dao -> checkIsInvited($projectID, $userName);
	}

}
?>