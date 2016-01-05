<?php
class GroupModel extends Action{
	//http://114.215.209.115/proxyGroup/selectListGroupByUserId.action?userId=6
	//http://114.215.209.115/proxyGroup/selectDeviceByGroupId.action?groupId=6
	########MODEL########################
	public function selectListGroupByUserId($usrid){
		$url=C('javaback').'/proxyGroup/selectListGroupByUserId.action?userId='.$usrid;
		$json='{"data":[{"id":1,"code":"6379","groupName":null,"address":"黄龙体育场对面","capacity":3.0}],"code":"A00000","msg":"查询成功！"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	########MODEL########################
	public function selectDeviceByGroupId($groupId){
		$url=C('javaback').'/proxyGroup/selectDeviceByGroupId.action?groupId='.$groupId;
		$json='{"data":[{"id":100,"owner":28,"sn":"a9926ee9","model":1,"city":null,"longitude":"","latitude":"","address":"钱龙测试","peripheral":null,"ip":null,"serverIp":null,"serverPort":null,"pic":"11","battery":0,"status":"02","capacity":0,"listShareTime":null,"user":null,"isOrder":null,"isOwner":null,"version":1001,"path":"/opt/15V1_02Release.bin","time":null,"week":null,"paramMap":{"isOnline":false},"deviceAscription":null,"groupId":null,"deviceType":null},{"id":102,"owner":10,"sn":"021949d2","model":1,"city":null,"longitude":"120.206788","latitude":"30.215385","address":"test秦风","peripheral":null,"ip":null,"serverIp":null,"serverPort":null,"pic":null,"battery":null,"status":"01","capacity":0,"listShareTime":null,"user":null,"isOrder":null,"isOwner":null,"version":null,"path":null,"time":"17:25","week":"MON,TUE,WED,THU,FRI,SAT,SUN","paramMap":{"isOnline":false},"deviceAscription":null,"groupId":null,"deviceType":null}],"code":"A00000","msg":"查询成功！"}';
		$arr=url2arr($url,$json);
		return $arr;
	}
	

} 
?>