$(function(){
	$('#groupid').change(function(){
		var groupid=$(this).val();
        var url=__app__+'/Index/index/groupid/'+groupid;
        window.location.href=url;
	})
})