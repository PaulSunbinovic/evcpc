<?php
// 本类由系统自动生成，仅供测试用途
class UsrAction extends Action {
	//dologin
	
	//#########index
    public function docheckqr(){
    	header("Content-Type:text/html; charset=utf-8");
		    
    	$wx=D('WX');

        $tmpuid=$_GET['tmpuid'];
		
    	$arr_isscan=$wx->checkqr($tmpuid);
        
        $rslt=$arr_isscan['data'];$msg=$arr_isscan['msg'];

        
    	$data['rslt']=$rslt;$data['msg']=$msg;
		$this->ajaxReturn($data,'json');
	}
}