<?php
class UsrModel{
	//###################
	//getusrobyusrid()
	//getusrobyusrnm()
	//login
	//get.action?wechatId='.$openid;
	
	//############test
	public function getusrobyusrid($usrid,$usrps){
		
		$info=collectinfo(__METHOD__,'$usrid,$usrps',array($usrid,$usrps));

		if(isset($usrid)==false){return createarrerr('error_code','usrid不能为空',$info);}
		
		$usr=M('usr');
		$str='usrid='.$usrid;
		isset($usrps)?$str=$str.'&usrps='.$usrps:$str=$str;
		$usro=$usr->where($str)->find();
		
		return createarrok('ok',$usro,'',$info);
		
	}
	//############test
	public function getusrobyusrnm($usrnm,$usrps){
		
		$info=collectinfo(__METHOD__,'$usrnm,$usrps',array($usrnm,$usrps));

		if(isset($usrnm)==false){return createarrerr('error_code','usrnm不能为空',$info);}

		$usr=M('usr');
		$str="usrnm='".$usrnm."'";
		isset($usrps)?$str=$str.'&usrps='.$usrps:$str=$str;
		$usro=$usr->where($str)->find();

		return createarrok('ok',$usro,'',$info);
	}
	//############test
	public function login($usrnm,$usrpw,$rmb){
		$info=collectinfo(__METHOD__,'$usrnm,$usrpw',array($usrnm,$usrpw));

		if(isset($usrnm)==false){return createarrerr('error_code','usrnm不能为空',$info);}
		if(isset($usrpw)==false){return createarrerr('error_code','usrpw不能为空',$info);}

		$usr=D('Usr');
		$arr_usro=$usr->getusrobyusrnm($usrnm,1);
		$usro=$arr_usro['data'];

		if($usro){
			if($usro['usrpw']==md5($usrpw)){
				$rslt=1;
				session('usridss',$usro['usrid']);
				if($rmb=='y'){cookie('usridck',$usro['usrid']);}
				$msg='登录成功';
			}else{
				$rslt=0;
				$msg='密码不正确';
			}
		}else{
			$rslt=0;
			$msg='用户名不正确';
		}
		$arr['rslt']=$rslt;
		return createarrok('ok',$arr,$msg,$info);
	
	}
	##############
	public function get($openid){
		$url=C('javaback').'/user/get.action?wechatId='.$openid;
		$json='{"data":{"user":{"id":1,"token":1,"wechatId":"12345","nickName":"王 峰","mobile":"13162951502","macId":"dadadaaf","headImgUrl":"baidu.com","createTime":"2015-09-13 10:37:53","updateTime":"2015-09-13 10:37:53","customer":true,"deviceOwner":false,"installser":false,"admin":false},"userAccount":{"id":1,"userId":1,"balance":990,"point":0,"createTime":"2015-09-13 10:37:54","updateTime":"2015-09-19 23:26:50","version":1},"carList": [{"id":1,"userId":1,"carModelId":1,"carNo":"沪 A11111","isDefault":false,"createTime":"2015-09-19 22:19:36","updateTime":"2015-09-19 22:19:40"}]},"code":"A00000","msg":null}';
		$arr=url2arr($url,$json);
		return $arr;
	}


} 
?>