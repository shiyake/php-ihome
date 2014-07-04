(function(){
	
	jQuery(function(){
		jQuery(".query_button").click(function(){
			jQuery(".query_div").css({"display":"block"});
			jQuery.post("admincp.php?ac=recommendpublic&op=query",
				{
					"query":jQuery(".query_input").val()
				},
				function(data){
					jQuery(".public_message").html(jQuery(data).find(".public_message").html());
				});
		});
	});
})();
