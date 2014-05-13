var jq = jQuery.noConflict();
jq(document).ready(function(){ 
    if (jq('input.json_friend').length > 0) {
        var s = jq('input.json_friend')[0].value;
        var friendurl = jq('input.friendurl_r')[0].value;
        //alert(friendurl);
        jq.getJSON(friendurl,function(friends){
            //alert(friends[0].name);
            jq('textarea#message,textarea#comment_message').atWho('@',{
                data:friends,
                limit:10,
                tpl: "<li data-value='${namequery}' data-insert='${name}(${uid})'>${name}(${uid})</li>",
                choose: "data-insert"
            });
        });
    }
})

function at(){
	var s = jq('input.json_friend')[0].value;
	var friendurl = jq('input.friendurl_r')[0].value;
	//alert(friendurl);
	jq.getJSON(friendurl,function(friends){
		//alert(friends[0].name);
    	jq('input.t_input,textarea#general,textarea.t_input,textarea#message,textarea#invite_inputarea').atWho('@',{
			data:friends,
			limit:10,
        	tpl: "<li data-value='${namequery}' data-insert='${name}(${uid})'>${name}(${uid})</li>",
        	choose: "data-insert"
		});
  //   	jq('textarea#general').atWho('@',{
		// 	data:friends,
		// 	limit:10,
  //       	tpl: "<li data-value='${namequery}' data-insert='${name}(${uid})'>${name}(${uid})</li>",
  //       	choose: "data-insert"
		// });
  //   	jq('textarea.t_input').atWho('@',{
		// 	data:friends,
		// 	limit:10,
  //       	tpl: "<li data-value='${namequery}' data-insert='${name}(${uid})'>${name}(${uid})</li>",
  //       	choose: "data-insert"
		// });


  //       jq('textarea#message').atWho('@',{
  //           data:friends,
  //           limit:10,
  //           tpl: "<li data-value='${namequery}' data-insert='${name}(${uid})'>${name}(${uid})</li>",
  //           choose: "data-insert"
  //       });
	});
}
