<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	
	//#########index
    public function index(){
    	header("Content-Type:text/html; charset=utf-8");
    	$usr=D('Usr');$ss=D('SS');$lbmd=D('Lbmd');$wx=D('WX');

    	###########上面的用户基本信息
		$arr_usross=$ss->setss();

		//经过上一步，就算没有usridss也要有了，这样都没有，哪就是真的没有
		$usross=$arr_usross['data'];
		
		//########上面的权限信息
		if($usross){
			
			$this->display('manager');
			
		}else{
			//如果没有usrid么肯定是没登录过
			$wx->createQR();
			$this->display('login');
		}
		

	}
}