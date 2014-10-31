(function(){
	jQuery('.popupmenu_centerbox:not(:last):not(:visible)').remove();
	window._bd_share_main = undefined;
	var bdUrl = jQuery('#bdshare_content').data('url');
	var bdContent = jQuery('#bdshare_content').data('content');
	var temp = /(.*?)\s*:\s*(.*)/.exec(bdContent);
	bdContent = temp[2] + ' - ' + temp[1];
	window._bd_share_config = {
		common : {
			bdText : bdContent + ' - 北航ihome',
			bdDesc : bdContent + ' - 北航ihome',
			bdUrl : location.origin + bdUrl,
			bdSign : 'off'
		},
		share : [{
			"bdSize" : 16
		}]
	};
	bdContent = encodeURIComponent(bdContent);
    jQuery('.bds_renren').click(function(){
        var baseUrl = 'http://widget.renren.com/dialog/share?';
        baseUrl += 'resourceUrl=' + encodeURIComponent(location.origin + bdUrl);
        baseUrl += '&srcUrl='+ encodeURIComponent(location.origin + bdUrl);
        baseUrl += '&pic='+encodeURIComponent(location.origin + '/image/logo_title.png');
        baseUrl += '&title='+bdContent + ' - 北航ihome';
        baseUrl += '&description='+bdContent + ' - 北航ihome';

        window.open(baseUrl);
    });
    jQuery('.bds_qzone').click(function(){
        var baseUrl = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?';
        baseUrl += 'url=' + encodeURIComponent(location.origin + bdUrl);
        baseUrl += '&summary='+bdContent + ' - 北航ihome';
        baseUrl += '&title='+bdContent + ' - 北航ihome';
        baseUrl += '&site='+encodeURIComponent(location.origin + bdUrl);

        window.open(baseUrl);
    });
})();