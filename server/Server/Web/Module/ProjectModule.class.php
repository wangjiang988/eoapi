<?php
/**
 * @name eoapi open source，eoapi开源版本
 * @link https://www.eoapi.cn
 * @package eoapi
 * @author www.eoapi.cn 深圳波纹聚联网络科技有限公司 ©2015-2016

 * eoapi，业内领先的Api接口管理及测试平台，为您提供最专业便捷的在线接口管理、测试、维护以及各类性能测试方案，帮助您高效开发、安全协作。
 * 如在使用的过程中有任何问题，欢迎加入用户讨论群进行反馈，我们将会以最快的速度，最好的服务态度为您解决问题。
 * 用户讨论QQ群：284421832
 *
 * 注意！eoapi开源版本仅供用户下载试用、学习和交流，禁止“一切公开使用于商业用途”或者“以eoapi开源版本为基础而开发的二次版本”在互联网上流通。
 * 注意！一经发现，我们将立刻启用法律程序进行维权。
 * 再次感谢您的使用，希望我们能够共同维护国内的互联网开源文明和正常商业秩序。
 *
 */
class ProjectModule
{
	public function __construct()
	{
		@session_start();
	}

	/**
	 * 创建项目
	 */
	public function addProject(&$projectName, &$projectType = 0, &$projectVersion = 1.0)
	{
		$projectDao = new ProjectDao;
		$projectInfo = $projectDao -> addProject($projectName, $projectType, $projectVersion, $_SESSION['userID']);
		$groupDao = new GroupDao;
		$groupName = '默认分组';
		$groupDao -> addGroup($projectInfo['projectID'], $groupName);
		return $projectInfo;
	}

	/**
	 * 删除项目
	 */
	public function deleteProject(&$projectID)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> deleteProject($projectID);
		}
		else
			return FALSE;
	}

	/**
	 * 获取项目列表
	 */
	public function getProjectList(&$projectType = -1, &$projectName = NULL)
	{
		$dao = new ProjectDao;
		return $dao -> getProjectList($_SESSION['userID'], $projectType, $projectName);
	}

	/**
	 * 更改项目
	 */
	public function editProject(&$projectID, &$projectName, &$projectType, &$projectVersion = 1.0)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> editProject($projectID, $projectName, $projectType, $projectVersion);
		}
		else
			return FALSE;
	}

	/**
	 * 获取项目信息
	 */
	public function getProject(&$projectID)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> getProject($projectID, $_SESSION['userID']);
		}
		else
			return FALSE;
	}

	/**
	 * 更新项目更新时间
	 */
	public function updateProjectUpdateTime(&$projectID)
	{
		$dao = new ProjectDao;
		if ($dao -> updateProjectUpdateTime($projectID))
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * 获取环境列表
	 */
	public function getEnvList(&$projectID)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> getEnvList($projectID);
		}
		else
			return FALSE;
	}

	/**
	 * 添加环境
	 */
	public function addEnv(&$projectID, &$envName, &$envURI)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> addEnv($projectID, $envName, $envURI);
		}
		else
			return FALSE;
	}

	/**
	 * 删除环境
	 */
	public function deleteEnv(&$projectID, &$envID)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> deleteEnv($projectID, $envID);
		}
		else
			return FALSE;
	}

	/**
	 * 修改环境
	 */
	public function editEnv(&$projectID, &$envID, &$envName, &$envURI)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			return $dao -> editEnv($envID, $envName, $envURI);
		}
		else
			return FALSE;
	}

	/**
	 * 导出项目
	 */
	public function dumpProject(&$projectID)
	{
		$dao = new ProjectDao;
		if ($dao -> checkProjectPermission($projectID, $_SESSION['userID']))
		{
			$dumpJson = json_encode($dao -> dumpProject($projectID));
			$fileName = 'eoapi_dump_' . $_SESSION['userName'] . '_' . time() . '.json';
			if (file_put_contents(realpath('./dump') . DIRECTORY_SEPARATOR . $fileName, $dumpJson))
				return $fileName;
		}
		else
			return FALSE;
	}

}
?>