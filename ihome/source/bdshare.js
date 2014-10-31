(function(){
	jQuery('.popupmenu_centerbox:not(:last):not(:visible)').remove();
	window._bd_share_main = undefined;
	var id = jQuery('#bdshare_content').data('id');
	var bdContent = jQuery('#bdshare_content').data('content');
	var temp = /(.*?)\s*:\s*(.*)/.exec(bdContent);
	bdContent = temp[2] + ' - ' + temp[1];
	window._bd_share_config = {
		common : {
			bdText : bdContent + ' - 北航ihome',
			bdDesc : bdContent + ' - 北航ihome',
			bdUrl : location.origin + "/space.php?do=doing&doid=" + id,
			bdSign : 'off'
		},
		share : [{
			"bdSize" : 16
		}]
	};
})();