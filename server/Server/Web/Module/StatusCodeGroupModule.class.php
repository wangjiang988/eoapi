<?php
/**
 * @name eoapi open source，eoapi开源版本
 * @link https://www.eoapi.cn
 * @package eoapi
 * @author www.eoapi.cn 深圳波纹聚联网络科技有限公司 ©2015-2016

 *  * eoapi，业内领先的Api接口管理及测试平台，为您提供最专业便捷的在线接口管理、测试、维护以及各类性能测试方案，帮助您高效开发、安全协作。
 * 如在使用的过程中有任何问题，欢迎加入用户讨论群进行反馈，我们将会以最快的速度，最好的服务态度为您解决问题。
 * 用户讨论QQ群：284421832
 *
 * 注意！eoapi开源版本仅供用户下载试用、学习和交流，禁止“一切公开使用于商业用途”或者“以eoapi开源版本为基础而开发的二次版本”在互联网上流通。
 * 注意！一经发现，我们将立刻启用法律程序进行维权。
 * 再次感谢您的使用，希望我们能够共同维护国内的互联网开源文明和正常商业秩序。
 *
 */
class StatusCodeGroupModule
{
	public function __construct()
	{
		@session_start();
	}

	/**
	 * 添加分组
	 */
	public function addGroup(&$projectID, &$groupName, &$parentGroupID)
	{
		$projectDao = new ProjectDao;
		$statusCodeGroupDao = new StatusCodeGroupDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			$projectDao -> updateProjectUpdateTime($projectID);
			if (is_null($parentGroupID))
				return $statusCodeGroupDao -> addGroup($projectID, $groupName);
			else
				return $statusCodeGroupDao -> addChildGroup($projectID, $groupName, $parentGroupID);
		}
		else
			return FALSE;
	}

	/**
	 * 删除分组
	 */
	public function deleteGroup(&$groupID)
	{
		$projectDao = new ProjectDao;
		$statusCodeGroupDao = new StatusCodeGroupDao;
		if ($projectID = $statusCodeGroupDao -> checkStatusCodeGroupPermission($groupID, $_SESSION['userID']))
		{
			$projectDao -> updateProjectUpdateTime($projectID);
			return $statusCodeGroupDao -> deleteGroup($groupID);
		}
		else
			return FALSE;
	}

	/**
	 * 获取分组列表
	 */
	public function getGroupList(&$projectID)
	{
		$projectDao = new ProjectDao;
		$statusCodeGroupDao = new StatusCodeGroupDao;
		if ($projectDao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $statusCodeGroupDao -> getGroupList($projectID);
		}
		else
			return FALSE;
	}

	/**
	 * 修改分组
	 */
	public function editGroup(&$groupID, &$groupName)
	{
		$projectDao = new ProjectDao;
		$statusCodeGroupDao = new StatusCodeGroupDao;
		if ($projectID = $statusCodeGroupDao -> checkStatusCodeGroupPermission($groupID, $_SESSION['userID']))
		{
			$projectDao -> updateProjectUpdateTime($projectID);
			return $statusCodeGroupDao -> editGroup($groupID, $groupName);
		}
		else
			return FALSE;
	}

}
?>