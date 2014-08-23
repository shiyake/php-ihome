(function(){
	
	jQuery(function(){
		jQuery(".query_input").keypress(function(e){
			if(e.which==13)	{
				jQuery(".query_button").click();
			}
		});
		
	
		jQuery(".query_input").keyup(function(e){
			if(jQuery(this).val()==""){
				jQuery(".query_div").css({
					"display":"none"
				});
			}
		});
		jQuery(".query_button").click(function(){
			jQuery(".query_div").css({"display":"block"});
			if(jQuery(".query_input").val())	{
				jQuery.post("admincp.php?ac=recommendpublic&op=query",
					{
						"query":jQuery(".query_input").val()
					},
					function(data){
						jQuery(".public_message").html(jQuery(data).find(".public_message").html());
				});
			}
		});

	});
})();
