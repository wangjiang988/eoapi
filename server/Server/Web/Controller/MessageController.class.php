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
class MessageController
{
	// 返回json类型
	private $returnJson = array('type' => 'message');
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
	 * 获取消息列表
	 */
	public function getMessageList()
	{
		$page = securelyInput('page', 1);
		$server = new MessageModule;
		$result = $server -> getMessageList($page);
		if ($result)
		{
			$this -> returnJson['statusCode'] = '000000';
			$this -> returnJson = array_merge($this -> returnJson, $result);
		}
		else
		{
			//消息列表为空
			$this -> returnJson['statusCode'] = '260001';
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 已阅消息
	 */
	public function readMessage()
	{
		$msgID = securelyInput('msgID');

		// 判断ID格式是否合法
		if (!preg_match('/^[0-9]{1,11}$/', $msgID))
		{
			$this -> returnJson['statusCode'] = '260004';
		}
		else
		{
			$server = new MessageModule;
			if ($server -> readMessage($msgID))
			{
				$this -> returnJson['statusCode'] = '000000';
			}
			else
			{
				$this -> returnJson['statusCode'] = '260002';
			}
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 删除消息
	 */
	public function delMessage()
	{
		$msgID = securelyInput('msgID');

		// 判断ID格式是否合法
		if (!preg_match('/^[0-9]{1,11}$/', $msgID))
		{
			$this -> returnJson['statusCode'] = '260004';
		}
		else
		{
			$server = new MessageModule;
			if ($server -> delMessage($msgID))
			{
				$this -> returnJson['statusCode'] = '000000';
			}
			else
			{
				$this -> returnJson['statusCode'] = '260005';
			}
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 清空消息
	 */
	public function cleanMessage()
	{
		$server = new MessageModule;
		$result = $server -> cleanMessage();
		if ($result)
		{
			$this -> returnJson['statusCode'] = '000000';
		}
		else
		{
			$this -> returnJson['statusCode'] = '260001';
		}
		exitOutput($this -> returnJson);
	}

	/**
	 * 获取未读消息数量
	 */
	public function getUnreadMessageNum()
	{
		$server = new MessageModule;
		$result = $server -> getUnreadMessageNum();
		if ($result)
		{
			$this -> returnJson['statusCode'] = '000000';
			$this -> returnJson['unreadMsgNum'] = $result;
		}
		else
		{
			//消息列表为空
			$this -> returnJson['statusCode'] = '260001';
		}
		exitOutput($this -> returnJson);
	}

}
?>