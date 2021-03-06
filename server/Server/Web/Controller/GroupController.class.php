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
class GroupController
{
	// 返回json类型
	private $returnJson = array('type' => 'group');
	public function __construct()
	{
		// 身份验证
		$server = new GuestModule;
		if (!$server -> checkLogin())
		{
			$this -> returnJson['statusCode'] = '120005';
			exitOutput($this -> returnJson);
		}
	}

	/**
	 * 添加项目api分组
	 */
	public function addGroup()
	{
		$nameLen = mb_strlen(quickInput('groupName'), 'utf8');
		$projectID = securelyInput('projectID');
		$groupName = securelyInput('groupName');
		$parentGroupID = securelyInput('parentGroupID', NULL);
		// 判断项目ID和组名格式是否合法
		if (preg_match('/^[0-9]{1,11}$/', $projectID) && $nameLen >= 1 && $nameLen <= 30)
		{
			// 项目ID和组名合法
			$service = new GroupModule();
			$result = $service -> addGroup($projectID, $groupName, $parentGroupID);
			// 判断添加项目api分组是否成功
			if ($result)
			{
				// 添加项目api分组成功
				$this -> returnJson['statusCode'] = '000000';
				$this -> returnJson['groupID'] = $result;
			}
			else
				// 添加项目api分组失败
				$this -> returnJson['statusCode'] = '150001';
		}
		else
		{
			$this -> returnJson['statusCode'] = '150002';
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 删除项目api分组
	 */
	public function deleteGroup()
	{
		$groupID = securelyInput('groupID');
		// 判断分组ID格式是否合法
		if (preg_match('/^[0-9]{1,11}$/', $groupID))
		{
			// 分组ID格式合法
			$service = new GroupModule();
			$result = $service -> deleteGroup($groupID);
			// 判断删除项目api分组是否成功
			if ($result)
				// 删除项目api分组成功
				$this -> returnJson['statusCode'] = '000000';
			else
				// 删除api分组失败
				$this -> returnJson['statusCode'] = '150003';
		}
		else
		{
			// 分组ID格式不合法
			$this -> returnJson['statusCode'] = '150004';
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 获取分组
	 */
	public function getGroupList()
	{
		$projectID = securelyInput('projectID');
		if (preg_match('/^[0-9]{1,11}$/', $projectID))
		{
			$service = new GroupModule;
			$result = $service -> getGroupList($projectID);

			if ($result)
			{
				$this -> returnJson['statusCode'] = '000000';
				$this -> returnJson['groupList'] = $result;
			}
			else
			{
				$this -> returnJson['statusCode'] = '150008';
			}
		}
		else
		{
			$this -> returnJson['statusCode'] = '150007';
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 修改api分组
	 */
	public function editGroup()
	{
		$nameLen = mb_strlen(quickInput('groupName'), 'utf8');
		$groupID = securelyInput('groupID');
		$groupName = securelyInput('groupName');
		// 判断分组ID和组名格式是否合法
		if (preg_match('/^[0-9]{1,11}$/', $groupID) && $nameLen >= 1 && $nameLen <= 30)
		{
			$service = new GroupModule();
			$result = $service -> editGroup($groupID, $groupName);
			if ($result)
				// 修改api分组成功
				$this -> returnJson['statusCode'] = '000000';
			else
				// 修改api分组失败
				$this -> returnJson['statusCode'] = '150005';
		}
		else
		{
			// 分组ID和组名格式不合法
			$this -> returnJson['statusCode'] = '150002';
		}
		exitOutput($this -> returnJson);
	}

}
?>