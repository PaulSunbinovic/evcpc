'<?php
class SSModel extends Action{
	//setss 
	//session('usridss',null);cookie('usridck',null);
	############test
	public function setss(){
		
		$info=collectinfo(__METHOD__,'',array());

		$usr=D('Usr');
		
		$openid=session('openid');

		if($openid){
			$arr_usro=$usr->get($openid);
			$usross=$arr_usro['data']['user'];
		}
		
		return createarrok('ok',$usross,'',$info);
		
	}


} 
?>