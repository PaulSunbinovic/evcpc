<?php
// 本类由系统自动生成，仅供测试用途
class WXAction extends Action {
    public function certify(){
    	header("Content-Type:text/html; charset=utf-8");
    	$usr=D('Usr');$wx=D('WX');
    	
    	$openid=$_GET['openid'];
    	
    	$arr_usro=$usr->get($openid);
    	if($arr_usro['code']=='A00000'){
    		
    		$msg='登录成功！';
    	}else{
    		$msg=$arr_usro['msg'];
    	}
    	$this->assign('msg',$msg);

		$this->display('wxcallbackrslt');
    }
    public function ajax(){
    	header("Content-Type:text/html; charset=utf-8");
    	$data['arr']=$arr;$data['rslt']=$rslt;$data['msg']=$msg;
		$this->ajaxReturn($data,'json');
    }
   

}