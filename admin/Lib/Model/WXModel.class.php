<?php
class WXModel extends Action{
	//createQR
	//
	//############test
	public function createQR(){
		$info=collectinfo(__METHOD__,'',array());

		$qr=M('qr');
		//先取一个tempuid 
		$tmpuid=time().rand(10,99);//加上随机数几乎是杜绝了统一时间一起产生的临时uid的可能性
		$isscan='n';
		$openid='';
		$data=array('tmpuid'=>$tmpuid,'isscan'=>$isscan,'openid'=>$openid);
		$qr->data($data)->add();

		$pic='./Public/img/qr/'.$tmpuid.'.png';

		$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx682ad2cc417fe8b9&redirect_uri=http://www.evchar.cn/evcpc/oauth2_openid.php&response_type=code&scope=snsapi_base&state=1&connect_redirect=1#wechat_redirect";
		
		include "phpqrcode.php";
		
		$c = $url;

		$data = 'http://www.baidu.com';
		// 纠错级别：L、M、Q、H
		$level = 'L';
		// 点的大小：1到10,用于手机端4就可以了
		$size = 4;
		// 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		//$path = "images/";
		// 生成的文件名
		//$fileName = $path.$size.'.png';
		//只认从根目录去找的。。
		QRcode::png($c,$pic, $level, $size);
	
		$this->assign('pic',$pic);
	   

		return createarrok('ok',$pic,'',$info);
	}
	

} 
?>