<?php
class B2bModel extends Action{
	//http://114.215.209.115/bToBStatistics/getDeviceStatistics.action?groupId=1
	//http://114.215.209.115/bToBStatistics/getNowPowerStatistics.action?groupId=1
	//http://114.215.209.115/bToBStatistics/getTotalPowerStatistics.action?groupId=1
	//http://114.215.209.115/bToBStatistics/getTotalPriceStatistics.action?groupId=1&wechatId=111
	//http://114.215.209.115/bToBStatistics/getDetailsList.action?groupId=1&wechatId=111
	
	########MODEL########################
	public function getDeviceStatistics($groupid){
		$url=C('javaback').'/bToBStatistics/getDeviceStatistics.action?groupId='.$groupid;
		$json='{"data":{"exceptionNumber":2,"onlineNumber":0,"deviceNumber":2},"code":"A00000","msg":"查询成功!"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	########MODEL########################
	public function getNowPowerStatistics($groupid){
		$url=C('javaback').'/bToBStatistics/getNowPowerStatistics.action?groupId='.$groupid;
		$json='{"data":{"powers":0.00,"times":0,"cars":0},"code":"A00000","msg":"查询成功!"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	########MODEL########################
	public function getTotalPowerStatistics($groupid){
		$url=C('javaback').'/bToBStatistics/getTotalPowerStatistics.action?groupId='.$groupid;
		$json='{"data":{"powers":2.00,"times":135,"cars":20},"code":"A00000","msg":"查询成功!"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	########MODEL########################
	public function getTotalPriceStatistics($groupid,$openid){
		$url=C('javaback').'/bToBStatistics/getTotalPriceStatistics.action?groupId='.$groupid.'&wechatId='.$openid;
		$json='{"data":{"totalPowerPrice":1.32,"nowPowerPrice":0.0,"totalOtherPrice":0.0,"nowOtherPrice":0.0,"nowEarnings":0.0,"totalEarnings":0.0},"code":"A00000","msg":"查询成功!"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	########MODEL########################
	public function getDetailsList($groupid,$openid){
		$url=C('javaback').'/bToBStatistics/getDetailsList.action?groupId='.$groupid.'&wechatId='.$openid;
		$json='';
		$arr=url2arr($url,$json);
		return $arr;
	}

} 
?>