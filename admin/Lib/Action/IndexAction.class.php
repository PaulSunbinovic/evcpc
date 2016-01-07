<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	
	//#########index
    public function index(){
    	header("Content-Type:text/html; charset=utf-8");
    	$usr=D('Usr');$ss=D('SS');$lbmd=D('Lbmd');$wx=D('WX');$group=D('Group');$dvc=D('Dvc');$odr=D('Odr');$b2b=D('B2b');

    	###########上面的用户基本信息
		$arr_usross=$ss->setss();

		//经过上一步，就算没有usridss也要有了，这样都没有，哪就是真的没有
		$usross=$arr_usross['data'];
		
		//########上面的权限信息
		if($usross){
			//查看用户所在的物业组，默认是第一个物业
			$arr_groupls=$group->selectListGroupByUserId($usross['id']);
			$groupls=$arr_groupls['data'];
			$this->assign('groupls',$groupls);

			if(count($groupls)==0){$this->display('nogroup');die;}
			
			if($_GET['groupid']){
				$groupid=$_GET['groupid'];
				foreach($groupls as $groupv){
					if($groupv['id']==$groupid){$groupo=$groupv;break;}
				}
			}else{
				$groupo=$groupls[0];
			}
			
			$this->assign('groupo',$groupo);

			// //获取组后，开始查看这个组有哪些桩
			// $arr_dvcls=$group->selectDeviceByGroupId($groupo['id']);
			// $dvcls=$arr_dvcls['data'];
						
			// $dvc_count=count($dvcls);
			// $this->assign('dvc_count',$dvc_count);
			// //哪些桩在线，哪些桩不在线
			// $dvc_count_online=0;
			// $dvclsnw=array();
			// foreach($dvcls as $dvcv){
			// 	//先看是否在线
			// 	$arr_online=$dvc->checkIsOnline($dvcv['id']);
			// 	if($arr_online['data']==true){
			// 		$dvc_count_online++;
			// 		//然后看是否在充电
			// 		$arr_charge=$dvc->checkIsCharging($dvcv['id']);
			// 		if($arr_charge['data']==true){
			// 			$dvcv['stts']='充电';
			// 		}else{
			// 			$arr_appoint=$odr->getLastOrderByDeviceId($dvcv['id']);
			// 			if($arr_appoint['data']['status']==0){
			// 				$dvcv['stts']='预约';
			// 			}else{
			// 				$dvcv['stts']='在线';
			// 			}
			// 		}
			// 	}else{
			// 		$dvcv['stts']='离线';
			// 	}
			// 	array_push($dvclsnw,$dvcv);
			// }
			// $this->assign('dvcls',$dvclsnw);
			// $this->assign('dvc_count_online',$dvc_count_online);
			// $this->assign('dvc_count_offline',$dvc_count-$dvc_count_online);
			$groupid=$groupo['id'];$openid=$usross['wechatId'];

			$arr=$b2b->getDeviceStatistics($groupid);
			$this->assign('deviceStatistics',$arr['data']);

			$arr=$b2b->getNowPowerStatistics($groupid);
			$this->assign('nowPowerStatistics',$arr['data']);

			$arr=$b2b->getTotalPowerStatistics($groupid);
			$this->assign('totalPowerStatistics',$arr['data']);

			$arr=$b2b->getTotalPriceStatistics($groupid,$openid);
			$this->assign('totalPriceStatistics',$arr['data']);

			$arr=$b2b->getDetailsList($groupid,$openid);
			$this->assign('detailsList',$arr['data']);


			$this->display('manager');
			
		}else{
			//如果没有usrid么肯定是没登录过
			$wx->createQR();
			$this->display('login');
		}
		

	}
}