(function($) {
	$.fn.myScroll = function(options) {
	 
	//默认配置
	var defaults = {
		auto:[false,3000], //是否自动滚动,第二个参数是自动滚动是切换的间隔时间
		visible:3, //可显示的数量
		speed:1000, //动画时间，可选slow，fast，数值类
		scroll:1 //每次切换的个数,此数小于等于visible值
	};   
		 
	var opts = $.extend({},defaults,options);
	opts.scroll=opts.scroll>opts.visible?opts.visible:opts.scroll;

	this.each(function(i){
					  
	   var prevBtn=$(this).find("p.myPrevBtn"),
		   nextBtn=$(this).find("p.myNextBtn"),
		   block=$(this).find("div.myBlock"),
		   innerBlock=block.find(".mainul"),
		   list=block.find('.mainul > .mainli'),
		   listNum=list.size(),
		   listWidth=list.width(),
		   blockWidth=listWidth*opts.visible,//可见区域宽度
		   intervalId; 
		   
	   //设置宽度样式
	   //$(this).width(blockWidth+prevBtn.width()+nextBtn.width());
	   block.width(blockWidth)
	   .find(".mainul").width(listWidth*listNum);
	   
	   //获取已滚动个数
	   function getSnum(){
		   return (parseInt(innerBlock.css("margin-left"))*-1)/listWidth;
		   }
		   
	   //获取滚动的距离
	   function getMove(c){
		   return c>=opts.scroll?opts.scroll*listWidth:c*listWidth;
		   } 
		
	   //单击向后按钮
	   nextBtn.click(function(){
							  var snum=getSnum(),
							  c=listNum-snum-opts.visible,
							  m=getMove(c);
							  if(listNum-snum > opts.visible){
							  innerBlock.animate({
												 "margin-left":"-="+m
												 },opts.speed);
							  }
							  });
	   
	   //单击向前按钮
	   prevBtn.click(function(){
							  var snum=getSnum(),
							  m=getMove(snum);
							  if(snum>0){
							  innerBlock.animate({
												 "margin-left":"+="+m
												 },opts.speed);
							  }
							  });
	   
	   //如果自动滚动
	   if(opts.auto[0]){
		   
		   $(this).width(blockWidth);
		   prevBtn.hide();
		   nextBtn.hide();
		   
		   function auto(){
			   var snum=getSnum(),
			   m=getMove(listNum-snum-opts.visible); 
								 
			   if(listNum-snum > opts.visible){
								innerBlock.animate({
												 "margin-left":"-="+m
												 },opts.speed);
								}else{
								innerBlock.css("margin-left",0).find('li').slice(0,listNum-opts.visible).appendTo(innerBlock);
									}
			   }
		   
		  
		  //当鼠标经过滚动区域停止滚动
		  block
		  .hover(function(){
							  clearInterval(intervalId); 
							   },function(){
											intervalId=setInterval(auto,opts.auto[1]+Math.abs(opts.speed-opts.auto[1])+100);
											})
		  .trigger('mouseleave');
		   }
	   
	   });

	}; 
})(jQuery); 