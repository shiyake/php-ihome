jQuery.noConflict();
jQuery(function ($) {
    var show_nc,hide_nc,uid;
    $('.avatar48,.feed_li_avatar').hover(
        function(){
            var height = $(this).height()+2;
            var width = $('.name_card').width();
            var top = $(this).offset().top+height;
            top -=30;
            top +='px';
            var win_width = $('#sidebar').offset().left+$('#sidebar').width();
            var left = $(this).offset().left;
            if($(this).hasClass('feed_li_avatar')){
                left -=350;
                left += 'px';
                $('.name_card').addClass('name_card_l');
                $('.name_card').css({'top':top,'left':left});
            }
            else{
                left -=580;
                left += 'px';
                $('.name_card').addClass('name_card_r');
                $('.name_card').css({'top':top,'left':left});
                
            }
            uid = $(this).find('a').attr('href');
            var uid_num = uid.indexOf('?')+1;
            uid = uid.substr(uid_num);
            uid = uid.split('=');
            uid = uid[1];
            var imgsrc = $(this).find('img').attr('src');
            imgsrc = imgsrc.replace(/small/,"middle")
            show_nc = setTimeout(function(){cn_p(uid,imgsrc);},300);
        },
        function(){
            clearTimeout(show_nc);
            hide_nc = setTimeout(function(){cn_h();},500);
        }
    );
    $('.name_card').hover(
        function(){
            clearTimeout(hide_nc);
        },
        function(){
            hide_nc = setTimeout(function(){cn_h();},500);
        }
    );
    $('.nc_sm').live('click',function(){
        $.get("cp.php",{'ac':'pm','uid':uid},function(data){},'json');

    });


    function cn_p(uid,imgsrc){
        $.get("cp.php",{'ac':'namecard','uid':uid},function(data){
            var name = data.name||data.username;
            
            if(data.edu){
                var edu = data.edu.split(' ')[1];
            }
            if(data.work){
                var work = data.work;
            }


            var np = [];
            if (data.birthprovince) {
                np.push(data.birthprovince);
            }
            if (data.birthcity) {
                np.push(data.birthcity);
            }
            np = np.join("");
            if(data.common == 0){
                var common = data.common;
            }
            var html = [];
            html.push("<div class='nc_avatar'><a href='#'><img src='"+imgsrc+"' alt='friend_name' class='nc_avatar_img' /></a></div>");
            html.push("<div class='nc_info'>");
            html.push("<a class='nc_name' href='#'>"+name+"</a>");
            if(np){
                html.push("<span class='nc_np'>（<span class='nc_tnp'>"+np+"</span>）</span>");                    
            }
            if(edu){
                html.push("<p class='nc_edu'>"+edu+"</p>");
            }
            if (work) {
                html.push("<p class='nc_work'>"+"单位："+work+"</p>");
            }               
            if(common == 0){
                html.push("<p class='nc_sfriends'><span class='nc_sf_num'>"+common+"</span>个共同好友</p>");    
            }
            html.push("<a href='cp.php?ac=pm&uid="+uid+"' class='nc_sm' id='a_pm' onclick='ajaxmenu(event,this.id, 1)'>发消息</a>");

            html.push("</div>");
            html = html.join("");
            $('.name_card').append(html);
            $('.name_card').show();
        },'json');
    };
    function cn_h(){
        $('.name_card').hide();
        $('.name_card').removeClass('name_card_r');
        $('.name_card').removeClass('name_card_l');
        $('.name_card').empty();
    };
});